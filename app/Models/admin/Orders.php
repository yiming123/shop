<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'orders';

    protected $primaryKey = 'oid';

    public $timestamps = false;


    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['oid','uid','consigne','address','phone','sum_num','sum_price','time','message','state'];
}
