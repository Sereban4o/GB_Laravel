<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Enums\News\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\CreateRequest;
use App\Http\Requests\Admin\News\EditRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Enum;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        return view('admin.news.index', [
            'newsList' => News::query()
                ->status()
                ->with('category')
                ->orderByDesc('id')
                ->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::all();
        return \view('admin.news.create')
            ->with(['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {



        $data = $request->only(['category_id', 'title', 'author', 'status', 'description', 'image']);

        $url = null;
        if ($request->file('image')) {
            $path = Storage::putFile('public/img', $request->file('image'));
            $url = Storage::url($path);
        }
        $data['image'] = $url;

        $news = new News($data);

        if ($news->save()) {
            return redirect()->route('admin.news.index')->with('success', 'Запись успешно сохранена');
        }

        return back()->with('error', 'Не удалось добавить запись');
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
    public function edit(News $news): View
    {
        $categories = Category::all();
        return view('admin.news.edite', [
            'categories' => $categories,
            'news' => $news,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, News $news)
    {


        $data = $request->only(['category_id', 'title', 'author', 'status', 'description', 'image']);


        if($request->file('image')) {
        $request->validate([ 'image' => ['sometimes', 'image', 'mimes:jpg,jpeg,bmp,png']]);

            $path = Storage::putFile('public/img', $request->file('image'));
            $url = Storage::url($path);
            $data['image']=$url;
    }


        $news->fill($data);

        if ($news->save()) {
            return redirect()->route('admin.news.index')->with('success', 'Запись успешно изменена');
        }

        return back()->with('error', 'Не удалось обновить запись');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        try{
            $news->delete();
            return response()->json('ok');
        }catch (\Exception $e){
            Log::error($e->getMessage(), $e->getTrace());
            return response()->json('error', 400);
        }
    }
}
