<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ParserService;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\Services\Interfaces\Parser;

class ParserController extends Controller
{
    public function __invoke(Request $request, Parser $parserService){

        $urls = ['https://lenta.ru/rss',
                'https://news.rambler.ru/rss/Petrozavodsk/',
        ];


        foreach ($urls as $url) {
            $parserService->setLink($url)->saveParserData();
        };
    }
}
