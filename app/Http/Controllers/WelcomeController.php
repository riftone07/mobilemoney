<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
class WelcomeController extends Controller
{
    public function index()
    {

        $produits = Produit::all();

       return view('welcome',compact('produits'));
    }


    public function commander($slug)
    {

        $produit = Produit::whereSlug($slug)->first();

       return view('commander',compact('produit'));
    }

    
}
