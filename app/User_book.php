<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_book extends Model
{
    protected $table = 'user_books';

    protected $fillable = [
    	'user_id', 'book_id'
    ];
    public $timestamps = false;

    public static function insertBookUserId($data){

    	self::insert($data);
    }
}
