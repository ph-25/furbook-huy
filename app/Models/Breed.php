<?php
/**
 * Created by PhpStorm.
 * User: hhuyq
 * Date: 04-Aug-18
 * Time: 7:03 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    public function cats(){
        return $this->hasMany('App\Models\Cat');
    }

}