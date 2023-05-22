<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'book_id','title','markdown','slug','sequence'
    ];

    public function book():  \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Book::class);
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
