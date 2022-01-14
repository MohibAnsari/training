<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    /**
     * Get the phone record associated with the user.
     */
    public function group()
    {
        return $this->belongsTo('App\Models\Group','group_id');
    }
}


