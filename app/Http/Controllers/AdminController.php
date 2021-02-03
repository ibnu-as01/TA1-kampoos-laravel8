<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use Iluminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(){
        $produks = Produk::all();
        return view('tampil.index', compact('produks'));
    }
    // public function kategori()
    // {
    //     $kategoris = Kategori::all();
    //     return view('tampil.index',compact('kategoris'));
    // }
}
