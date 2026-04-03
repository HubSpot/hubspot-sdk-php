<?php

namespace Tests\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\MarketingEvents\BatchResponseMarketingEventPublicDefaultResponse;
use HubspotSDK\Marketing\MarketingEvents\BatchResponseMarketingEventPublicDefaultResponseV2;
use HubspotSDK\Marketing\MarketingEvents\CollectionResponseSearchPublicResponseWrapperNoPaging;
use HubspotSDK\Marketing\MarketingEvents\CollectionResponseWithTotalMarketingEventIdentifiersResponse;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventDefaultResponse;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventPublicDefaultResponse;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventPublicDefaultResponseV2;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventPublicReadResponse;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventPublicReadResponseV2;
use HubspotSDK\Page;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class MarketingEventsTest extends TestCase
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
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->marketingEvents->create(
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

        $result = $this->client->marketing->marketingEvents->create(
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

        $result = $this->client->marketing->marketingEvents->update(
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

        $result = $this->client->marketing->marketingEvents->update(
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

        $page = $this->client->marketing->marketingEvents->list();

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

        $result = $this->client->marketing->marketingEvents->delete('objectId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->marketingEvents->deleteBatch(
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

        $result = $this->client->marketing->marketingEvents->deleteBatch(
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

        $result = $this
            ->client
            ->marketing
            ->marketingEvents
            ->deleteBatchByExternalEventID(
                inputs: [
                    [
                        'appID' => 0,
                        'externalAccountID' => 'externalAccountId',
                        'externalEventID' => 'externalEventId',
                    ],
                ],
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testDeleteBatchByExternalEventIDWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->marketingEvents
            ->deleteBatchByExternalEventID(
                inputs: [
                    [
                        'appID' => 0,
                        'externalAccountID' => 'externalAccountId',
                        'externalEventID' => 'externalEventId',
                    ],
                ],
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testDeleteByExternalEventID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->marketingEvents
            ->deleteByExternalEventID(
                'externalEventId',
                externalAccountID: 'externalAccountId'
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteByExternalEventIDWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->marketingEvents
            ->deleteByExternalEventID(
                'externalEventId',
                externalAccountID: 'externalAccountId'
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->marketingEvents->get('objectId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MarketingEventPublicReadResponseV2::class, $result);
    }

    #[Test]
    public function testGetByExternalEventID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->marketingEvents->getByExternalEventID(
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

        $result = $this->client->marketing->marketingEvents->getByExternalEventID(
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

        $result = $this
            ->client
            ->marketing
            ->marketingEvents
            ->searchByExternalEventID(q: 'q')
        ;

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

        $result = $this
            ->client
            ->marketing
            ->marketingEvents
            ->searchByExternalEventID(q: 'q')
        ;

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
            ->marketingEvents
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

        $result = $this->client->marketing->marketingEvents->updateBatch(
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

        $result = $this->client->marketing->marketingEvents->updateBatch(
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

        $result = $this
            ->client
            ->marketing
            ->marketingEvents
            ->updateByExternalEventID(
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
            )
        ;

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

        $result = $this
            ->client
            ->marketing
            ->marketingEvents
            ->updateByExternalEventID(
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
            )
        ;

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

        $result = $this->client->marketing->marketingEvents->upsertBatch(
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

        $result = $this->client->marketing->marketingEvents->upsertBatch(
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

        $result = $this
            ->client
            ->marketing
            ->marketingEvents
            ->upsertByExternalEventID(
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
            )
        ;

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

        $result = $this
            ->client
            ->marketing
            ->marketingEvents
            ->upsertByExternalEventID(
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
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            MarketingEventPublicDefaultResponse::class,
            $result
        );
    }
}
