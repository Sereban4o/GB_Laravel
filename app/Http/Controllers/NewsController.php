<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $news = [
        ['id' => 1,
            'title' => 'Новость',
            'category' => 1,
            'inform' => 'Новость 1 Тут подробненько о ней',
        ],
        ['id' => 2,
            'title' => 'Новость',
            'category' => 1,
            'inform' => 'Новость 2 Тут подробненько о ней',
        ],
        ['id' => 3,
            'title' => 'Новость',
            'category' => 1,
            'inform' => 'Новость 3 Тут подробненько о ней',
        ],
        ['id' => 4,
            'title' => 'Новость',
            'category' => 1,
            'inform' => 'Новость 4 Тут подробненько о ней',
        ],
        ['id' => 5,
            'title' => 'Новость',
            'category' => 2,
            'inform' => 'Новость 5 Тут подробненько о ней',
        ],
        ['id' => 6,
            'title' => 'Новость',
            'category' => 2,
            'inform' => 'Новость 6 Тут подробненько о ней',
        ],
        ['id' => 7,
            'title' => 'Новость',
            'category' => 2,
            'inform' => 'Новость 7 Тут подробненько о ней',
        ],
        ['id' => 8,
            'title' => 'Новость',
            'category' => 2,
            'inform' => 'Новость 8 Тут подробненько о ней',
        ],
        ['id' => 9,
            'title' => 'Новость',
            'category' => 3,
            'inform' => 'Новость 9 Тут подробненько о ней',
        ],
        ['id' => 10,
            'title' => 'Новость',
            'category' => 3,
            'inform' => 'Новость 10 Тут подробненько о ней',
        ],
        ['id' => 11,
            'title' => 'Новость',
            'category' => 3,
            'inform' => 'Новость 11 Тут подробненько о ней',
        ],
        ['id' => 12,
            'title' => 'Новость',
            'category' => 3,
            'inform' => 'Новость 12 Тут подробненько о ней',
        ],
        ['id' => 13,
            'title' => 'Новость',
            'category' => 4,
            'inform' => 'Новость 13 Тут подробненько о ней',
        ],
        ['id' => 14,
            'title' => 'Новость',
            'category' => 4,
            'inform' => 'Новость 14 Тут подробненько о ней',
        ],
        ['id' => 15,
            'title' => 'Новость',
            'category' => 4,
            'inform' => 'Новость 15 Тут подробненько о ней',
        ],
        ['id' => 16,
            'title' => 'Новость',
            'category' => 4,
            'inform' => 'Новость 16 Тут подробненько о ней',
        ],
        ['id' => 17,
            'title' => 'Новость',
            'category' => 5,
            'inform' => 'Новость 17 Тут подробненько о ней',
        ],
        ['id' => 18,
            'title' => 'Новость',
            'category' => 5,
            'inform' => 'Новость 18 Тут подробненько о ней',
        ],
        ['id' => 19,
            'title' => 'Новость',
            'category' => 5,
            'inform' => 'Новость 19 Тут подробненько о ней',
        ],
        ['id' => 20,
            'title' => 'Новость',
            'category' => 5,
            'inform' => 'Новость 20 Тут подробненько о ней',
        ],
    ];


    public function news()
    {
        $html = "<h1>Новости</h1>";
        foreach ($this->news as $news) {
            $nameRoute = route('newsOne', [$news['category'], $news['id']]);

            $html .= <<<php
        <h2>
        <a href="{$nameRoute}">
        {$news['title']}
        </a>
        </h2>
        <a href = "/catogory">{$news['category']}</a>
        <div>{$news['inform']}</div>
        <hr>
        php;

        }
        return $html;
    }


    public function newsOne($category, $id)
    {
        $news = $this->getNewById($category, $id);

        $nameRoute = route('news');

        if (!empty($news)) {
            $html = <<<php
        <h1>{$news['title']}</h1>
        <div>{$news['inform']}</div>
        <hr>
        <a href = "{$nameRoute}">Назад</a>
        php;
            return $html;
        }
    }

    private function getNewById($category, $id)
    {
        foreach ($this->news as $news) {
            if ($news['id'] == $id && $news['category'] == $category) {
                return $news;
            }
        }
    }

}
