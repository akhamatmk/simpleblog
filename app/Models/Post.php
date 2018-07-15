<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   public function category()
   {
   		return $this->HasOne('App\Models\Categorie', 'id', 'category_id');
   }

   public function user()
   {
   		return $this->HasOne('App\User', 'id', 'created_by');
   }

   public function post_tags()
   {
   		return $this->HasMany('App\Models\PostTag', 'post_id', 'id');
   }

   Public function comment()
   {
         return $this->HasMany('App\Models\PostComment', 'post_id', 'id');
   }
}
