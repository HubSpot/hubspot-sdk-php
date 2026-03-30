<?php

namespace Tests\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\Events\BatchResponseMarketingEventPublicDefaultResponse;
use HubspotSDK\Marketing\Events\BatchResponseMarketingEventPublicDefaultResponseV2;
use HubspotSDK\Marketing\Events\CollectionResponseSearchPublicResponseWrapperNoPaging;
use HubspotSDK\Marketing\Events\CollectionResponseWithTotalMarketingEventIdentifiersResponse;
use HubspotSDK\Marketing\Events\MarketingEventDefaultResponse;
use HubspotSDK\Marketing\Events\MarketingEventPublicDefaultResponse;
use HubspotSDK\Marketing\Events\MarketingEventPublicDefaultResponseV2;
use HubspotSDK\Marketing\Events\MarketingEventPublicReadResponse;
use HubspotSDK\Marketing\Events\MarketingEventPublicReadResponseV2;
use HubspotSDK\Page;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class EventsTest extends TestCase
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
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->events->create(
            customProperties: [
                [
                    'dataSensitivity' => 'high',
                    'isEncrypted' => true,
                    'isLargeValue' => true,
                    'name' => 'name',
                    'persistenceTimestamp' => 0,
                    'requestID' => 'requestId',
                    'selectedByUser' => true,
                    'selectedByUserTimestamp' => 0,
                    'source' => 'ACADEMY',
                    'sourceID' => 'sourceId',
                    'sourceLabel' => 'sourceLabel',
                    'sourceMetadata' => 'sourceMetadata',
                    'sourceUpstreamDeployable' => 'sourceUpstreamDeployable',
                    'sourceVid' => [0],
                    'timestamp' => 0,
                    'unit' => 'unit',
                    'updatedByUserID' => 0,
                    'useTimestampAsPersistenceTimestamp' => true,
                    'value' => 'value',
                ],
            ],
            eventName: 'eventName',
            eventOrganizer: 'eventOrganizer',
            externalAccountID: 'externalAccountId',
            externalEventID: 'externalEventId',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MarketingEventDefaultResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->events->create(
            customProperties: [
                [
                    'dataSensitivity' => 'high',
                    'isEncrypted' => true,
                    'isLargeValue' => true,
                    'name' => 'name',
                    'persistenceTimestamp' => 0,
                    'requestID' => 'requestId',
                    'selectedByUser' => true,
                    'selectedByUserTimestamp' => 0,
                    'source' => 'ACADEMY',
                    'sourceID' => 'sourceId',
                    'sourceLabel' => 'sourceLabel',
                    'sourceMetadata' => 'sourceMetadata',
                    'sourceUpstreamDeployable' => 'sourceUpstreamDeployable',
                    'sourceVid' => [0],
                    'timestamp' => 0,
                    'unit' => 'unit',
                    'updatedByUserID' => 0,
                    'useTimestampAsPersistenceTimestamp' => true,
                    'value' => 'value',
                ],
            ],
            eventName: 'eventName',
            eventOrganizer: 'eventOrganizer',
            externalAccountID: 'externalAccountId',
            externalEventID: 'externalEventId',
            endDateTime: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            eventCancelled: true,
            eventCompleted: true,
            eventDescription: 'eventDescription',
            eventType: 'eventType',
            eventURL: 'eventUrl',
            startDateTime: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MarketingEventDefaultResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->events->update(
            'objectId',
            customProperties: [
                [
                    'dataSensitivity' => 'high',
                    'isEncrypted' => true,
                    'isLargeValue' => true,
                    'name' => 'name',
                    'persistenceTimestamp' => 0,
                    'requestID' => 'requestId',
                    'selectedByUser' => true,
                    'selectedByUserTimestamp' => 0,
                    'source' => 'ACADEMY',
                    'sourceID' => 'sourceId',
                    'sourceLabel' => 'sourceLabel',
                    'sourceMetadata' => 'sourceMetadata',
                    'sourceUpstreamDeployable' => 'sourceUpstreamDeployable',
                    'sourceVid' => [0],
                    'timestamp' => 0,
                    'unit' => 'unit',
                    'updatedByUserID' => 0,
                    'useTimestampAsPersistenceTimestamp' => true,
                    'value' => 'value',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            MarketingEventPublicDefaultResponseV2::class,
            $result
        );
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->events->update(
            'objectId',
            customProperties: [
                [
                    'dataSensitivity' => 'high',
                    'isEncrypted' => true,
                    'isLargeValue' => true,
                    'name' => 'name',
                    'persistenceTimestamp' => 0,
                    'requestID' => 'requestId',
                    'selectedByUser' => true,
                    'selectedByUserTimestamp' => 0,
                    'source' => 'ACADEMY',
                    'sourceID' => 'sourceId',
                    'sourceLabel' => 'sourceLabel',
                    'sourceMetadata' => 'sourceMetadata',
                    'sourceUpstreamDeployable' => 'sourceUpstreamDeployable',
                    'sourceVid' => [0],
                    'timestamp' => 0,
                    'unit' => 'unit',
                    'updatedByUserID' => 0,
                    'useTimestampAsPersistenceTimestamp' => true,
                    'value' => 'value',
                ],
            ],
            endDateTime: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            eventCancelled: true,
            eventDescription: 'eventDescription',
            eventName: 'eventName',
            eventOrganizer: 'eventOrganizer',
            eventType: 'eventType',
            eventURL: 'eventUrl',
            startDateTime: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            MarketingEventPublicDefaultResponseV2::class,
            $result
        );
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->marketing->events->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(MarketingEventPublicReadResponseV2::class, $item);
        }
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->events->delete('objectId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->events->deleteBatch(
            inputs: [['objectID' => 'objectId']]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testDeleteBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->events->deleteBatch(
            inputs: [['objectID' => 'objectId']]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testDeleteBatchByExternalEventID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->events->deleteBatchByExternalEventID(
            inputs: [
                [
                    'appID' => 0,
                    'externalAccountID' => 'externalAccountId',
                    'externalEventID' => 'externalEventId',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testDeleteBatchByExternalEventIDWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->events->deleteBatchByExternalEventID(
            inputs: [
                [
                    'appID' => 0,
                    'externalAccountID' => 'externalAccountId',
                    'externalEventID' => 'externalEventId',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testDeleteByExternalEventID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->events->deleteByExternalEventID(
            'externalEventId',
            externalAccountID: 'externalAccountId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteByExternalEventIDWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->events->deleteByExternalEventID(
            'externalEventId',
            externalAccountID: 'externalAccountId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->events->get('objectId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MarketingEventPublicReadResponseV2::class, $result);
    }

    #[Test]
    public function testGetByExternalEventID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->events->getByExternalEventID(
            'externalEventId',
            externalAccountID: 'externalAccountId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MarketingEventPublicReadResponse::class, $result);
    }

    #[Test]
    public function testGetByExternalEventIDWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->events->getByExternalEventID(
            'externalEventId',
            externalAccountID: 'externalAccountId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MarketingEventPublicReadResponse::class, $result);
    }

    #[Test]
    public function testSearchByExternalEventID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->events->searchByExternalEventID(q: 'q');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponseSearchPublicResponseWrapperNoPaging::class,
            $result
        );
    }

    #[Test]
    public function testSearchByExternalEventIDWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->events->searchByExternalEventID(q: 'q');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponseSearchPublicResponseWrapperNoPaging::class,
            $result
        );
    }

    #[Test]
    public function testSearchIdentifiersByExternalEventID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->events
            ->searchIdentifiersByExternalEventID('externalEventId')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponseWithTotalMarketingEventIdentifiersResponse::class,
            $result,
        );
    }

    #[Test]
    public function testUpdateBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->events->updateBatch(
            inputs: [
                [
                    'customProperties' => [
                        [
                            'dataSensitivity' => 'high',
                            'isEncrypted' => true,
                            'isLargeValue' => true,
                            'name' => 'name',
                            'persistenceTimestamp' => 0,
                            'requestID' => 'requestId',
                            'selectedByUser' => true,
                            'selectedByUserTimestamp' => 0,
                            'source' => 'ACADEMY',
                            'sourceID' => 'sourceId',
                            'sourceLabel' => 'sourceLabel',
                            'sourceMetadata' => 'sourceMetadata',
                            'sourceUpstreamDeployable' => 'sourceUpstreamDeployable',
                            'sourceVid' => [0],
                            'timestamp' => 0,
                            'unit' => 'unit',
                            'updatedByUserID' => 0,
                            'useTimestampAsPersistenceTimestamp' => true,
                            'value' => 'value',
                        ],
                    ],
                    'objectID' => 'objectId',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponseMarketingEventPublicDefaultResponseV2::class,
            $result
        );
    }

    #[Test]
    public function testUpdateBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->events->updateBatch(
            inputs: [
                [
                    'customProperties' => [
                        [
                            'dataSensitivity' => 'high',
                            'isEncrypted' => true,
                            'isLargeValue' => true,
                            'name' => 'name',
                            'persistenceTimestamp' => 0,
                            'requestID' => 'requestId',
                            'selectedByUser' => true,
                            'selectedByUserTimestamp' => 0,
                            'source' => 'ACADEMY',
                            'sourceID' => 'sourceId',
                            'sourceLabel' => 'sourceLabel',
                            'sourceMetadata' => 'sourceMetadata',
                            'sourceUpstreamDeployable' => 'sourceUpstreamDeployable',
                            'sourceVid' => [0],
                            'timestamp' => 0,
                            'unit' => 'unit',
                            'updatedByUserID' => 0,
                            'useTimestampAsPersistenceTimestamp' => true,
                            'value' => 'value',
                        ],
                    ],
                    'objectID' => 'objectId',
                    'endDateTime' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'eventCancelled' => true,
                    'eventDescription' => 'eventDescription',
                    'eventName' => 'eventName',
                    'eventOrganizer' => 'eventOrganizer',
                    'eventType' => 'eventType',
                    'eventURL' => 'eventUrl',
                    'startDateTime' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponseMarketingEventPublicDefaultResponseV2::class,
            $result
        );
    }

    #[Test]
    public function testUpdateByExternalEventID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->events->updateByExternalEventID(
            'externalEventId',
            externalAccountID: 'externalAccountId',
            customProperties: [
                [
                    'dataSensitivity' => 'high',
                    'isEncrypted' => true,
                    'isLargeValue' => true,
                    'name' => 'name',
                    'persistenceTimestamp' => 0,
                    'requestID' => 'requestId',
                    'selectedByUser' => true,
                    'selectedByUserTimestamp' => 0,
                    'source' => 'ACADEMY',
                    'sourceID' => 'sourceId',
                    'sourceLabel' => 'sourceLabel',
                    'sourceMetadata' => 'sourceMetadata',
                    'sourceUpstreamDeployable' => 'sourceUpstreamDeployable',
                    'sourceVid' => [0],
                    'timestamp' => 0,
                    'unit' => 'unit',
                    'updatedByUserID' => 0,
                    'useTimestampAsPersistenceTimestamp' => true,
                    'value' => 'value',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            MarketingEventPublicDefaultResponse::class,
            $result
        );
    }

    #[Test]
    public function testUpdateByExternalEventIDWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->events->updateByExternalEventID(
            'externalEventId',
            externalAccountID: 'externalAccountId',
            customProperties: [
                [
                    'dataSensitivity' => 'high',
                    'isEncrypted' => true,
                    'isLargeValue' => true,
                    'name' => 'name',
                    'persistenceTimestamp' => 0,
                    'requestID' => 'requestId',
                    'selectedByUser' => true,
                    'selectedByUserTimestamp' => 0,
                    'source' => 'ACADEMY',
                    'sourceID' => 'sourceId',
                    'sourceLabel' => 'sourceLabel',
                    'sourceMetadata' => 'sourceMetadata',
                    'sourceUpstreamDeployable' => 'sourceUpstreamDeployable',
                    'sourceVid' => [0],
                    'timestamp' => 0,
                    'unit' => 'unit',
                    'updatedByUserID' => 0,
                    'useTimestampAsPersistenceTimestamp' => true,
                    'value' => 'value',
                ],
            ],
            endDateTime: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            eventCancelled: true,
            eventCompleted: true,
            eventDescription: 'eventDescription',
            eventName: 'eventName',
            eventOrganizer: 'eventOrganizer',
            eventType: 'eventType',
            eventURL: 'eventUrl',
            startDateTime: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            MarketingEventPublicDefaultResponse::class,
            $result
        );
    }

    #[Test]
    public function testUpsertBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->events->upsertBatch(
            inputs: [
                [
                    'customProperties' => [
                        [
                            'dataSensitivity' => 'high',
                            'isEncrypted' => true,
                            'isLargeValue' => true,
                            'name' => 'name',
                            'persistenceTimestamp' => 0,
                            'requestID' => 'requestId',
                            'selectedByUser' => true,
                            'selectedByUserTimestamp' => 0,
                            'source' => 'ACADEMY',
                            'sourceID' => 'sourceId',
                            'sourceLabel' => 'sourceLabel',
                            'sourceMetadata' => 'sourceMetadata',
                            'sourceUpstreamDeployable' => 'sourceUpstreamDeployable',
                            'sourceVid' => [0],
                            'timestamp' => 0,
                            'unit' => 'unit',
                            'updatedByUserID' => 0,
                            'useTimestampAsPersistenceTimestamp' => true,
                            'value' => 'value',
                        ],
                    ],
                    'eventName' => 'eventName',
                    'eventOrganizer' => 'eventOrganizer',
                    'externalAccountID' => 'externalAccountId',
                    'externalEventID' => 'externalEventId',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponseMarketingEventPublicDefaultResponse::class,
            $result
        );
    }

    #[Test]
    public function testUpsertBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->events->upsertBatch(
            inputs: [
                [
                    'customProperties' => [
                        [
                            'dataSensitivity' => 'high',
                            'isEncrypted' => true,
                            'isLargeValue' => true,
                            'name' => 'name',
                            'persistenceTimestamp' => 0,
                            'requestID' => 'requestId',
                            'selectedByUser' => true,
                            'selectedByUserTimestamp' => 0,
                            'source' => 'ACADEMY',
                            'sourceID' => 'sourceId',
                            'sourceLabel' => 'sourceLabel',
                            'sourceMetadata' => 'sourceMetadata',
                            'sourceUpstreamDeployable' => 'sourceUpstreamDeployable',
                            'sourceVid' => [0],
                            'timestamp' => 0,
                            'unit' => 'unit',
                            'updatedByUserID' => 0,
                            'useTimestampAsPersistenceTimestamp' => true,
                            'value' => 'value',
                        ],
                    ],
                    'eventName' => 'eventName',
                    'eventOrganizer' => 'eventOrganizer',
                    'externalAccountID' => 'externalAccountId',
                    'externalEventID' => 'externalEventId',
                    'endDateTime' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'eventCancelled' => true,
                    'eventCompleted' => true,
                    'eventDescription' => 'eventDescription',
                    'eventType' => 'eventType',
                    'eventURL' => 'eventUrl',
                    'startDateTime' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponseMarketingEventPublicDefaultResponse::class,
            $result
        );
    }

    #[Test]
    public function testUpsertByExternalEventID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->events->upsertByExternalEventID(
            'externalEventId',
            customProperties: [
                [
                    'dataSensitivity' => 'high',
                    'isEncrypted' => true,
                    'isLargeValue' => true,
                    'name' => 'name',
                    'persistenceTimestamp' => 0,
                    'requestID' => 'requestId',
                    'selectedByUser' => true,
                    'selectedByUserTimestamp' => 0,
                    'source' => 'ACADEMY',
                    'sourceID' => 'sourceId',
                    'sourceLabel' => 'sourceLabel',
                    'sourceMetadata' => 'sourceMetadata',
                    'sourceUpstreamDeployable' => 'sourceUpstreamDeployable',
                    'sourceVid' => [0],
                    'timestamp' => 0,
                    'unit' => 'unit',
                    'updatedByUserID' => 0,
                    'useTimestampAsPersistenceTimestamp' => true,
                    'value' => 'value',
                ],
            ],
            eventName: 'eventName',
            eventOrganizer: 'eventOrganizer',
            externalAccountID: 'externalAccountId',
            externalEventID: 'externalEventId',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            MarketingEventPublicDefaultResponse::class,
            $result
        );
    }

    #[Test]
    public function testUpsertByExternalEventIDWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->events->upsertByExternalEventID(
            'externalEventId',
            customProperties: [
                [
                    'dataSensitivity' => 'high',
                    'isEncrypted' => true,
                    'isLargeValue' => true,
                    'name' => 'name',
                    'persistenceTimestamp' => 0,
                    'requestID' => 'requestId',
                    'selectedByUser' => true,
                    'selectedByUserTimestamp' => 0,
                    'source' => 'ACADEMY',
                    'sourceID' => 'sourceId',
                    'sourceLabel' => 'sourceLabel',
                    'sourceMetadata' => 'sourceMetadata',
                    'sourceUpstreamDeployable' => 'sourceUpstreamDeployable',
                    'sourceVid' => [0],
                    'timestamp' => 0,
                    'unit' => 'unit',
                    'updatedByUserID' => 0,
                    'useTimestampAsPersistenceTimestamp' => true,
                    'value' => 'value',
                ],
            ],
            eventName: 'eventName',
            eventOrganizer: 'eventOrganizer',
            externalAccountID: 'externalAccountId',
            externalEventID: 'externalEventId',
            endDateTime: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            eventCancelled: true,
            eventCompleted: true,
            eventDescription: 'eventDescription',
            eventType: 'eventType',
            eventURL: 'eventUrl',
            startDateTime: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            MarketingEventPublicDefaultResponse::class,
            $result
        );
    }
}
