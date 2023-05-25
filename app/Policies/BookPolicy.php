<?php

namespace App\Policies;

use App\Enums\Role;
use App\Models\Book;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BookPolicy
{

    /**
     * Perform pre-authorization checks.
     */
    public function before(User $user, string $ability): bool|null
    {
        if ($user->isAdministrator()) {
            //error_log('BookPolicy: using administrator role');         
            return true;
        }
    
        return null;
    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Book $book): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role === Role::STAFF->value;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Book $book): bool
    {
        //error_log('UPDATE POLICY: ' . $user->role . " Book " . $book?->title); 
        return $user->id === $book->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Book $book): bool    
    {
        //error_log('DELETE POLICY: ' . $user->role . " Book " . $book?->title); 
        return $user->id === $book->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Book $book): bool
    {
        error_log('RESTORE POLICY: ' . $user->role . " Book " . $book?->title); 
        return $user->id === $book->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Book $book): bool
    {
        error_log('FORCEDELETE POLICY: ' . $user->role . " Book " . $book?->title); 
        return $user->role === Role::ADMIN->value;
    }
}
