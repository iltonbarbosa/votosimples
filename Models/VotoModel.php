<?php
namespace App\Models;
use CodeIgniter\Model;

class VotoModel extends Model{

	protected $table = 'voto';
	protected $allowedFields = ['candidatoid'];
	protected $primaryKey = 'votoid';

}
