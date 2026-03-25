<?php

namespace Tests\Services\Events;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Events\Occurrences\ExternalUnifiedEvent;
use HubspotSDK\Events\Occurrences\VisibleExternalEventTypeNames;
use HubspotSDK\Page;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class OccurrencesTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(
            accessToken: 'pat-na1-xxxxxxxx-xxxx',
            baseUrl: $testUrl,
        );

        $this->client = $client;
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->events->occurrences->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(ExternalUnifiedEvent::class, $item);
        }
    }

    #[Test]
    public function testListEventTypes(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->events->occurrences->listEventTypes();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VisibleExternalEventTypeNames::class, $result);
    }
}
