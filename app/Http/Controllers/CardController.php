<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardRequest;
use App\Models\Card;
use Illuminate\Support\Facades\DB;

class CardController extends Controller
{
    public function create()
    {
        return view('create_card');

    }

    public function store(CardRequest $request)
    {
        DB::transaction(function () use ($request) {
            $formFields = $request->validated();
            $card = auth()->user()->cards()->create($formFields);

            if ($request->hasFile('multiple_files')) {
                foreach ($request['multiple_files'] as $file) {
                    $stored = $file->store('cards', 'public');
                    if (!$stored) {
                        abort(500, 'Could not store file');
                    }

                    $card->files()->create([
                        'name' => $file->getClientOriginalName(),
                        'path' => $stored,
                    ]);
                }
            }
        });

        return redirect('/')->with('message', 'success, Card created!');
    }

    public function show(Card $card)
    {
        return view('show_card', compact('card'));
    }

    public function delete(Card $card)
    {
        $card->delete();
        return redirect('/')->with('message', 'success, Card deleted!');
    }
}
