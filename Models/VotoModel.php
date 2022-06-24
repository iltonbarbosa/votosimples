<?php
namespace App\Models;
use CodeIgniter\Model;

class VotoModel extends Model{

	protected $table = 'voto';
	protected $allowedFields = ['candidatoid'];
	protected $primaryKey = 'votoid';


	public function totalVotos(){
		$query = $this->query("SELECT candidatoid, nome, descricao, imagem, count(voto.candidatoid) as 'totalvotos' FROM candidato left join voto using(candidatoid) group by candidatoid");

		return $query->getResult('array');
	}

	public function totalGeralVotos(){
		$query = $this->query("SELECT count(candidatoid) as 'totalgeral' FROM voto");

		return $query->getRow();
	}
}
