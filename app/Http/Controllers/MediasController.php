<?php
namespace App\Http\Controllers;

use App\Category;
use App\Http\Request\MediaFormRequest;
use App\Page;
use App\Media;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Session;

class MediasController extends Controller
{
    public function medias()
    {
        $text = Page::choosePageText('medias');
        $head_title = Page::currentPageTitle('medias');
        $media_from_category = Media::getMediasFromCategory();

        return view('medias', compact('text', 'head_title', 'media_from_category'));
    }

    public function edit($page, $id)
    {
        $media = Media::getMedia($id);
        $cat_id = intval($media[0]->categories_id);
        $media_cat = Category::getCategoryName($cat_id);
        $media[0]->categories_id = $media_cat[0];
        $categories = Category::pluck('category_name', 'id')->toArray();

        return view('admin.edit.media', compact( 'media', 'categories'));
    }

    public function update(MediaFormRequest $request, $page, $id)
    {
        $data = $request->all();

        try{

            var_dump($data); die();

            Session::flash('message', 'Le concert a bien été mis à jour');

            return view('admin.edit.media', compact( 'media'));

        }
        catch(ModelNotFoundException $err){
            return view('errors.500', compact('err'));
        }
    }

    public function form()
    {

        $categories = [0 => 'video', 1 => 'presses'];
        return view('admin.add.media', compact('categories'));
    }

    public function add()
    {

    }

    public function del()
    {

    }


}
