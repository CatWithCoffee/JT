<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Zayavki;
use Illuminate\Http\Request;

class ZayavkiController extends Controller
{
    public function index(){
        $reviews = new Zayavki();
        return view('form', [
            'zayavki' => $reviews -> all()
        ]);

    }

    public function index_zayavki(Request $request){
        $valid = $request->validate([
            "description" => "required|min:10|max:500",
            "date" => "required",
            "time" => "required"
        ]);

        $review = new Zayavki();
        $review->user_id = auth()->user()->id;
        $review->description = $request->input('description');
        $review->date = $request->input('date');        
        $review->time = $request->input('time');
        $review->save();
        return redirect('/form');
    }

}
