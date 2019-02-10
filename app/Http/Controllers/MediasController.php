<?php
namespace App\Http\Controllers;

use App\Category;
use App\Http\Request\MediaFormRequest;
use App\Page;
use App\Media;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic;

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

        return view('admin.edit.media', compact( 'media', 'categories', 'cat_id', 'page', 'id'));
    }

    public function update(MediaFormRequest $request, $page, $id)
    {
        // On récupère les données postées
        $data = $request->all();

        // récupère la catégorie pour les chemins de fichier
        $category = Category::getCategoryName($data['categories_id']);
        $cat = str_slug($category[0]);

        // récupère l'id de la page et met à jour la request
        $page_id = Page::getId($page);
        $data['pages_id'] = $page_id->id;

        // Initialisation des variables pour les chemin de fichier et leur url
        $thumb_url = 'img'. DIRECTORY_SEPARATOR . $cat . DIRECTORY_SEPARATOR . 'thumbs';
        $file_url = 'img'. DIRECTORY_SEPARATOR . $cat;
        $directory_thumb = public_path("$thumb_url");
        $directory_file = public_path("$file_url");
        try{
            // si isset media_thumb (il y a un nouveau fichier)
            if(isset($data['media_thumb']) && !empty($data['media_thumb'])){

                $old_thumb_file = $data['media_thumb_old'];
                $old_file = $data['media_fullsize'];
                if (file_exists($old_thumb_file)) {
                    unlink($old_thumb_file);
                    unlink($old_file);
                }

                unset($data['media_thumb_old']);
                // On récupère le fichier, son nom et son chemin
                $image = $request->file('media_thumb');

                $imageName = $image->getClientOriginalName();
                $file = $image->getPathname();

                // Traitement du fichier
                ImageManagerStatic::make($file)->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($directory_thumb . DIRECTORY_SEPARATOR . $imageName);
                ImageManagerStatic::make($file)->save($directory_file . DIRECTORY_SEPARATOR . $imageName);

                // Mise à jour de l'url du fichier dans request
                $data['media_thumb'] = $thumb_url . DIRECTORY_SEPARATOR . $imageName;
                $data['media_fullsize'] = $file_url . DIRECTORY_SEPARATOR . $imageName;

                // Mise à jour de la base de donnée avec les nouvelles infos
                Media::updateMedia($data, $id);

                // on récupère ses info pour les envoyer à la vue
                // TODO tester de renvoyer les données dans $data (economise une query) ou un last insert id
                $media = Media::getMedia($id);
                $cat_id = intval($media[0]->categories_id);
                $media_cat = Category::getCategoryName($cat_id);
                $media[0]->categories_id = $media_cat[0];
                $categories = Category::pluck('category_name', 'id')->toArray();

                Session::flash('message', 'Le media a bien été mis à jour');

                return view('admin.edit.media', compact( 'media', 'categories', 'page', 'id'));
            }

            $data['media_thumb'] = $data['media_thumb_old'];
            unset($data['media_thumb_old']);

            // Mise à jour de la base de donnée avec les nouvelles infos
            Media::updateMedia($data, $id);

            // on récupère ses info pour les envoyer à la vue
            // TODO tester de renvoyer les données dans $data (economise une query) ou un last insert id
            $media = Media::getMedia($id);
            $cat_id = intval($media[0]->categories_id);
            $media_cat = Category::getCategoryName($cat_id);
            $media[0]->categories_id = $media_cat[0];
            $categories = Category::pluck('category_name', 'id')->toArray();

            Session::flash('message', 'Le media a bien été mis à jour');

            return view('admin.edit.media', compact( 'media', 'categories', 'page', 'id'));

        }
        catch(ModelNotFoundException $err){
            return view('errors.500', compact('err'));
        }
    }

    public function form($page, $cat)
    {
        $categories = Category::pluck('category_name', 'id')->toArray();
        $c = Category::getCategoryFromSlug($cat);
        $category = $c->category_name;
        $category_id = $c->id;

        return view('admin.add.media', compact('categories', 'cat', 'page', 'category', 'category_id'));
    }

    public function add(MediaFormRequest $request, $page, $cat)
    {
        // On récupère les données postées
        $data = $request->all();

        // récupère l'id de la page et met à jour la request
        $page_id = Page::getId($page);
        $data['pages_id'] = $page_id->id;

        // Initialisation des variables pour les chemin de fichier et leur url
        $thumb_url = 'img'. DIRECTORY_SEPARATOR . $cat . DIRECTORY_SEPARATOR . 'thumbs';
        $file_url = 'img'. DIRECTORY_SEPARATOR . $cat;
        $directory_thumb = public_path("$thumb_url");
        $directory_file = public_path("$file_url");
        try{

            $image = $request->file('media_thumb');
            $imageName = $image->getClientOriginalName();
            $file = $image->getPathname();

            // Traitement du fichier
            ImageManagerStatic::make($file)->resize(null, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($directory_thumb . DIRECTORY_SEPARATOR . $imageName);
            ImageManagerStatic::make($file)->save($directory_file . DIRECTORY_SEPARATOR . $imageName);

            // Mise à jour de l'url du fichier dans request
            $data['media_thumb'] = $thumb_url . DIRECTORY_SEPARATOR . $imageName;
            $data['media_fullsize'] = $file_url . DIRECTORY_SEPARATOR . $imageName;

            // ajout du nouveau media en base de données
            Media::create($data);

            return redirect('admin/' . $page);

        }
        catch(ModelNotFoundException $err){
            return view('errors.500', compact('err'));
        }

    }

    public function del($page, $id)
    {
        $media = Media::find($id);
        $files = Media::getMediaFiles($id);
        $old_thumb = public_path($files->media_thumb);
        $old_file = public_path($files->media_fullsize);

        if (file_exists($old_thumb)) {
            unlink($old_thumb);
            unlink($old_file);
        }

        $media->delete();

        return redirect('admin/' . $page);
    }

    // TODO créer une fonction fileManager pour les methodes update et add
    private function fileManager()
    {

    }

}
