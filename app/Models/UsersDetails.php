<?php namespace Fxweb\Models;

use Illuminate\Database\Eloquent\Model;

class UsersDetails extends Model
{
        protected $table = 'users_details';
       
        public $timestamps = false;
       
        protected $fillable = [
    
        'nickname',
        'location',
        'birthday',
        'phone',
        'country',
        'city',
            ];
}
