<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $table = 'user_profiles';

    protected $fillable = ['user_id', 'country', 'dob', 'firstname', 'lastname', 'country', 'state', 'city', 'avatar'];
}
