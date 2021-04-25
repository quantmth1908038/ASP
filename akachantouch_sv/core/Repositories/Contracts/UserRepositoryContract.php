<?php 
namespace Core\Repositories\Contracts;

interface UserRepositoryContract 
{
	public function firstOrCreate($request);
	public function updateUser($request);
}

 ?>