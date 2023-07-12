<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Http\Requests\FoundPetRequest;

class FoundPetController extends Controller
{
    public function index(){
        return view('pages.found-pets');
    }

    public function store(FoundPetRequest $request){
        
        return redirect('pages.found-pets');
    }
}
