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

        try{
            // si isset media_thumb (il y a un nouveau fichier)
            if(isset($data['media_thumb']) && !empty($data['media_thumb'])){

                $old_thumb_file = $data['media_thumb_old'];
                $old_file = $data['media_fullsize'];

                $this->deleteFile($old_thumb_file);
                $this->deleteFile($old_file);

                $paths = $this->fileManager($request, $cat, $data);

                $data['media_thumb'] = $paths['media_thumb'];
                $data['media_fullsize'] = $paths['media_fullsize'];

                unset($data['media_thumb_old']);

                // Mise à jour de la base de donnée avec les nouvelles infos
                Media::updateMedia($data, $id);

                // on récupère les info pour les envoyer à la vue
                $media = Media::getMedia($id);
                $cat_id = intval($media[0]->categories_id);
                $media_cat = Category::getCategoryName($cat_id);
                $media[0]->categories_id = $media_cat[0];
                $categories = Category::pluck('category_name', 'id')->toArray();

                Session::flash('message', 'Le media a bien été mis à jour');

                return view('admin.edit.media', compact( 'media', 'categories', 'cat_id', 'page', 'id'));
            }
            // sinon on conserve l'ancien
            $data['media_thumb'] = $data['media_thumb_old'];
            unset($data['media_thumb_old']);

            // Mise à jour de la base de donnée avec les nouvelles infos
            Media::updateMedia($data, $id);

            // on récupère les info pour les envoyer à la vue
            $media = Media::getMedia($id);
            $cat_id = intval($media[0]->categories_id);
            $media_cat = Category::getCategoryName($cat_id);
            $media[0]->categories_id = $media_cat[0];
            $categories = Category::pluck('category_name', 'id')->toArray();

            Session::flash('message', 'Le media a bien été mis à jour');

            return view('admin.edit.media', compact( 'media', 'categories','cat_id', 'page', 'id'));

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

        try{

            $paths = $this->fileManager($request, $cat, $data);

            $data['media_thumb'] = $paths['media_thumb'];
            $data['media_fullsize'] = $paths['media_fullsize'];

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

        $this->deleteFile($old_thumb);
        $this->deleteFile($old_file);

        $media->delete();

        return redirect('admin/' . $page);
    }

    private function fileManager(MediaFormRequest $request, string $cat, $data)
    {
        // Initialisation des variables pour les chemins de fichier et leur url
        $thumb_url = 'img'. DIRECTORY_SEPARATOR . $cat . DIRECTORY_SEPARATOR . 'thumbs';
        $file_url = 'img'. DIRECTORY_SEPARATOR . $cat;
        $directory_thumb = public_path("$thumb_url");
        $directory_file = public_path("$file_url");
        $this->mkdirIfNotExists($directory_thumb);
        $this->mkdirIfNotExists($directory_file);

        // On récupère le fichier, son nom et son chemin
        $image = $request->file('media_thumb');
        $imageName = $image->getClientOriginalName();
        $file = $image->getPathname();
        move_uploaded_file($file, $directory_file . DIRECTORY_SEPARATOR . $imageName);
        $moved_file = $directory_file . DIRECTORY_SEPARATOR . $imageName;
        $s = DIRECTORY_SEPARATOR;

        // Traitement de la miniature du fichier
        if ($cat === 'videos'){
            ImageManagerStatic::make($moved_file)
                ->fit(200, 200)
                ->insert(storage_path($s.'app'.$s.'public'.$s.'img'.$s.'icon-play.png'), 'center')
                ->save($directory_thumb . DIRECTORY_SEPARATOR . $imageName);
        }else{
            ImageManagerStatic::make($moved_file)->fit(200, 200)->save($directory_thumb . DIRECTORY_SEPARATOR . $imageName);
        }

        // Mise à jour de l'url du fichier
        $paths['media_thumb'] = $thumb_url . DIRECTORY_SEPARATOR . $imageName;
        $paths['media_fullsize'] = $file_url . DIRECTORY_SEPARATOR . $imageName;
        return $paths;
    }

    private function deleteFile(?string $file)
    {
        if (file_exists($file) && !is_null($file)) {
            unlink($file);
        }
    }

    private function mkdirIfNotExists($dirname)
    {
        if (!file_exists($dirname)) {
            mkdir($dirname, 775, true);
        }
    }

}
