<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable  = ['id', 'slug', 'title'];


    public function pages(): \Illuminate\Database\Eloquent\Relations\HasMany {
        return $this->hasMany(Page::class)->orderBy('sequence', 'asc');;
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->slug = Str::of($model->title)->slug('-');
        });


        self::updating(function($model){
            $model->slug = Str::of($model->title)->slug('-');
        });
        
    }
}
