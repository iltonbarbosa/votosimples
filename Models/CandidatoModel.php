<?php
namespace App\Models;
use CodeIgniter\Model;

class CandidatoModel extends Model{

	protected $table = 'candidato';
	protected $allowedFields = ['candidatoid', 'nome', 'descricao'];
	protected $primaryKey = 'candidatoid';
	protected $dateFormat = 'datetime';
	protected $createdField = 'dtcadastro';

	public function getCandidato($id = false){

		if($id == false){
			return $this->findAll();
		}

		return $this->asArray()
				->where(['candidatoid' => $id])
				->first();
	}

}
