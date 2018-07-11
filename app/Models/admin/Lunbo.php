<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Lunbo extends Model
{
    //
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'lunbo';

    protected $primaryKey = 'lid';

    public $timestamps = false;


    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['lid','lname','url','status'];
}
