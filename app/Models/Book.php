<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use App\Enums\Role;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable  = ['id', 'slug', 'title', 'description', 'user_id'];


    public function pages(): \Illuminate\Database\Eloquent\Relations\HasMany {
        return $this->hasMany(Page::class)->orderBy('sequence', 'asc');;
    }

    /**
     * Called when Book needs loaded in route model binding
     * Used to eagerly load pages
     */
    public function resolveRouteBinding($value, $field = null)
    {
        error_log('Book Route Model Binding: ' . $field . " = " . $value);
        $field = $field ? $field : 'id';
        return Book::with('pages')->where($field,$value)->first();           
    }

    public function scopeAuthored($query)
    {
        $user = \Auth::user();
        if ($user?->isAdministrator())
        {
            return $query;
        }
        return $query->where('user_id', $user?->id);
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
