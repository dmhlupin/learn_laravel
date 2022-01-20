<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getNews(int $id = null): array
    {
        $faker = Factory::create();
        $data = [];

        if($id) {
            return [
                'id' => $id,
                'title' => $faker->jobTitle(),
                'description' => $faker->text(100),
                'author' => $faker->userName(),
                'created_at' => now('Europe/Moscow')
            ];
        }

        for($i = 1; $i <= 10; $i++) {
            $data[$i] = [
                'id' => $i,
                'title' => $faker->jobTitle(),
                'description' => $faker->text(100),
                'author' => $faker->userName(),
                'created_at' => now('Europe/Moscow')
            ];
        }

        return $data;
    }

    public function getCategories(string $catTitle = null): array
    {
        $faker = Factory::create();
        $data = [];
        
        if($catTitle) {
            return [
                'title' => $catTitle,
                'news' => $this->getNews()
            ];
        }
        
        for($i = 1; $i <= 5; $i++) {
            $data[$i] = [
                'id' => $i,
                'title' => $faker->sentence(1),
                'news' => $this->getNews()
            ];
        }
        return $data;
        
    }
};
