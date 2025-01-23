<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreateCardRequest;
use App\Models\Card;

class CreateCardController extends Controller
{
    public function create()
    {
        return view('create_card');

    }

    public function store(CreateCardRequest $request)
    {
        Card::create($request->validated());
        return redirect('/')->with('success', 'Card created!');
    }
}
