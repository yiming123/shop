<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'goods';

    protected $primaryKey = 'id';

    public $timestamps = false;


    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['cid','gname','price','status','gdesc'];

    public function many()
    {
        // 第一个参数附表模型   第二个参数是附表的外键
        return $this->hasMany('App\Models\Admin\Goodspic','gid');
    }
}
