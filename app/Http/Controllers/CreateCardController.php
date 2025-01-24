<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCardRequest;
use Illuminate\Support\Facades\DB;

class CreateCardController extends Controller
{
    public function create()
    {
        return view('create_card');

    }

    public function store(CreateCardRequest $request)
    {
        DB::transaction(function () use ($request) {
            $formFields = $request->validated();
            $card = auth()->user()->cards()->create($formFields);

            if ($request->hasFile('multiple_files')) {
                foreach ($request->file('multiple_files') as $file) {
                    $stored = $file->store('cards', 'public');
                    $card->files()->create([
                        'name' => $file->getClientOriginalName(),
                        'path' => $stored,
                    ]);
                }
            }
        });

        return redirect('/')->with('message', 'success, Card created!');
    }
}
