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
        dd($request);
        $formFields = $request->validated();
        if ($request->hasFile('multiple_files')) {
            $filePaths = [];
            foreach ($request->file('multiple_files') as $file) {
                $filePaths[] = $file->store('cards', 'public');
            }
            $formFields['multiple_files'] = json_encode($filePaths);
        }
        $formFields['user_id'] = auth()->user()->id;
        Card::create($formFields);
        return redirect('/')->with('message', 'success, Card created!');
    }
}
