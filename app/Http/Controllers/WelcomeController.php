<?php
namespace App\Http\Controllers;

use App\Http\Page;

class WelcomeController extends Controller
{
    public function index()
    {
        $text = Page::choosePageText('presentation');
        $head_title = Page::currentPageTitle('presentation');

        return view('welcome', compact('text', 'head_title'))->with(trans('welcome'));
    }

    public function mentions()
    {
        $text = Page::choosePageText('mentions');
        $head_title = Page::currentPageTitle('mentions');

        return view('mentions', compact('text', 'head_title'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse met la localisation en fonction de la langue du navigateur
     */
    public function langage()
    {
        session()->set('locale', session('locale') == 'fr' ? 'en' : 'fr');
        return redirect()->back();
    }
}
