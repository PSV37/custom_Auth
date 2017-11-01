<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddUser extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','firstname','lastname', 'email','role_id','gender','image','password','verifyToken',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   

    public function role()
    {
        return $this->belongsTo('App\Role');
    }
}
