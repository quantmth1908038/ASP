<?php


namespace Core\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class AdminStatistic extends Model
{
    use SoftDeletes;

    protected $table = 'admin_statistics';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'new_user','access','paid_fees_user','normal_user'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];




}
