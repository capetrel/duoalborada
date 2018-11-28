<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Media extends Model
{

    /**
     * @return mixed use toArray() Laravel method on the result
     */
    public static function getMediasCategories()
    {
        return DB::table('categories')
            ->pluck('category_name');
    }

    public static function getFormMediasCategories()
    {
        return DB::table('categories')
            ->select('*')
            ->get()->toArray();
    }

    /**
     * @return array of collections
     */
    public static function getMediasFromCategory()
    {

        $categories= self::getMediasCategories();

        $media_from_category = [];

        foreach ($categories as $category)
        {
            $medias = DB::table('medias')
                ->select('medias.*')
                ->join('categories', 'medias.categories_id', 'categories.id')
                ->where('categories.category_name', '=', $category)
                ->orderBy('media_date', 'desc')
                ->get();
            $media_from_category[$category] = $medias;

        }

        return $media_from_category;
    }

    public static function getMedia($id)
    {
        return DB::table('medias')
            ->select('*')
            ->where('id', '=', $id)
            ->get();
    }

}
