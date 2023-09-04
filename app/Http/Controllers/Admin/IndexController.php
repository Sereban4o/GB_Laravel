<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return <<<php
        <h1>Точка входа для админа</h1>
        Тут какой-то текст<br>
        <a href="/">Переход на главную страницу</a>
php;
    }
}

