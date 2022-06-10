<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\Access;

class AccessController extends Controller
{
    public function index($id)
    {
        $access = Access::query()->where('link_id', $id)->orderBy('id', 'desc')->get();
        $links = Link::findOrFail($id);  

        return view('access.index')->with('accesses', $access)->with('link', $links);

    }

}
