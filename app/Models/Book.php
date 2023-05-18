<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
