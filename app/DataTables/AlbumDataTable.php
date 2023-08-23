<?php

namespace App\DataTables;

use App\Models\Album;
use App\Models\AlbumCategory;

/**
 * Class StaffDataTable
 */
class AlbumDataTable
{
    /*
     *
     */
    public function get()
    {

        $query = Album::with('language')->get();

        return $query;
    }
}
