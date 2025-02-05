<?php

namespace App\Http\Controllers;

use App\Http\Requests\CollectionRequest;
use App\Models\Collection;

class CollectionController extends Controller
{
    public function index()
    {
        $collections = auth()->user()->collections;

        return view(
            'collection.index',
            compact('collections')
        );
    }

    public function show(Collection $collection)
    {
        abort_if($collection->user->isNot(auth()->user()), 403);

        return view(
            'collection.show',
            compact('collection')
        );
    }

    public function create()
    {
        return view('collection.create');
    }

    public function store(CollectionRequest $request)
    {
        $validated = $request->validated();

        $collection = auth()->user()->collections()->create($validated);

        return redirect(route('collections.show', $collection));
    }
}
