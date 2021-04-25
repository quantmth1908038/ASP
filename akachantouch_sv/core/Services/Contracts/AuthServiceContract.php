<?php 
namespace Core\Services\Contracts;

interface AuthServiceContract
{
	public function login($request);

	public function updateUser($request);
}

 ?>