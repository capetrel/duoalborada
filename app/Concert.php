<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Concert extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'concert_date',
        'concert_time',
        'concert_adress1',
        'concert_adress2',
        'concert_postal_code',
        'concert_city',
        'informations',
        'concert_mail',
        'pages_id',
    ];


    /**
     * @return mixed All the years
     */
    public static function concertsYears()
    {
        return DB::table('concerts')
            ->select(DB::raw('YEAR(concert_date) AS year_concert'))
            ->groupBy('year_concert')
            ->orderBy('year_concert', 'desc')
            ->get();
    }

    /**
     * @return array of collection
     */
    public static function concertsByYear()
    {

        $years = self::concertsYears();

        $concert_by_years =[];

        foreach ($years as $year)
        {
            $concerts = DB::table('concerts')
                ->select('*')
                ->where(DB::raw('YEAR(concert_date)'), '=', intval($year->year_concert))
                ->orderBy('concert_date', 'desc')
                ->get();
            $concert_by_years[intval($year->year_concert)] = $concerts;

        }

        return $concert_by_years;

    }

    public static function getConcert($id)
    {
        return DB::table('concerts')
            ->select('*')
            ->where('id', '=', $id)
            ->get();
    }

    public static function updateConcert($datas, $id)
    {
        return DB::table('concerts')
            ->where('id', $id)
            ->update([

                'concert_date'          => $datas['concert_date'],
                'concert_time'          => $datas['concert_time'],
                'concert_adress1'       => $datas['concert_adress1'],
                'concert_adress2'       => $datas['concert_adress2'],
                'concert_postal_code'   => $datas['concert_postal_code'],
                'concert_city'          => $datas['concert_city'],
                'informations'          => $datas['informations'],
                'concert_mail'          => $datas['concert_mail'],
            ]);
    }
}
