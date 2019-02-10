<?php
namespace App\Http\Controllers;

use App\Http\Request\LinkFormRequest;
use App\Lien;
use App\Page;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Session;

class LinksController extends Controller
{
    public function links()
    {
        $text = Page::choosePageText('liens');
        $head_title = Page::currentPageTitle('liens');

        $links = Lien::getLinks();

        return view('links', compact('text', 'head_title', 'links'));
    }

    public function edit($page, $id)
    {
        $link = Lien::getLink($id);

        return view('admin.edit.link', compact( 'link', 'page', 'id'));
    }

    public function update(LinkFormRequest $request, $page, $id)
    {
        $datas =$request->all();

        try{

            Lien::updateLink($datas, $id);

            $link = lien::getLink($id);

            Session::flash('message', 'Le lien a bien été mis à jour');

            return view('admin.edit.link', compact( 'link','page', 'id'));

        }
        catch(ModelNotFoundException $err){
            return view('errors.500', compact('err'));
        }
    }

    public function form($page)
    {
        return view('admin.add.link', compact('page'));
    }

    public function add(LinkFormRequest $request, $page)
    {

        $datas =$request->all();

        $get_page_id = Page::getPageId($page);

        $page_id = $get_page_id->all()[0]->id;

        $datas['pages_id']= $page_id;

        Lien::create($datas);

        return redirect('admin/' . $page);
    }


    public function del($page, $id)
    {
        $link = Lien::find($id);
        $link->delete();

        return redirect('admin/' . $page);
    }

}
