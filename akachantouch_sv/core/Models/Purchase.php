<?php 
namespace Core\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'platform_id', 'product_code', 'receipt', 'expires_date', 'transaction_id',
        'signature', 'order_id', 'json_data', 'propaty_code'
    ];

  

    public function user()
    {
        return $this->belongsTo(User::class);
    }    

    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }

}
