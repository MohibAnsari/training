<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Group extends Model
{
    use SoftDeletes;
    // use HasFactory;
    protected $table="groups";
    protected $fillable=['post_title','post_author'];

    protected static function boot()
    {

        parent::boot();
            static::creating(function($model){
                $model->created_by = Auth::user()->id;
                $model->updated_by = Auth::user()->id;
            });
            static::updating(function($model)  {
                $model->updated_by = Auth::user()->id;
            });
        }
}
