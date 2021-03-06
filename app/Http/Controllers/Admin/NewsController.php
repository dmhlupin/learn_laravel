<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::with('categories')->paginate(5);


        return view('admin.news.index', [
            'newsList' => $news,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $categories = Category::all();
        return view('admin.news.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:3'],
            'author' => ['required', 'string', 'min:3', 'max:50'],
            'status' => ['required', 'string', 'min:4', 'max:8'],
            'isImage' => ['nullable', 'boolean'],
            'image' => ['nullable', 'file', 'image', 'mimes:jpg, png'],
            'description' => ['nullable', 'string']

        ]);

        $data = $request->only(['title', 'author', 'status', 'description']) + [
            'slug' =>\Str::slug($request->input('title'))
        ];

        $created = News::create($data);

        if($created) {
//            foreach($request->input('categories') as $category) {
//                \DB::table('categories_has_news')
//                    ->insert([
//                        'category_id' => intval($category),
//                        'news_id' => $created->id
//                    ]);
                $created->categories()->attach($request->input('categories'));
//            }
            return redirect()->route('admin.news.index')
                ->with('success', '???????????? ?????????????? ??????????????????');
        }
        return back()->with('error', '???? ?????????????? ???????????????? ????????????')
            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        $selectCategories = \DB::table('categories_has_news')
            ->where('news_id', $news->id)
            ->get()
            ->map(fn($item) => $item->category_id)
            ->toArray();
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories,
            'selectCategories' => $selectCategories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, News $news)
    {

        $data = $request->only(['title', 'author', 'status', 'description']) + [
                'slug' =>\Str::slug($request->input('title'))
        ];


        $updated = $news->fill($data)->save();

        if($updated){
            \DB::table('categories_has_news')
                ->where('news_id', $news->id)
                ->delete();
            foreach($request->input('categories') as $category) {
                \DB::table('categories_has_news')
                    ->insert([
                        'category_id' => intval($category),
                        'news_id' => $news->id
                    ]);
            }
            return redirect()->route('admin.news.index')
                ->with('success', '???????????? ?????????????? ??????????????????');
        }
        return back()->with('error', '???? ?????????????? ???????????????? ????????????')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {

        $deleted = $news->delete();
        if($deleted) {
            return redirect()->route('admin.categories.index')
                ->with('success', '???????????? ?????????????? ??????????????');
        }
        return back()->with('error', '???? ?????????????? ?????????????? ????????????')
            ->withInput();
    }
}
