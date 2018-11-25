<?php

namespace App\Http\Controllers;

use App\Concert;
use App\Http\Page;
use App\Http\Request\PagesFormRequest;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_data = User::getUser(Auth::id());

        return view('admin.home', compact('user_data'));
    }

    public function show($pages)
    {

        $page_content = Page::getContent($pages);
        $concerts = Concert::concertsByYear();
        //$links = Lien::getLinks();

        //$media_from_category = Media::getMediasFromCategory();

        return view('admin.welcome', compact( 'page_content', 'concerts'));

    }

    public function edit($pages)
    {
        $page_content = Page::getEditContent($pages);

        return view('admin.edit.pages', compact( 'page_content'));
    }

    public function update(PagesFormRequest $request, $page)
    {

        $datas =$request->all();

        try{

            Page::updatePage($datas, $page);
            $page_content = Page::getContent($page);

            Session::flash('message', 'La modification à bien été prise en compte');

            return view('admin.home', compact('page_content'));

        }
        catch(ModelNotFoundException $err){
            return view('errors.500', compact('err'));
        }

    }
}
