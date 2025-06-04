<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Http\Requests\SearchRequest;
use App\Models\Property;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PropertyRepository
{
    public function filterProperties(SearchRequest $filters): LengthAwarePaginator
    {
        $query = Property::query();

        if ($filters->location !== null) {
            $query->where('location', 'like', '%' . $filters->location . '%');
        }

        if ($filters->near_beach !== null) {
            $query->where('near_beach', $filters->near_beach);
        }

        if ($filters->accepts_pets !== null) {
            $query->where('accepts_pets', $filters->accepts_pets);
        }

        if ($filters->sleeps !== null) {
            $query->where('sleeps', '>=', $filters->sleeps);
        }

        if ($filters->beds !== null) {
            $query->where('beds', '>=', $filters->beds);
        }
        
        return $query->paginate(10);
    }
}