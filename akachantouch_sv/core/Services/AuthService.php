<?php 
namespace Core\Services;
use Carbon\Carbon;
use Core\Services\Contracts\AuthServiceContract;
use Core\Repositories\Contracts\UserRepositoryContract;
use JWTAuth;


class AuthService implements AuthServiceContract
{	

  protected $user;

  public function __construct(UserRepositoryContract $user){
   	  $this->user = $user;
      $this->guard = 'api';
  }

   public function login($request)
   {  
   		$user = $this->user->firstOrCreate($request->all());
   		if ($user) {
   			if (!$user->subscription) {      
                $user->subscription()->firstOrCreate([
                    'expires_date' => Carbon::now(),
                    'free_date' => Carbon::now()->addDays(7)
                ]);
          }
        if (!$user->special) {            
            $user->special()->firstOrCreate([
                'flg' => "free"
            ]);
        }
        	$token = auth($this->guard)->login($user);
          return $this->respondWithToken($token);
   		}

   }
   public function me(){
      try {
        $user = auth($this->guard)->userOrFail();
        $subscription = $user->subscription()->whereNull('deleted_at')->get();
        $special = $user->special()->whereNull('deleted_at')->get();
        unset($user->created_at, $user->updated_at, $user->deleted_at);
        unset($subscription[0]->created_at, $subscription[0]->updated_at, $subscription[0]->deleted_at);
        if (isset($subscription[0]['user_id'])) {
          $user['subscription'] = $subscription;
        }
        if (isset($special[0]['user_id'])) {
            $user['subscription'][0]['flg'] = $special[0]['flg'];
        }
      } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
        return response()->json(['error' => 'Unauthorized'], 401);
      }
      
      return $user;
   }

   public function updateUser($request){
      return $this->user->updateUser($request);
   }

   protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth($this->guard)->factory()->getTTL() * 60
        ]);
    }

}