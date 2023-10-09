<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Resources\CreateResourceRequest;
use App\Http\Requests\Admin\Resources\EditResourceRequest;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resources = Resource::all();
        return view('admin.resources.index')->with(['resourcesList' => $resources]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view('admin.resources.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateResourceRequest $request)
    {
        $data = $request->only(['link']);

        $resource = new Resource($data);

        if ($resource->save()) {
            return redirect()->route('admin.resources.index')->with('success', 'Ресур успешно сохранен');
        }

        return back()->with('error', 'Не удалось добавить ресурс');
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
    public function edit(Resource $resource)
    {
        return view('admin.resources.edite', [
            'resource' => $resource,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditResourceRequest $request, Resource $resource)
    {
        $data = $request->only(['link']);

        $resource->fill($data);

        if ($resource->save()) {
            return redirect()->route('admin.resources.index')->with('success', 'Ресур успешно изменен');
        }

        return back()->with('error', 'Не удалось изменить ресурс');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resource $resource)
    {
        try{
            $resource->delete();
            return response()->json('ok');
        }catch (\Exception $e){
            Log::error($e->getMessage(), $e->getTrace());
            return response()->json('error', 400);
        }
    }
}
