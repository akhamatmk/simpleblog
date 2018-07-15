<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{     
    public function transform(User $user)
    {    

        $data =  [
            'id'				=> (int) $user->id,
            'name'				=> $user->name,
            'image'				=> $user->image
        ];

        return $data;
    }    
}

