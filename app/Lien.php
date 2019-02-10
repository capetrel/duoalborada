<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lien extends Model
{

    public $timestamps = false;

    protected $table = 'links';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'link_title',
        'link_name',
        'link',
        'pages_id',
    ];

    public static function getLinks()
    {
        return DB::table('links')
            ->select('id','link_title', 'link_name', 'link', 'pages_id')
            ->get();
    }

    public static function getLink($id)
    {
        return DB::table('links')
            ->select('*')
            ->where('id', '=', $id)
            ->get();
    }

    public static function updateLink($datas, $id)
    {
        return DB::table('links')
            ->where('id', $id)
            ->update([
                'link_title'        => $datas['link_title'],
                'link_name'         => $datas['link_name'],
                'link'              => $datas['link'],

            ]);
    }

}
