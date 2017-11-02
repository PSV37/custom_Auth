<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orgnization extends Model
{
     protected $fillable = [
        'name','webaddress','phoneno','address','email_first','status','logo1','logo2','firstname','lastname', 'email_second','mobileno',
    ];
}
