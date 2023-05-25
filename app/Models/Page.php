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

    /**
     * Called when Book needs loaded in route model binding
     * Used to allow customisation of book search and eager loading of pages
     * Also ensures soft deleted pages can be located
     */
    public function resolveRouteBinding($value, $field = null)
    {
        error_log('Page Route Model Binding: ' . $field . " = " . $value);
        $field = $field ? $field : 'id';
        // Page::withTrashed()->with('book')->where($field,$value)->first();
        return Page::with('book')->where($field,$value)->first();       
    }

    /**
     * Update slug from title field when created or updated
     */
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
