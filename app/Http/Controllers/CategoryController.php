<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {

        $categories = Category::all();

        //хелпер view позволяет отдавать данные в представления в каталоге resources/view
        return view('category.index', [
            'categories' => $categories
        ]);
    }

    public function show(Category $category)
    {

        $news = new News();

        $news = $news->getNewsByCategoryId($category->id);

        return view('news.index', [
            'catTitle' => $category->title,
            'newsList' => $news
        ]);
    }
}
