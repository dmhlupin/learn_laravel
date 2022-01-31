<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = new News();
        $news = $news->getNews();

        //хелпер view позволяет отдавать данные в представления в каталоге resources/view
        return view('news.index', [
            'catTitle' => 'Все новости',
            'newsList' => $news
        ]);
    }

    public function show(int $id)
    {
        $news = new News();
        $news = $news->getNewsById($id);
        return view('news.show', [
            'news' => $news[0]
        ]);
    }
}
