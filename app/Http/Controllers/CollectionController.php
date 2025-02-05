<?php

namespace App\Http\Controllers;

use App\Http\Requests\CollectionRequest;
use App\Models\Collection;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CollectionController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->authorizeResource(Collection::class, 'collection');
    }

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

        $collection = auth()->user()
            ->collections()
            ->create($validated);

        return redirect(
            route('collections.show', $collection)
        );
    }

    public function edit(Collection $collection)
    {
        return view(
            'collection.edit',
            compact('collection')
        );
    }
}
