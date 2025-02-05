<?php

namespace App\Services;

use Illuminate\Support\Collection as IlluminateCollection;

final readonly class CollectionService
{
    /**
     * Returns only references to the authenticated user's collections, useful for dropdowns
     * @return \Illuminate\Support\Collection a collection of the user's collections, only containing id and name
     */
    public function getReferences(): IlluminateCollection
    {
        return auth()->user()
            ->collections()
            ->get(['id', 'name']);
    }
}
