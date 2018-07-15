<?php

namespace App\Transformers;

use App\Models\Post;
use League\Fractal\TransformerAbstract;

class PostTransformer extends TransformerAbstract
{     
	protected $availableIncludes = [
    	'createdby', 'post_tags'
	];

    public function transform(Post $post)
    {        	
        $data =  [
            'id'				=> (int) $post->id,
            'category'			=> $post->category ? $post->category : "",
            'title'             => $post->title,
            'alias'				=> $post->alias,
            'short_description'	=> $post->short_description,
            'long_description'	=> $post->long_description,
            'like'				=> (int) $post->like,
            'view'              => (int) $post->view,
            'tags'              => $post->tags,
            'created_at'		=> $post->created_at,
            'count_comment'     => (int) count($post->comment)
        ];

        return $data;
    }

    public function includeCreatedby(Post $post)
    {
        if(isset($post->user))
            return $this->item($post->user, new UserTransformer);
    }

    public function includePostTags(Post $post)
    {
        if(isset($post->post_tags))
            return $this->collection($post->post_tags, new PostTagsTransformer);
    }
}

