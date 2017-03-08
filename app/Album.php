<?php

namespace Library;

use DB;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    /**
     * get Album by id
     * @param $id
     * @return mixed
     */
    public function getAlbum($id)
    {
        $album = DB::table('albums')->select('name')->where(['id' => $id])->first();
        return $album->name;
    }

    public function getAllAlbums()
    {
        return DB::table('albums AS a')
            ->leftJoin('photos AS p', 'a.id', '=', 'p.album_id')
            ->select('a.id', 'a.name', DB::raw('COUNT(p.album_id) as amount'))
            ->groupBy('a.id')
            ->orderBy('a.name')
            ->get();
    }

    /**
     * add new Album to DB
     * @param $name
     * @return mixed
     */
    public function addAlbum($name)
    {
        return DB::table('albums')->insert(
            ['name' => trim(strip_tags($name))]
        );
    }

    /**
     * Delete Album from DB
     * @param $id
     * @return mixed
     */
    public function deleteAlbum($id)
    {
        return DB::table('albums')->where(['id' => $id])->delete();
    }

}
