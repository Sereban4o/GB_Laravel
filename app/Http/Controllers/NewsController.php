<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Contracts\View\View;



final class NewsController extends Controller
{
    public function index(): View
    {
        $news = News::paginate(6);
       return \view('news.index')->with(['newsList'=> $news]);
    }

    public function show(News $news): View
    {
        //$news = News::find($id);
        return \view('news.show')->with(['news'=> $news]);
    }
}
