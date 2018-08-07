<?php
/**
 * Created by PhpStorm.
 * User: hhuyq
 * Date: 04-Aug-18
 * Time: 7:04 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $fillable=['name','date_of_birth','breed_id'];

    public  function  breed(){
        return $this->belongsTo('App\Breed');
    }
}