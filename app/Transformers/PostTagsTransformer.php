<?php

namespace App\Transformers;

use App\Models\PostTag;
use League\Fractal\TransformerAbstract;

class PostTagsTransformer extends TransformerAbstract
{     
    public function transform(PostTag $postTag)
    {    
        $data =  [
            'id'					=> (int) $postTag->id,
            'tag_name'				=> $postTag->tag->name ? $postTag->tag->name : "",
        ];

        return $data;
    }    
}

