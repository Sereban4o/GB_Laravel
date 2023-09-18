<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;


final class NewsController extends Controller
{
    public function index(): View
    {
        $news = DB::table('news')->get();
       return \view('news.index')->with(['newsList'=> $news]);
    }

    public function show(int $id): View
    {
        $news = DB::table('news')->find($id);
        return \view('news.show')->with(['news'=> $news]);
    }
}
