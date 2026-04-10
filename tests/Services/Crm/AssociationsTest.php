<?php

namespace Tests\Services\Crm;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Crm\Associations\ReportCreationResponse;
use HubSpotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubSpotSDK\Crm\LabelsBetweenObjectPair;
use HubSpotSDK\Crm\MultiAssociatedObjectWithLabel;
use HubSpotSDK\Page;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class AssociationsTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(accessToken: 'My Access Token', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->crm->associations->list(
            'toObjectType',
            objectType: 'objectType',
            objectID: 'objectId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(MultiAssociatedObjectWithLabel::class, $item);
        }
    }

    #[Test]
    public function testListWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->crm->associations->list(
            'toObjectType',
            objectType: 'objectType',
            objectID: 'objectId',
            after: 'after',
            limit: 0,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(MultiAssociatedObjectWithLabel::class, $item);
        }
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associations->delete(
            'toObjectId',
            objectType: 'objectType',
            objectID: 'objectId',
            toObjectType: 'toObjectType',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associations->delete(
            'toObjectId',
            objectType: 'objectType',
            objectID: 'objectId',
            toObjectType: 'toObjectType',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testRequestHighUsageReport(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associations->requestHighUsageReport(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ReportCreationResponse::class, $result);
    }

    #[Test]
    public function testSearch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associations->search(
            'objectType',
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

        $result = $this->client->crm->associations->search(
            'objectType',
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

    #[Test]
    public function testUpdateAssociationLabels(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associations->updateAssociationLabels(
            'toObjectId',
            objectType: 'objectType',
            objectID: 'objectId',
            toObjectType: 'toObjectType',
            body: [
                ['associationCategory' => 'HUBSPOT_DEFINED', 'associationTypeID' => 0],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(LabelsBetweenObjectPair::class, $result);
    }

    #[Test]
    public function testUpdateAssociationLabelsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associations->updateAssociationLabels(
            'toObjectId',
            objectType: 'objectType',
            objectID: 'objectId',
            toObjectType: 'toObjectType',
            body: [
                ['associationCategory' => 'HUBSPOT_DEFINED', 'associationTypeID' => 0],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(LabelsBetweenObjectPair::class, $result);
    }
}
