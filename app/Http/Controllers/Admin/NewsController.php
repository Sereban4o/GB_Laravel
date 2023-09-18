<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Enums\News\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $news = DB::table('news')
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.*', 'categories.title as category_title')->get();


        return \view('admin.news.index', ['newsList' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = DB::table('categories')->get();
        return \view('admin.news.create')->with(['categoriesList' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        DB::table('news')->insert(
            ['title' => $request->input('title'),
                'description' => $request->input('description'),
                'category_id' => $request->input('category'),
                'author' => $request->input('author'),
                'status' => Status::getStatus($request->input('status')),
                'created_at' => now()
            ]
        );
        return redirect()->route('admin.news.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
