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

        return view('admin.edit.concert', compact( 'concert', 'page', 'id'));
    }

    public function update(ConcertFormRequest $request, $page, $id)
    {
        $data = $request->all();

        try{

            Concert::updateConcert($data, $id);
            $concert = Concert::getConcert($id);
            Session::flash('message', 'Le concert a bien été mis à jour');

            return view('admin.edit.concert', compact( 'concert', 'page', 'id'));
        }
        catch(ModelNotFoundException $err){
            return view('errors.500', compact('err'));
        }
    }

    public function form($page)
    {
        return view('admin.add.concert', compact('page'));
    }

    public function add(ConcertFormRequest $request, $page)
    {
        $data = $request->all();
        $get_page_id = Page::getPageId($page);
        $page_id = $get_page_id->all()[0]->id;
        $data['pages_id']= $page_id;
        Concert::create($data);

        return redirect('admin/' . $page);
    }

    public function del($page, $id)
    {
        $concert = Concert::find($id);
        $concert->delete();

        return redirect('admin/'. $page);
    }
}
