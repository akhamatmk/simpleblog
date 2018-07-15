<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Post;
use App\Repositories\CostumePagination;
use App\Repositories\CostumeDataArraySerializer;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use App\Transformers\PostTransformer;

class HomeController extends Controller
{    

    public function index(Request $request)
    {
        
    	$limit = $request->get('limit') ? $this->get('limit') : 12;
        $post = Post::OrderBy('created_at', 'Desc')->paginate($limit);
        $pagination = new CostumePagination($post);
        $result_page = $pagination->render();           
        $Categorie = Categorie::get();

        if(isset($post))
        {
            $manager = new Manager();
            $manager->parseIncludes(['createdby']);
            $manager->setSerializer(new CostumeDataArraySerializer());
            $resource = new Collection($post, new PostTransformer());
            $result =  $manager->createData($resource)->toArray();

        } else 
            $result = [];

    	$data['category'] = $Categorie;
    	$data['post'] = $result;
    	$data['pagging'] = $result_page['paging'];
    	
        return view('welcome', $data);
    }    
}
