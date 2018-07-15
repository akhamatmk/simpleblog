<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    public function tag()
   {
   		return $this->HasOne('App\Models\Tag', 'id', 'tag_id');
   }
}
