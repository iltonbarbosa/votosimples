<?php
namespace App\Models;

class AdmModel{

	public function validaSenha($senha){

		if($senha == 'zaq121314')
		   return true;

		return false;
	}

}
