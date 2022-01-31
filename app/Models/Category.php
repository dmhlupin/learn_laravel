<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";


    public function getCategories()
    {
        return \DB::table($this->table)
            ->get()
            ->toArray();
    }

    public function getCategoryById($id)
    {
        return \DB::table($this->table)->find($id);
    }
}
