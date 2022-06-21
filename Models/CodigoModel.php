<?php
namespace App\Models;
use CodeIgniter\Model;

class CodigoModel extends Model{

	protected $table = 'codigovoto';
	protected $allowedFields = ['codigovoto'];
	protected $primaryKey = 'codigovotoid';

	public function getCodigo($id = false){

		if($id == false){
			return $this->findAll();
		}

		return $this->asArray()
				->where(['codigovotoid' => $id])
				->first();
	}

	public function validaCodigo($codigo){

		return $this->asArray()
				->where(['codigovoto' => $codigo])
				->first();
	}

}
