<?php
declare(strict_types=1);
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\CreateCategoryRequest;
use App\Http\Requests\Admin\Categories\EditCategoryRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\FlareClient\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index')->with(['categoriesList' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCategoryRequest $request)
    {

        $data = $request->only(['title', 'slug', 'description']);

        $category = new Category($data);

        if ($category->save()) {
            return redirect()->route('admin.categories.index')->with('success', 'Категория успешно сохранена');
        }

        return back()->with('error', 'Не удалось добавить категорию');

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
    public function edit(Category $category)
    {
        return view('admin.categories.edite', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditCategoryRequest $request, Category $category)
    {
        $data = $request->only(['title', 'description', 'slug']);

        $category->fill($data);

        if ($category->save()) {
            return redirect()->route('admin.categories.index')->with('success', 'Категрия успешно изменена');
        }

        return back()->with('error', 'Не удалось изменить категорию');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $news = News::query()->where('category_id', '=', $category->id );

        if (!empty($news)){
            return response()->json('error', 400);
        };
        try{
            $category->delete();
            return response()->json('ok');
        }catch (\Exception $e){
            Log::error($e->getMessage(), $e->getTrace());
            return response()->json('error', 400);
        }
    }
}
