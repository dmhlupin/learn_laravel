<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = new Category();
        $categories = $categories->getCategories();

        //хелпер view позволяет отдавать данные в представления в каталоге resources/view
        return view('category.index', [
            'catList' => $categories
        ]);
    }

    public function show(int $id)
    {
        $news = new News();
        $categories = new Category();
        $news = $news->getNewsByCategoryId($id);
        $catTitle = $categories->getCategoryById($id);
        $catTitle = $catTitle->title;

        return view('news.index', [
            'catTitle' => $catTitle,
            'newsList' => $news
        ]);
    }
}
