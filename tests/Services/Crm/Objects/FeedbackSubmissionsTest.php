<?php

namespace Tests\Services\Crm\Objects;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Objects\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\Objects\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class FeedbackSubmissionsTest extends TestCase
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

        $page = $this->client->crm->objects->feedbackSubmissions->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(SimplePublicObjectWithAssociations::class, $item);
        }
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->objects->feedbackSubmissions->get(
            'feedbackSubmissionId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SimplePublicObjectWithAssociations::class, $result);
    }

    #[Test]
    public function testSearch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->objects->feedbackSubmissions->search(
            after: 'after',
            filterGroups: [
                [
                    'filters' => [
                        ['operator' => 'BETWEEN', 'propertyName' => 'propertyName'],
                    ],
                ],
            ],
            limit: 0,
            properties: ['string'],
            sorts: ['string'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponseWithTotalSimplePublicObject::class,
            $result
        );
    }

    #[Test]
    public function testSearchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->objects->feedbackSubmissions->search(
            after: 'after',
            filterGroups: [
                [
                    'filters' => [
                        [
                            'operator' => 'BETWEEN',
                            'propertyName' => 'propertyName',
                            'highValue' => 'highValue',
                            'value' => 'value',
                            'values' => ['string'],
                        ],
                    ],
                ],
            ],
            limit: 0,
            properties: ['string'],
            sorts: ['string'],
            query: 'query',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponseWithTotalSimplePublicObject::class,
            $result
        );
    }
}
