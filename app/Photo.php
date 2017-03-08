<?php

namespace Library;

use DB;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function albums()
    {
        return $this->belongsTo(Album::class);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getPhotosByAlbum($id)
    {
        return DB::table('photos')->where(['album_id' => $id])->get();
    }

    /**
     * Add new photo to album
     * @param $paramsPhoto
     * @return mixed
     */
    public function addPhoto($paramsPhoto)
    {
        return DB::table('photos')->insert(
            [
                'photos_link' => trim(strip_tags($paramsPhoto['link'])),
                'album_id' => trim(strip_tags($paramsPhoto['albumId'])),
            ]
        );    }

    /**
     * Delete photo from album
     * @param $id
     * @return mixed
     */
    public function deletePhoto($id)
    {
        return DB::table('photos')->where(['photos_id' => $id])->delete();
    }

}
