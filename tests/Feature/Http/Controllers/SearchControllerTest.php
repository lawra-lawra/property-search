<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers;

use App\Models\Property;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\DomCrawler\Crawler;
use Tests\TestCase;

class SearchControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndexExists(): void
    {
        $response = $this->get('/');
        $response->assertOk();
    }

    public function testIndexPaginates(): void
    {
        Property::factory(16)->create();

        $response = $this->get('/');
        $response->assertOk();

        /** @var string $content */
        $content = $response->getContent();
        $crawler = new Crawler($content);
        $count = $crawler->filter('.t__property')->count();

        $response = $this->get('/?page=2');
        $response->assertOk();

        /** @var string $content */
        $content = $response->getContent();
        $crawler = new Crawler($content);
        $newCount = $crawler->filter('.t__property')->count();

        $this->assertNotSame($newCount, $count);
    }

    public function testIndexSearchByName(): void
    {
        $shouldMatch = Property::factory()->create([
            'location' => 'Test Location',
        ]);

        $shouldNotMatch = Property::factory()->create([
            'location' => 'Somewhere else',
        ]);

        $response = $this->get('/?location=test');
        $response->assertOk();

        /** @var string $content */
        $content = $response->getContent();
        $crawler = new Crawler($content);

        $expectedResults = 1;
        $this->assertSame($expectedResults, $crawler->filter('.t__property')->count());

        $response->assertSeeText('Test Location');
        $response->assertDontSeeText('Somewhere else');
    }
}
