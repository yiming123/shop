<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Promotions extends Model
{
    //
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'promotion';

    protected $primaryKey = 'id';

    public $timestamps = false;


    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['name','price','str_time','sto_time','gid'];
}
