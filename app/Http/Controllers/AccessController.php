<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\Access;

class AccessController extends Controller
{
    public function index($id)
    {
        $access = Access::query()
        ->join('links', 'link_id', '=', 'links.id')
        ->where('link_id', $id)
        ->orderBy('accesses.id', 'desc')->get();

        return view('access.index')->with('accesses', $access);

    }

}
