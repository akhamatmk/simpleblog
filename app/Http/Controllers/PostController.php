<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use App\Models\PostComment;
use Auth;
use Validator;
use App\Repositories\CostumePagination;
use App\Repositories\CostumeDataArraySerializer;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use App\Transformers\PostTransformer;
use App\Transformers\PostCommentTransformer;

class PostController extends Controller
{
       
    public function other_post(Request $request)
    {      

        $limit = $request->get('limit') ? $request->get('limit') : 10;
        $post = Post::OrderBy('created_at', 'Desc')->paginate($limit);
        $pagination = new CostumePagination($post);
        $result_page = $pagination->render();           

        if(isset($post))
        {
            $manager = new Manager();
            $manager->parseIncludes(['createdby']);
            $manager->setSerializer(new CostumeDataArraySerializer());
            $resource = new Collection($post, new PostTransformer());
            $result =  $manager->createData($resource)->toArray();

        } else 
            $result = [];

        $html = "";
        if(count($result) > 0)
            $html = view('ajax.more_post')->with(['post' => $result])->render();

        $data['content'] = $html;
        $data['pagging'] = $result_page['paging'];

        return response()->json($data);
    }

    public function other_comment($post_id, Request $request)
    {
        $limit = $request->get('limit') ? $request->get('limit') : 10;
        $postComment = PostComment::where('post_id', $post_id)->OrderBy('created_at', 'Desc')->paginate($limit);
        $pagination = new CostumePagination($postComment);
        $result_page = $pagination->render();           

        if(isset($postComment))
        {
            $manager = new Manager();
            $manager->parseIncludes(['createdby']);
            $manager->setSerializer(new CostumeDataArraySerializer());
            $resource = new Collection($postComment, new PostCommentTransformer());
            $resultComment =  $manager->createData($resource)->toArray();
        } else 
            $resultComment = [];

        $html = "";
        
        if(count($resultComment) > 0)
            $html = view('ajax.more_comment')->with(['postComment' => $resultComment])->render();

        $data['content'] = $html;
        $data['pagging'] = $result_page['paging'];

        return response()->json($data);
    }

    public function detail_post($alias, Request $request)
    {

        $post = Post::where('alias', strtolower($alias))->first();        
        $post->view = $post->view + 1;
        $post->save();


        if(isset($post))
        {
            $manager = new Manager();
            $manager->parseIncludes(['createdby', 'post_tags']);
            $manager->setSerializer(new CostumeDataArraySerializer());
            $resource = new Item($post, new PostTransformer());
            $result =  $manager->createData($resource)->toArray();

        } else 
            $result = [];

        $tag = Tag::get();

    	if($post){

    		$randomPost = Post::inRandomOrder()->where('id', '!=', $post->id)->limit(3)->get();

    		if(isset($randomPost))
	        {
	            $manager = new Manager();
	            $manager->parseIncludes(['createdby']);
	            $manager->setSerializer(new CostumeDataArraySerializer());
	            $resource = new Collection($randomPost, new PostTransformer());
	            $resultRandom =  $manager->createData($resource)->toArray();

	        } else 
	            $resultRandom = [];


            $limit = $request->get('limit') ? $this->get('limit') : 1;
            $postComment = PostComment::where('post_id', $post->id)->OrderBy('created_at', 'Desc')->paginate($limit);
            $pagination = new CostumePagination($postComment);
            $result_page = $pagination->render();           

            if(isset($postComment))
            {
                $manager = new Manager();
                $manager->parseIncludes(['createdby']);
                $manager->setSerializer(new CostumeDataArraySerializer());
                $resource = new Collection($postComment, new PostCommentTransformer());
                $resultComment =  $manager->createData($resource)->toArray();
            } else 
                $resultComment = [];

            $postComment = $result;
            $paggingComment = $result_page['paging'];
            
    		return view('post/detail', ['post' => $result, 'tag' => $tag, 'random' => $resultRandom, 'postComment' => $resultComment, 'paggingComment' => $paggingComment]);
    	}
    	else
    		return redirect('home');
    }

    public function tag($alias, Request $request)
    {
    	$post = Post::select('posts.*', 'users.image')
    			->leftJoin('post_tags', 'post_tags.post_id', 'posts.id')
    			->leftJoin('tags', 'post_tags.tag_id', 'tags.id')
    			->leftJoin('users', 'users.id', 'posts.created_by')
    			->where('tags.name', strtolower($alias))->get();

         return view('post/tag', ['post' => $post]);

    }

    public function comment_ajax_store($post_id, Request $request)
    {
        if(! Auth::check())
            return response()->json(['code' => 401]);

        $PostComment = new PostComment;
        $PostComment->post_id = $post_id;
        $PostComment->created_by = Auth::user()->id;
        $PostComment->text = $request->comment_text;
        $PostComment->save();
            

        return response()->json(['code' => 200, 'comment' => $PostComment, 'user' => Auth::user()]);
    }
}
