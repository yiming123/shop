<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'user';

    protected $primaryKey = 'uid';

    public $timestamps = false;


    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['uname','pwd','role','sex','tell','addr','image','email','token'];
}
