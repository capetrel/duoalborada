<?php
namespace App\Http\Controllers;

use App\Page;

class PagesController extends Controller
{
    public function index()
    {
        $text = Page::choosePageText('presentation');
        $head_title = Page::currentPageTitle('presentation');

        return view('presentation', compact('text', 'head_title'))->with(trans('presentation'));
    }

    public function mentions()
    {
        $text = Page::choosePageText('mentions');
        $head_title = Page::currentPageTitle('mentions');

        return view('mentions', compact('text', 'head_title'));
    }

    public function sitemap()
    {
        $text = Page::choosePageText('sitemap');
        $head_title = Page::currentPageTitle('sitemap');

        return view('sitemap', compact('text', 'head_title'))->with(trans('sitemap'));
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
