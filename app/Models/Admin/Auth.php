<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    //
     /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'auth';

    protected $primaryKey = 'id';

    public $timestamps = false;


    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['authname','link','description'];
}
