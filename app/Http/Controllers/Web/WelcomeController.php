<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $images = Image::where('categoria',Image::PUB)->where('estado',true)->get();
        $fotografos = User::where('tipo', 'F')->get();
        // return $fotografos;
        return view('web.cliente.inicio',compact('images','fotografos'));
    }
}
