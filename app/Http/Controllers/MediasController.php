<?php
namespace App\Http\Controllers;

use App\Category;
use App\Page;
use App\Media;

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
}
