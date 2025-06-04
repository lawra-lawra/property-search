<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Repositories\PropertyRepository;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function __construct(
        private readonly PropertyRepository $repository
    ) {
    }

    public function index(SearchRequest $request): View
    {
        $properties = $this->repository->filterProperties($request);

        return view('search')
            ->with([
                'properties' => $properties,
                'location' => $request->location,
                'near_beach' => $request->near_beach,
                'accepts_pets' => $request->accepts_pets,
                'sleeps' => $request->sleeps,
                'beds' => $request->beds,
                'pagination' => $properties->withQueryString()->links('elements.pagination'),
            ]);
    }
}