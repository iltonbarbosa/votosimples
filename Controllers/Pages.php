<?php namespace App\Controllers;

use App\Models\CandidatoModel;
use App\Models\CodigoModel;
use App\Models\VotoModel;
use App\Models\CodigoUtilizadoModel;

class Pages extends BaseController{

	var $candModel = null;
	var $codigoModel = null;
	var $codigoUtilizadoModel = null;
	var $votoModel = null;
	var $codigo = null;
	var $msg = null;

	public function index()
	{
		return view('welcome_message');
	}

	public function mostrar($page = 'home',$candidatoid = '',$codigo = ''){
		if(!is_file(APPPATH.'/Views/pages/'.$page.'.php')){
			throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		}

		$data['title'] = ucfirst($page);

		if($page == 'votoconfirmado')
			$data['candidato'] = $this->confirmavoto($candidatoid,$codigo);
			$data['codigo'] = $codigo;

		if($page == 'voto'){
			if($this->validaCodigo())
				$data = $this->listaCandidatos();
			else
				$page = "home";
		}

		if($page == 'gerarCodigo'){
			$this->codigoModel = new CodigoModel();

			//$codigo = $this->gerarCodigo();

			$data['codigos'] = $this->codigoModel->getCodigo();
		}

		$data['msg'] = $this->msg;

		echo view('templates/header', $data);
		echo view('pages/'.$page);
		echo view('templates/footer');
	}

	public function confirmavoto($candidatoid,$codigo){
		$this->votoModel = new VotoModel();
		$this->candModel = new CandidatoModel();
		$this->codigoUtilizadoModel = new CodigoUtilizadoModel();

		$this->votoModel->save(['candidatoid' => $candidatoid]);

		$candidato = $this->candModel->getCandidato($candidatoid);

		$this->codigoUtilizadoModel->save(['codigovoto' => $codigo]);

		return $candidato;
	}

	public function gerarCodigo(){
		$upper = implode('', range('A', 'Z')); // ABCDEFGHIJKLMNOPQRSTUVWXYZ
		$lower = implode('', range('a', 'z')); // abcdefghijklmnopqrstuvwxyzy
		$nums = implode('', range(0, 9)); // 0123456789

		$alphaNumeric = $upper.$lower.$nums; // ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789

		$len = 7; // numero de chars

		for($i=0;$i<=250;$i++){
			$codigo = '';
			for($c = 0; $c < $len; $c++) {
				$codigo .= $alphaNumeric[rand(0, strlen($alphaNumeric) - 1)];
			}

			$this->codigoModel->save(['codigovoto' => $codigo]);
		}
	}

	private function listaCandidatos(){
		$this->candModel = new CandidatoModel();
		if($this->request->getVar('codigo') != null)
			$data['codigo'] = $this->request->getVar('codigo');

		$data['candidatos'] = $this->candModel->getCandidato();
		shuffle($data['candidatos']);

		return	$data;
	}

	private function validaCodigo(){
		$this->codigoModel = new CodigoModel();
		$this->codigoUtilizadoModel = new CodigoUtilizadoModel();

		$codigo = $this->request->getVar('codigo');

		if($codigo != null && $this->codigoModel->validaCodigo($codigo) && $this->codigoUtilizadoModel->getCodigo($codigo) == null)
			return true;
		else
			$this->msg = "O código informado é inválido ou já foi utilizado.";

		return false;
	}


}
