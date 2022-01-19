<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = $this->getNews();

        //хелпер view позволяет отдавать данные в представления в каталоге resources/view
        return view('news.index', [
            'newsList' => $news
        ]);
    }

    public function show(int $id)
    {
        $news = $this->getNews($id);
        return view('news.show', [
            'news' => $news
        ]);
    }
}
