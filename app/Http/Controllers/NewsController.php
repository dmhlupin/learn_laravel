<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {

        $news = News::query() // query также можно опустить так как модель итак возвращает объект
            ->select(News::$availableFields)
            ->get();

        //хелпер view позволяет отдавать данные в представления в каталоге resources/view
        return view('news.index', [
            'catTitle' => 'Все новости',
            'newsList' => $news
        ]);
    }

    public function show(News $news)
    {

        return view('news.show', [
            'news' => $news
        ]);
    }
}
