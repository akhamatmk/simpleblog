<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Auth;
use Validator;
use App\Repositories\CostumePagination;
use App\Repositories\CostumeDataArraySerializer;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use App\Transformers\PostTransformer;

class PostController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its zxxzunctionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';    

    public function create(Request $request)
    {
        $Categorie = Categorie::get();
        return view('admin/post/create', ['category' => $Categorie]);
    }

    public function store(Request $request)
    {
        $rules = [
            'category'  => 'required',
            'title'  => 'required',
            'short_desc'  => 'required',
            'long_desc'  => 'required'
        ];

        $validator = Validator::make(
            $request->all(),
            $rules
        );

        if ($validator->fails())
            return  $validator->errors()->all();

        $category = Categorie::find($request->category);

        if(! $category)
            return  ['category not found'];

        $tags =  $request->input('hidden-tags');

        $tags_temp = explode(',', $tags);
        
        $alias = str_replace(" ", "-",  $request->title);
        $alias = str_replace("?", "",  $alias);
        $alias = str_replace(".", "",  $alias);
        $alias = str_replace(",", "",  $alias);

        $post = new Post;
        $post->category_id = $request->category;
        $post->title = $request->title;
        $post->alias = strtolower($alias);
        $post->short_description = $request->short_desc;
        $post->long_description = $request->long_desc;
        $post->created_by = Auth::user()->id;
        $post->save();

        foreach ($tags_temp as $key => $value) {
            $tag = Tag::where('name', strtolower($value))->first();
            if(! $tag)
            {
                $tag = new Tag;
                $tag->name = strtolower($value);
                $tag->save();
            }

            $postTag = new PostTag;
            $postTag->post_id = $post->id;
            $postTag->tag_id = $tag->id;
            $postTag->save();
        }

        return redirect('admin');
    }
}
