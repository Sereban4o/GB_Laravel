<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index()
    {
        return <<<php
        <h1>Приветствие на нашем проекте</h1>

php;

    }
}
