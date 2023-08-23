<?php

namespace App\DataTables;

use App\Models\Album;
use App\Models\AlbumCategory;
use App\Models\Menu;

/**
 * Class StaffDataTable
 */
class MenuDataTable
{
    /*
     *
     */
    public function get()
    {
        $query = Menu::with(['submenu','parent'])->get();

        return $query;
    }
}
