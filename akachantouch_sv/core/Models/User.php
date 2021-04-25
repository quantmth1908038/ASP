<?php
namespace Core\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [ 'id', 
    					    'name', 
    					    'email', 
    					    'password', 
    					    'uuid', 
    					    'sdk_id', 
    					    'device_token',
    					    'platform_id',
    					    'generation_id',
    					    'version',
    					    'flg_tutorial',
    					    'last_login_at',
    					    'remember_token',
    					    'created_at',
    					    'updated_at',
    					    'deleted_at'
    					];
    protected $table = 'users';

    public function purchase()
    {
        return $this->hasMany('Core\Models\Purchase');
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }

    public function platform()
    {
        return $this->belongsTo(Platform::class, 'platform_id');
    }

    public function special()
    {
        return $this->hasOne(SpecialUser::class);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


}

 ?>