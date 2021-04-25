<?php 
namespace Core\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
  
    use SoftDeletes;
    protected $fillable =['id','user_id','free_date','expires_date'];



}

?>