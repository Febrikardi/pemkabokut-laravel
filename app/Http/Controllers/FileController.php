<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        $files = File::all();
        return view('index', compact('files'));
    }
    public function data()
    {
        $files = File::all();
        return view('/file/data', compact('files'));
    }
}
