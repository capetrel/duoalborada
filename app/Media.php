<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Media extends Model
{

    protected $table = 'medias';

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'media_date';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'media_title',
        'media_thumb',
        'media_fullsize',
        'media_link',
        'media_description',
        'media_date',
        'categories_id',
        'pages_id',
    ];

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

    public static function getMediaFiles($id)
    {
        return DB::table('medias')
            ->select('media_thumb', 'media_fullsize')
            ->where('id', '=', $id)
            ->first();
    }

    public static function updateMedia($datas, $id)
    {
        return DB::table('medias')
            ->where('id', $id)
            ->update([
                'media_title'          => $datas['media_title'],
                'media_thumb'          => $datas['media_thumb'],
                'media_fullsize'       => $datas['media_fullsize'],
                'media_link'           => $datas['media_link'],
                'media_description'    => $datas['media_description'],
                'media_date'           => $datas['media_date'],
                'categories_id'        => $datas['categories_id'],
                'pages_id'             => $datas['pages_id'],
            ]);
    }


}
