<?php
namespace App\Http\Controllers;

use App\Concert;
use App\Page;
use App\Http\Request\ConcertFormRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Session;

class ConcertsController extends Controller
{
    public function concerts()
    {
        $text = Page::choosePageText('concerts');
        $head_title = Page::currentPageTitle('presentation');

        $concerts = Concert::concertsByYear();

        $limit_date = key($concerts) - 2;

        return view('concerts', compact('text', 'head_title', 'concerts', 'limit_date'));
    }

    public function edit($page, $id)
    {
        $concert = Concert::getConcert($id);

        return view('admin.edit.concert', compact( 'concert'));
    }

    public function update(ConcertFormRequest $request, $page, $id)
    {
        $data = $request->all();

        try{

            Concert::updateConcert($data, $id);

            $concert = Concert::getConcert($id);

            Session::flash('message', 'Le concert a bien été mis à jour');

            return view('admin.edit.concert', compact( 'concert'));

        }
        catch(ModelNotFoundException $err){
            return view('errors.500', compact('err'));
        }
    }

    public function form()
    {
        return view('admin.add.concert');
    }

    public function add(ConcertFormRequest $request, $page)
    {

        $datas =$request->all();

        $get_page_id = Page::getPageId($page);

        $page_id = $get_page_id->all()[0]->id;

        $datas['pages_id']= $page_id;


        Concert::create($datas);

        Session::flash('message', 'Le concert a bien été ajouté');

        return redirect('home/concerts');
    }

    public function del($page, $id)
    {

        $concert = Concert::find($id);

        $concert->delete();

        Session::flash('message', 'Le concert a bien été supprimé');

        return redirect('home/concerts');
    }
}
