<?php namespace App\Controllers;

use App\Models\AdmModel;
use App\Models\CandidatoModel;
use App\Models\VotoModel;

class Adm extends BaseController{

	var $admModel = null;
	var $candModel = null;
	var $votodModel = null;

	public function index()	{
		echo view('templates/header');
		echo view('pages/adm');
		echo view('templates/footer');
	}

	public function totalvotos(){

		/*Para o POST funcionar é necessário configurar o app/config/Filters.php
		public $aliases = [
			...
			'throttle' => \App\Filters\Throttle::class,
		]
		-- copie o arquivo Throttle.php para a pasta app/Config/Filters

			public $methods = [
				'post' => ['throttle']
			];

		*/
	$senha = $this->request->getPost('senha');

		echo view('templates/header');
		if($this->validaSenha($senha)){
			$this->votoModel = new VotoModel();

			$data['votos'] = $this->votoModel->totalVotos();
			shuffle($data['votos']);
			$data['totalvotos'] = $this->votoModel->totalGeralVotos();
			echo view('pages/totalvotos',$data);
		}else{
			$data['msg'] = "Senha incorreta";
			echo view('pages/adm', $data);
		}
		echo view('templates/footer');

	}

	private function validaSenha($senha){
		$this->admModel = new AdmModel();

		if($senha != null)
		  return $this->admModel->validaSenha($senha);

		return false;
	}
}
