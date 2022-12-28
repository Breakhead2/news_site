<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.resources', [
            'title' => 'Источники',
            'resources' => Resource::query()->paginate(5)
        ]);
    }

    public function store(Request $request, Resource $resource)
    {
        $this->validate($request, $this->validateRules());

        $resource->fill($request->all());
        $resource->save();

        return redirect()
        ->route('admin.resource.index')
        ->with('notice', [
            'status' => 'success',
            'text' => 'Источник успешно добавлен'
        ]);
    }

    public function edit(Resource $resource)
    {
        return view('admin.resources', [
            'title' => 'Источники',
            'resource' => $resource,
            'resources' => Resource::query()->paginate(5)
        ]);
    }

    public function update(Request $request, Resource $resource)
    {
        $this->validate($request, $this->validateRules());

        $resource->fill($request->all());
        $resource->save();

        return redirect()
            ->route('admin.resource.index')
            ->with('notice', [
                'status' => 'success',
                'text' => 'Источник успешно обновлен'
            ]);
    }

    public function destroy(Resource $resource)
    {

        $resource->delete();

        return redirect()
            ->route('admin.resource.index')
            ->with('notice', [
                'status' => 'success',
                'text' => 'Источник успешно удален'
            ]);
    }

    public function validateRules()
    {
        return [
            'name' => 'required|max:50|min:4|unique:resources,name',
            'rss_url' => 'required|unique:resources,rss_url|url|max:30|min:12|'
        ];
    }

}
