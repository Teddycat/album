<?php

namespace Library\Http\Controllers;

use Illuminate\Http\Request;

use Library\Photo;
use Library\Album;
use Library\Http\Requests;
use Library\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class PhotosController extends Controller
{
    public function index($id)
    {
        $photos = new Photo();
        $album = new Album();
        return view('photos', ['photos' => $photos->getPhotosByAlbum($id), 'album' => $album->getAlbum($id), 'albumId' => $id]);
    }

    /**
     * Get new book info from request and store it to DB. album' id already included in request parameters
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $photos = new Photo();
        $photos->addPhoto($request->input());
        return Redirect::back();
    }

    /**
     * Delete one book from selected album
     * @param Request $request
     * @return string
     */
    public function deletePhoto(Request $request)
    {
        $photos = new Photo();
        try {
            $photos->deletePhoto($request->input('deleteSubject'));
            $afterDelete = ['result' => true];
        } catch (Exception $e) {
            $afterDelete = ['result' => false];
        }
        return json_encode($afterDelete);
    }
}
