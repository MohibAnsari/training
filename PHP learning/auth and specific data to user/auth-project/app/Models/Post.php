<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Post extends Model
{
    use SoftDeletes;
    // use HasFactory;
    protected $table="posts";
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
            static::deleting(function($model)  {
                $model->updated_by = Auth::user()->id;
                $model->deleted_by = Auth::user()->id;
                $model->save();
            });
            // static::deleted(function($model)  {
            //     $model->updated_by = Auth::user()->id;
            //     $model->deleted_by = Auth::user()->id;
            // });
        // // create a event to happen on updating
        // static::updated(function($model)  {
        //     $model->updated_by = Auth::user()->id;
        // });

        // // create a event to happen on deleting
        // static::deleted(function($model)  {
        //     $model->updated_by = Auth::user()->id;
        //     $model->deleted_by = Auth::user()->id;
        // });

        // // create a event to happen on saving
        // static::saving(function($model){
        //     $model->created_by = Auth::user()->id;
        //     $model->updated_by = Auth::user()->id;
        // });
        // static::saved(function($table){
        //     // $table->created_by = Auth::user()->id;
        //     $table->updated_by = Auth::user()->id;
        // });
        // // updating created_by and updated_by when model is created
        // static::creating(function ($model) {
        //     if (!$model->isDirty('created_by')) {
        //         $model->created_by = auth()->user()->id;
        //     }
        //     if (!$model->isDirty('updated_by')) {
        //         $model->updated_by = auth()->user()->id;
        //     }
        // });

        // // updating updated_by when model is updated
        // static::updating(function ($model) {
        //     if (!$model->isDirty('updated_by')) {
        //         $model->updated_by = auth()->user()->id;
        //     }
        // });
    }
}
