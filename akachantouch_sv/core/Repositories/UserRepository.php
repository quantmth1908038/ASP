<?php 
namespace Core\Repositories;

use Core\Repositories\Contracts\UserRepositoryContract;
use Core\Models\User;

class UserRepository implements UserRepositoryContract
{	
	protected $user;
   	
    public function __construct(User $user)
    {
        $this->model = $user;
        $this->guard = 'api';
    }

    
    function firstOrCreate($request){
    	return $this->model->updateOrCreate(
    							[
    								'sdk_id' => $request['sdk_id']
    							],
    							array_diff_key(
    								$request,['sdk_id' => $request['sdk_id']]
    							)
    					);
    }


    function updateUser($request){
        $user = auth($this->guard)->user();
        $input = $request->all();
        return $user->fill($input)->save();
    }
}

?>