<?php

namespace Library\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use League\Flysystem\Exception;
use Library\Album;
use Library\Photo;
use Library\Http\Requests;
use Library\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class AlbumsController extends Controller
{
    /**
     * Get list of Albums in order by alphabet
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $album = new Album();
        return view('albums', ['albums' => $album->getAllAlbums()]);
    }

    /**
     * Get new Album from request and store it to DB
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $album = new Album();
        try {
            $album->addAlbum($request->input('album'));
            return Redirect::back();
        } catch (Exception $e) {
            echo 'Sorry, something going wrong';
        }
    }

    /**
     * Delete Album and all his Photos
     * @param Request $request
     * @return string
     */
    public function deleteAlbum(Request $request)
    {
        $album = new Album();
        try {
            $album->deleteAlbum($request->input('deleteSubject'));
            $afterDelete = ['result' => true];
        } catch (Exception $e) {
            $afterDelete = ['result' => false];
        }
        return json_encode($afterDelete);
    }

}
