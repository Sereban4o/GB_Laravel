<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsingJob;
use App\Models\Resource;
use App\Services\ParserService;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\Services\Interfaces\Parser;

class ParserController extends Controller
{
    public function __invoke(Request $request, Parser $parserService){

        $resources = Resource::all();


        foreach ($resources as $resource) {
            dispatch(new NewsParsingJob($resource['link']));
        }

        return redirect(route('admin.news.index'));

    }
}
