<?php

namespace App\Services;

use App\Enums\News\Status;
use App\Models\Category;
use App\Models\News;
use App\Services\Interfaces\Parser;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
    private string $link;

    public function setLink(string $link): Parser
    {
        $this->link = $link;

        return $this;
    }

    public function saveParserData(): void
    {

        $parser = XmlParser::load($this->link);
        $data = $parser->parse([
            'title' =>['uses'=>'channel.title'],
            'link'=>['uses'=>'channel.link'],
            'description'=>['uses'=>'channel.description'],
            'image'=>['uses'=>'channel.image'],
            'news'=>['uses'=>'channel.item[title,link,author,description,pubDate,category,enclosure::url]'],
        ]);

        foreach ($data['news'] as $news){

            $category = Category::query()->firstOrCreate([
                'title'=>$news['category'],
                'description'=>$news['category'],
                'slug'=>str_slug($news['category']),
            ]);

            News::query()->firstOrCreate([
                'category_id'=>$category->id,
                'title'=>$news['title'],
                'author'=>$news['author'],
                'status'=>Status::ACTIVE->value,
                'image'=>$news['enclosure::url'],
                'description'=>$news['description']
            ]);
        }
    }
}
