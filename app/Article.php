<?php
/**
 * Created by PhpStorm.
 * User: or_os
 * Date: 16.02.2018
 * Time: 15:48
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;



    protected $dates = ['deleted_at'];
    protected $fillable = ['title', 'content'];

}