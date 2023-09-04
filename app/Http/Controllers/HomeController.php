<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
{
    return <<<php
        <h1>Приветствие пользователя</h1>
        Тут какой-то текст<br>
        <a href="/">Переход на admin страницу</a>
php;

}
}
