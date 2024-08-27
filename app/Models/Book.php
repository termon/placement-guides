<?php

namespace App\Models;

use App\Enums\Role;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        $user = Auth::user();
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

    /**
     * clone book, setting owner to $user and save in database
     *  
     * @param User $user - owner of cloned book
     * @return Book      - return cloned book;
     */
    public function cloneForUser(User $user) 
    {
        $book = $this;
      
        // transaction to return clone of book
        $clone = DB::transaction(function() use ($book, $user)
        {
            try
            {      
                $copy = $this->replicate();
                $copy->title = $this->title . " (copy)";
                $copy->user_id = $user->id;          
                $copy->save();
                
                // clone pages
                foreach($book->pages as $page)
                {     
                    $p = $page->replicate();                   
                    $copy->pages()->create($p->toArray());                  
                }   
                $copy->push();  
            } catch(\Exception $e) {
                DB::rollback();
                $copy = null;
            }
            return $copy;             
        });

        return $clone; 
    }
}
