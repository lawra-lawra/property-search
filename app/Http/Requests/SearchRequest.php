<?php

declare(strict_types=1);

namespace App\Http\Requests;

use OpenApi\Attributes as OA;
use Spatie\LaravelData\Attributes\Validation as DataValidation;
use Spatie\LaravelData\Data;

#[OA\RequestBody(
    request: 'propertyFilters',
    description: 'Filter property list',
    required: false,
    content: [
        new OA\JsonContent(
            properties: [
                new OA\Property(
                    property: 'location',
                    type: 'string',
                ),
                new OA\Property(
                    property: 'near_beach',
                    type: 'bool',
                    default: false,
                ),
                new OA\Property(
                    property: 'accepts_pets',
                    type: 'boolean',
                ),
                new OA\Property(
                    property: 'sleeps',
                    type: 'integer',
                ),
                new OA\Property(
                    property: 'beds',
                    type: 'integer',
                ),
            ],
            type: 'object',
        ),
    ]
)]
class SearchRequest extends Data
{
    public function __construct(
        public ?string $location = null,
        public ?bool $near_beach = false,
        public ?bool $accepts_pets = null,
        public ?int $sleeps = null,
        public ?int $beds = null
    ) {
    }
}
