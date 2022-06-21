<?php
namespace App\Models;
use CodeIgniter\Model;

class CodigoUtilizadoModel extends Model{

	protected $table = 'codigoutilizado';
	protected $allowedFields = ['codigovoto'];
	protected $primaryKey = 'codigoutilizadoid';

	public function getCodigo($codigo){
		return $this->asArray()
				->where(['codigovoto' => $codigo])
				->first();
	}

}
