<?php

namespace App\Policies;

use App\Models\AdminUser;
use App\Models\Post;

class PostPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(AdminUser $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(AdminUser $user, Post $post): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(AdminUser $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(AdminUser $user, Post $post): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(AdminUser $user, Post $post): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(AdminUser $user, Post $post): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(AdminUser $user, Post $post): bool
    {
        //
    }
}
