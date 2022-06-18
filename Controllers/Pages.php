<?php namespace App\Controllers;

use App\Models\CandidatoModel;

class Pages extends BaseController{

	var $candModel = null;

	public function index()
	{
		return view('welcome_message');
	}

	public function mostrar($page = 'home',$candidatoid = ''){
		if(!is_file(APPPATH.'/Views/pages/'.$page.'.php')){
			throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		}

		$data['title'] = ucfirst($page);

		if($page == 'votoconfirmado')
			$data['candidato'] = $this->confirmavoto($candidatoid);

		if($page == 'voto'){
			$this->candModel = new CandidatoModel();
			$data['candidatos'] = $this->candModel->getCandidato();
			shuffle($data['candidatos']);
		}

		echo view('templates/header', $data);
		echo view('pages/'.$page);
		echo view('templates/footer');
	}

	public function confirmavoto($candidatoid){

		$this->candModel = new CandidatoModel();
		$candidato = $this->candModel->getCandidato($candidatoid);

		return $candidato;
	}

}
