<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    
    //
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'comment';

    protected $primaryKey = 'cid';

    public $timestamps = false;


    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['cid','uid','gid','star','content','addtime'];
}
