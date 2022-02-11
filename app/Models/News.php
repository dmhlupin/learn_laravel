<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = "news";

    public static $availableFields = ['id', 'title', 'author', 'status', 'description', 'created_at'];

    protected $fillable = [
        'title',
        'author',
        'status',
        'description',
        'slug'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'categories_has_news',
            'news_id', 'category_id', 'id', 'id');
    }

    public function getNewsByCategoryId(int $catId)
    {
        // На выходе нужно получить экземпляр модель News
        $news = News::query()
            ->join('categories_has_news as chn', 'chn.news_id', '=', 'news.id')
            ->where('chn.category_id', $catId)
            ->get();
        return $news;

    }
}
