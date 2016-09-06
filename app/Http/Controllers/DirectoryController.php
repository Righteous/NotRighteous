<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Directory;
use App\Models\Tools;

class DirectoryController extends Controller
{
    public function create() {
        $listings = Directory::all();
        $tools = Tools::all();
        return view('pages.directory')->with('listings', $listings)->with('tools', $tools);
    }

    public function store(Request $request) {

    }
}
