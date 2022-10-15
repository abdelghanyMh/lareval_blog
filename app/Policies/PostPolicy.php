<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;

use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
   use HandlesAuthorization;

   // this mean if the current user has the right to update a post 
   // this method will return True 
   public function update(User $user, Post $post)
   {
      return $user->id === $post->user_id;
   }


   public function delete(User $user, Post $post)
   {
      return $user->id === $post->user_id;
   }
}
