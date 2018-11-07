<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
// sẽ cần phải extent thằng User. 
class User extends Authenticatable
{

    use SoftDeletes;
    protected $table = 'users';

    
    public $timestamps = false;
    protected $dates = ['delete_at'];

    protected $fillable = [
    	'name', 'password', 'email', 'role',
    ];

    public static function storeUser($request)
    {

        self::insert($request);
    }

    public function scopeRole($query)
    {
        if(auth()->user()->role !== 'admin')
        {
            $query->where('id', auth()->id());
        }
        return $query;
    }

    public static function getUser($id)
    {
    	
    	return self::find($id);
    }

    public function roles()
    {
        return $this->belongsToMany('App\Book', 'user_books', 'user_id', 'book_id');
    }

}
