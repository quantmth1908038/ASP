<?php 
namespace Core\Modules\API\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Core\Modules\API\Requests\AuthRequest;
use Core\Repositories\Contracts\SpecialUserRepositoryContract;
use Core\Repositories\Contracts\SubscriptionRepositoryContract;
use Core\Services\Contracts\AuthServiceContract;
use Core\Services\Contracts\PurchaseServiceContract;
use Core\Services\PurchaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class AuthController extends Controller
{
	protected $auth;
    protected $purchase;
    protected $subscription;
    protected $special;


	public function __construct(AuthServiceContract $auth, PurchaseServiceContract $purchase, SubscriptionRepositoryContract $subscription, SpecialUserRepositoryContract $special){
		$this->auth = $auth;
        $this->purchase = $purchase;
        $this->subscription = $subscription;
        $this->special = $special;
	}

    /**
     * Login
     *
     * @bodyParam name string required
     * @bodyParam uuid string required
     * @bodyParam sdk_id string required
     * @bodyParam platform_id integer required
     * @bodyParam version string required
     *
     * @response 200 {"name": "sample string 1","uuid": "sample string 2","sdk_id": "sample string 3","platform_id": "123456","version": "sample string 4"}
     */
	public function login(AuthRequest $request){
		return $this->auth->login($request);
	}

    /**
     * Profile
     *
     * @bodyParam name string required
     * @bodyParam uuid string required
     * @bodyParam sdk_id string required
     * @bodyParam platform_id integer required
     * @bodyParam version string required
     * @queryParam Bearer_Token required
     *
     * @response 200 {"name": "sample string 1","uuid": "sample string 2","sdk_id": "sample string 3","platform_id": "123456","version": "sample string 4"}
     */
	public function me(){
		$data = $this->auth->me();
        $isPurchased = $this->purchase->isPurchased();
        $now = Carbon::now();
        $flg = $data->subscription[0]['flg'];
        $free_date = $data->subscription[0]['free_date'];
        $purchased_date = $data->subscription[0]['expires_date'];

        if(isset($isPurchased)) {
            $checkStatus = $this->purchase->platformCheck($isPurchased);
            $expires_date = $checkStatus['expires_date'];

            if ($expires_date) {
                $expires_date->setTimezone('Asia/Tokyo');
                if (Carbon::parse($expires_date)->gt($now)) {
                    $this->special->set(config('purchase.FLG_TRUE'));
                    $this->subscription->update($expires_date);
                } else if (Carbon::parse($free_date)->gt($now)) {
                    $this->special->set(config('purchase.FLG_FREE'));
                } else {
                    $this->special->set(config('purchase.FLG_FALSE'));
                }
            } else {
                if ((Carbon::parse($isPurchased['expires_date']) < $now) && (Carbon::parse($purchased_date) < $now)) {
                    if ($flg != config('purchase.FLG_FALSE')) {
                        $this->special->set(config('purchase.FLG_FALSE'));
                    }
                } else {
                    if ($flg != config('purchase.FLG_TRUE')) {
                        $this->special->set(config('purchase.FLG_TRUE'));
                    }
                }
            }
        } else {
            if (Carbon::parse($free_date)->gt($now)) {
                if ($flg != config('purchase.FLG_FREE')) {
                    $this->special->set(config('purchase.FLG_FREE'));
                }
            } else if (Carbon::parse($purchased_date)->gt($now)) {
                if ($flg != config('purchase.FLG_TRUE')) {
                    $this->special->set(config('purchase.FLG_TRUE'));
                }
            } else {
                if ($flg != config('purchase.FLG_FALSE')) {
                    $this->special->set(config('purchase.FLG_FALSE'));
                }
            }
        }
		return $this->auth->me();
	}

    /**
     * Update User
     *
     * @bodyParam name string required
     * @bodyParam uuid string required
     * @bodyParam sdk_id string required
     * @bodyParam platform_id integer required
     * @bodyParam version string required
     *
     * @response 200 {"name": "sample string 1","uuid": "sample string 2","sdk_id": "sample string 3","platform_id": "123456","version": "sample string 4"}
     */
	public function updateUser(AuthRequest $request){
		$data = $this->auth->updateUser($request);
        return response()->json($data);
	}

}
