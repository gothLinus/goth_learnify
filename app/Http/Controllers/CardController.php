<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardRequest;
use App\Models\Card;
use App\Models\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

        return redirect('/')->with('success', 'Card created successfully!');
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

    public function edit(Card $card)
    {
        return view('edit_card', compact('card'));
    }

    public function update(CardRequest $request, Card $card)
    {
        DB::transaction(function () use ($request, $card) {

            $card->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'time' => $request->input('time'),
            ]);

            if ($request->hasFile('multiple_files')) {
                foreach ($request->file('multiple_files') as $file) {
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

            if ($request->has('deleted_files') && is_array($request->deleted_files)) {
                foreach ($request->deleted_files as $deletedFileId) {
                    $file = File::find($deletedFileId);
                    if ($file && $file->card_id == $card->id) {

                        $file->delete();

                        Storage::disk('public')->delete($file->path);
                    }
                }
            }
        });
        return redirect('/')->with('success', 'Card updated successfully');
    }


}
