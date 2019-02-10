<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $table = 'categories';

    public static function getCategoryName($id)
    {
        return DB::table('categories')
            ->select('category_name')
            ->where('id', '=', $id)
            ->pluck('category_name')
            ->toArray();
    }

    public static function getCategoryFromSlug($slug)
    {
        return DB::table('categories')
            ->select('category_name', 'id')
            ->where('category_slug', '=', $slug)
            ->first();
    }

}
