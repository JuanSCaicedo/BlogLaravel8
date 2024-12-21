<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;
    public function author(User $user, Post $post)
    {
        // Verificar si el usuario tiene el rol de administrador
        if ($user->hasRole('Admin')) {
            return true; // Si el usuario es administrador, permitir el acceso
        }
    
        // Si el usuario no es administrador, verificar si es el autor del post
        return $user->id === $post->user_id ? true : false;
    }

    public function published(?User $user, Post $post)
    {
        if ($post->status == 2) {
            return true;
        } else {
            return false;
        }
    }
}
