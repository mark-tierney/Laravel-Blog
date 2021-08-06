<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    //use HasOne;

    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }
}
