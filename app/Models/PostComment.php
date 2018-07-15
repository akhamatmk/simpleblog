<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
   public function user()
   {
      return $this->HasOne('App\User', 'id', 'created_by');
   }
}
