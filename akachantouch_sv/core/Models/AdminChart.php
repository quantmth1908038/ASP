<?php


namespace Core\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class AdminChart extends Model
{
    use SoftDeletes;

    protected $table = 'admin_charts';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'new_user_month','access_month','access_year','user_year','paid_fees_user_year'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    
    ];
}
