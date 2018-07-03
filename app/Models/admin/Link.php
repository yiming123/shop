<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    //
        /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'link';

    protected $primaryKey = 'lid';

    public $timestamps = false;	
    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['lid','lname','lurl'];
}
