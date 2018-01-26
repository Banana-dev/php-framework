<?php

namespace App\Controller;

use App\Model\Table\ArtistsTable;
use App\Model\Table\TracksTable;
use Banana\Controller\BaseController;
use Banana\Utility\Hash;

class ArtistsController extends BaseController
{
    public function index()
    {
        $artists = new ArtistsTable();
        $artists->getAll();

        echo $this->_render('Artists/index', ['artists' => $artists, 'title' => 'Artistes']);
    }

    public function view($id)
    {
        $artist = new ArtistsTable();
        $artist = $artist->getById($id)->firstOrFail();

        $title = $artist->name;

        $tracks = new TracksTable();
        $tracks = $tracks->getByArtist_id($artist->id);

        echo $this->_render('Artists/view', ['artist' => $artist, 'title' => $title, 'tracks' => $tracks->entities]);
    }
}