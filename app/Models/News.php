<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = "news";

    protected $availableFields = ['id', 'title', 'author', 'status', 'description', 'created_at'];

    public function getNews()
    {
        return \DB::table($this->table)
            ->select($this->availableFields)
            ->get()
            ->toArray();
    }

    public function getNewsById(int $id)
    {
        return \DB::table('news')
            ->select(
                'news.id',
                'news.title',
                'news.author',
                'news.status',
                'news.description',
                'news.created_at',
                'sources.source'
            )
            ->join('sources', 'news.source_id', '=', 'sources.id')
            ->where('news.id', '=', $id)
            ->get()
            ->toArray();
    }

    public function getNewsByCategoryId(int $catId)
    {
        return \DB::table('categories_has_news as catNews')
            ->select(
                'news.id',
                'news.title',
                'news.description',
                'news.author',
                'news.status',
                'news.created_at',
                'categories.title as catTitle',
                'categories.id as catId'
            )
            ->join('news', 'news.id', '=', 'catNews.news_id')
            ->join('categories', 'categories.id', '=', 'catNews.category_id')
            ->where('catNews.category_id', '=', $catId)
            ->get()
            ->toArray();

    }
}
