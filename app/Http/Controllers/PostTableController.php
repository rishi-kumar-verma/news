<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostTableController extends Controller
{
    public function tableData(){

        return view('post.table');
    }
}
