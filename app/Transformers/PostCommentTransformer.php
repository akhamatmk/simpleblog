<?php

namespace App\Transformers;

use App\Models\PostComment;
use League\Fractal\TransformerAbstract;

class PostCommentTransformer extends TransformerAbstract
{     
	protected $availableIncludes = [
    	'createdby'
	];

    public function transform(PostComment $PostComment)
    {        	
        $data =  [
            'id'				=> (int) $PostComment->id,
            'text'             => $PostComment->text,
            'created_at'			   => $PostComment->created_at,
        ];

        return $data;
    }

    public function includeCreatedby(PostComment $PostComment)
    {
        if(isset($PostComment->user))
            return $this->item($PostComment->user, new UserTransformer);
    }
}

