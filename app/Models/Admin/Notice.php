<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    //
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'notice';

    protected $primaryKey = 'id';

    public $timestamps = false;


    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['title','content','status'];
}
