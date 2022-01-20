<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = $this->getCategories();

        //хелпер view позволяет отдавать данные в представления в каталоге resources/view
        return view('category.index', [
            'catList' => $categories
        ]);
    }

    public function show(string $title)
    {
        $category = $this->getCategories($title);
        return view('news.index', [
            'catTitle' => $title,
            'newsList' => $category['news']
        ]);
    }
}
