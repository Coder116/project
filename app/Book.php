<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    protected $table = 'books';
    public $timestamps = false;

    protected $fillable = [
    	'title', 'description', 'fmd', 'image',
    ];

    public static function storeBook($request)
    {

        return self::insertGetId($request);
    }

    public static function getBook($id)
    {
    	
    	return self::find($id);
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_books', 'book_id', 'user_id');
    }

    protected $dates = ['delete_at'];
    
}
