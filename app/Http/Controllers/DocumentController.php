<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::all();
        return view('index', compact('documents'));
    }

    public function data()
    {
        $documents = Document::all();
        return view('/document/data', compact('documents'));
    }

    public function create()
    {
        $data = Data::all();
        return view('document.create', compact('data'));
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirim
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        // Buat data baru
        Document::create([
            'title' => $request->title,
            'document_id' => $request->document_id,
        ]);

        // Redirect ke halaman yang diinginkan (misalnya halaman daftar kategori)
        return redirect()->route('document.data')->with('success', 'Data created successfully.');
    }
}
