<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Dis extends Model
{
      //
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'dis';

    protected $primaryKey = 'did';

    public $timestamps = false;


    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['uid','oid','way','price'];
}
