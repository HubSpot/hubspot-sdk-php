<?php

namespace Tests\Services\Marketing;

use HubspotSDK\Client;
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

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
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
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->create([
            'customProperties' => [
                [
                    'dataSensitivity' => 'none',
                    'isEncrypted' => true,
                    'isLargeValue' => true,
                    'name' => 'name',
                    'persistenceTimestamp' => 0,
                    'requestId' => 'requestId',
                    'selectedByUser' => true,
                    'selectedByUserTimestamp' => 0,
                    'source' => 'UNKNOWN',
                    'sourceId' => 'sourceId',
                    'sourceLabel' => 'sourceLabel',
                    'sourceMetadata' => 'sourceMetadata',
                    'sourceUpstreamDeployable' => 'sourceUpstreamDeployable',
                    'sourceVid' => [0],
                    'timestamp' => 0,
                    'unit' => 'unit',
                    'updatedByUserId' => 0,
                    'useTimestampAsPersistenceTimestamp' => true,
                    'value' => 'value',
                ],
            ],
            'eventName' => 'eventName',
            'eventOrganizer' => 'eventOrganizer',
            'externalAccountId' => 'externalAccountId',
            'externalEventId' => 'externalEventId',
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->create([
            'customProperties' => [
                [
                    'dataSensitivity' => 'none',
                    'isEncrypted' => true,
                    'isLargeValue' => true,
                    'name' => 'name',
                    'persistenceTimestamp' => 0,
                    'requestId' => 'requestId',
                    'selectedByUser' => true,
                    'selectedByUserTimestamp' => 0,
                    'source' => 'UNKNOWN',
                    'sourceId' => 'sourceId',
                    'sourceLabel' => 'sourceLabel',
                    'sourceMetadata' => 'sourceMetadata',
                    'sourceUpstreamDeployable' => 'sourceUpstreamDeployable',
                    'sourceVid' => [0],
                    'timestamp' => 0,
                    'unit' => 'unit',
                    'updatedByUserId' => 0,
                    'useTimestampAsPersistenceTimestamp' => true,
                    'value' => 'value',
                ],
            ],
            'eventName' => 'eventName',
            'eventOrganizer' => 'eventOrganizer',
            'externalAccountId' => 'externalAccountId',
            'externalEventId' => 'externalEventId',
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->update(
            'objectId',
            [
                'customProperties' => [
                    [
                        'dataSensitivity' => 'none',
                        'isEncrypted' => true,
                        'isLargeValue' => true,
                        'name' => 'name',
                        'persistenceTimestamp' => 0,
                        'requestId' => 'requestId',
                        'selectedByUser' => true,
                        'selectedByUserTimestamp' => 0,
                        'source' => 'UNKNOWN',
                        'sourceId' => 'sourceId',
                        'sourceLabel' => 'sourceLabel',
                        'sourceMetadata' => 'sourceMetadata',
                        'sourceUpstreamDeployable' => 'sourceUpstreamDeployable',
                        'sourceVid' => [0],
                        'timestamp' => 0,
                        'unit' => 'unit',
                        'updatedByUserId' => 0,
                        'useTimestampAsPersistenceTimestamp' => true,
                        'value' => 'value',
                    ],
                ],
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->update(
            'objectId',
            [
                'customProperties' => [
                    [
                        'dataSensitivity' => 'none',
                        'isEncrypted' => true,
                        'isLargeValue' => true,
                        'name' => 'name',
                        'persistenceTimestamp' => 0,
                        'requestId' => 'requestId',
                        'selectedByUser' => true,
                        'selectedByUserTimestamp' => 0,
                        'source' => 'UNKNOWN',
                        'sourceId' => 'sourceId',
                        'sourceLabel' => 'sourceLabel',
                        'sourceMetadata' => 'sourceMetadata',
                        'sourceUpstreamDeployable' => 'sourceUpstreamDeployable',
                        'sourceVid' => [0],
                        'timestamp' => 0,
                        'unit' => 'unit',
                        'updatedByUserId' => 0,
                        'useTimestampAsPersistenceTimestamp' => true,
                        'value' => 'value',
                    ],
                ],
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->list([]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->delete('objectId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCancelByExternalEventID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->cancelByExternalEventID(
            'externalEventId',
            ['externalAccountId' => 'externalAccountId']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCancelByExternalEventIDWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->cancelByExternalEventID(
            'externalEventId',
            ['externalAccountId' => 'externalAccountId']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCompleteByExternalEventID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->completeByExternalEventID(
            'externalEventId',
            [
                'externalAccountId' => 'externalAccountId',
                'endDateTime' => '2019-12-27T18:11:19.117Z',
                'startDateTime' => '2019-12-27T18:11:19.117Z',
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCompleteByExternalEventIDWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->completeByExternalEventID(
            'externalEventId',
            [
                'externalAccountId' => 'externalAccountId',
                'endDateTime' => '2019-12-27T18:11:19.117Z',
                'startDateTime' => '2019-12-27T18:11:19.117Z',
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->deleteBatch([
            'inputs' => [['objectId' => 'objectId']],
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->deleteBatch([
            'inputs' => [['objectId' => 'objectId']],
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteBatchByExternalEventID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->deleteBatchByExternalEventID([
            'inputs' => [
                [
                    'appId' => 0,
                    'externalAccountId' => 'externalAccountId',
                    'externalEventId' => 'externalEventId',
                ],
            ],
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteBatchByExternalEventIDWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->deleteBatchByExternalEventID([
            'inputs' => [
                [
                    'appId' => 0,
                    'externalAccountId' => 'externalAccountId',
                    'externalEventId' => 'externalEventId',
                ],
            ],
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteByExternalEventID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->deleteByExternalEventID(
            'externalEventId',
            ['externalAccountId' => 'externalAccountId']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteByExternalEventIDWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->deleteByExternalEventID(
            'externalEventId',
            ['externalAccountId' => 'externalAccountId']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->get('objectId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetByExternalEventID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->getByExternalEventID(
            'externalEventId',
            ['externalAccountId' => 'externalAccountId']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetByExternalEventIDWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->getByExternalEventID(
            'externalEventId',
            ['externalAccountId' => 'externalAccountId']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSearchByExternalEventID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->searchByExternalEventID([
            'q' => 'q',
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSearchByExternalEventIDWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->searchByExternalEventID([
            'q' => 'q',
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSearchIdentifiersByExternalEventID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->events
            ->searchIdentifiersByExternalEventID('externalEventId')
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->updateBatch([
            'inputs' => [
                [
                    'customProperties' => [
                        [
                            'dataSensitivity' => 'none',
                            'isEncrypted' => true,
                            'isLargeValue' => true,
                            'name' => 'name',
                            'persistenceTimestamp' => 0,
                            'requestId' => 'requestId',
                            'selectedByUser' => true,
                            'selectedByUserTimestamp' => 0,
                            'source' => 'UNKNOWN',
                            'sourceId' => 'sourceId',
                            'sourceLabel' => 'sourceLabel',
                            'sourceMetadata' => 'sourceMetadata',
                            'sourceUpstreamDeployable' => 'sourceUpstreamDeployable',
                            'sourceVid' => [0],
                            'timestamp' => 0,
                            'unit' => 'unit',
                            'updatedByUserId' => 0,
                            'useTimestampAsPersistenceTimestamp' => true,
                            'value' => 'value',
                        ],
                    ],
                    'objectId' => 'objectId',
                ],
            ],
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->updateBatch([
            'inputs' => [
                [
                    'customProperties' => [
                        [
                            'dataSensitivity' => 'none',
                            'isEncrypted' => true,
                            'isLargeValue' => true,
                            'name' => 'name',
                            'persistenceTimestamp' => 0,
                            'requestId' => 'requestId',
                            'selectedByUser' => true,
                            'selectedByUserTimestamp' => 0,
                            'source' => 'UNKNOWN',
                            'sourceId' => 'sourceId',
                            'sourceLabel' => 'sourceLabel',
                            'sourceMetadata' => 'sourceMetadata',
                            'sourceUpstreamDeployable' => 'sourceUpstreamDeployable',
                            'sourceVid' => [0],
                            'timestamp' => 0,
                            'unit' => 'unit',
                            'updatedByUserId' => 0,
                            'useTimestampAsPersistenceTimestamp' => true,
                            'value' => 'value',
                        ],
                    ],
                    'objectId' => 'objectId',
                    'endDateTime' => '2019-12-27T18:11:19.117Z',
                    'eventCancelled' => true,
                    'eventDescription' => 'eventDescription',
                    'eventName' => 'eventName',
                    'eventOrganizer' => 'eventOrganizer',
                    'eventType' => 'eventType',
                    'eventUrl' => 'eventUrl',
                    'startDateTime' => '2019-12-27T18:11:19.117Z',
                ],
            ],
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateByExternalEventID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->updateByExternalEventID(
            'externalEventId',
            [
                'externalAccountId' => 'externalAccountId',
                'customProperties' => [
                    [
                        'dataSensitivity' => 'none',
                        'isEncrypted' => true,
                        'isLargeValue' => true,
                        'name' => 'name',
                        'persistenceTimestamp' => 0,
                        'requestId' => 'requestId',
                        'selectedByUser' => true,
                        'selectedByUserTimestamp' => 0,
                        'source' => 'UNKNOWN',
                        'sourceId' => 'sourceId',
                        'sourceLabel' => 'sourceLabel',
                        'sourceMetadata' => 'sourceMetadata',
                        'sourceUpstreamDeployable' => 'sourceUpstreamDeployable',
                        'sourceVid' => [0],
                        'timestamp' => 0,
                        'unit' => 'unit',
                        'updatedByUserId' => 0,
                        'useTimestampAsPersistenceTimestamp' => true,
                        'value' => 'value',
                    ],
                ],
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateByExternalEventIDWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->updateByExternalEventID(
            'externalEventId',
            [
                'externalAccountId' => 'externalAccountId',
                'customProperties' => [
                    [
                        'dataSensitivity' => 'none',
                        'isEncrypted' => true,
                        'isLargeValue' => true,
                        'name' => 'name',
                        'persistenceTimestamp' => 0,
                        'requestId' => 'requestId',
                        'selectedByUser' => true,
                        'selectedByUserTimestamp' => 0,
                        'source' => 'UNKNOWN',
                        'sourceId' => 'sourceId',
                        'sourceLabel' => 'sourceLabel',
                        'sourceMetadata' => 'sourceMetadata',
                        'sourceUpstreamDeployable' => 'sourceUpstreamDeployable',
                        'sourceVid' => [0],
                        'timestamp' => 0,
                        'unit' => 'unit',
                        'updatedByUserId' => 0,
                        'useTimestampAsPersistenceTimestamp' => true,
                        'value' => 'value',
                    ],
                ],
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpsertBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->upsertBatch([
            'inputs' => [
                [
                    'customProperties' => [
                        [
                            'dataSensitivity' => 'none',
                            'isEncrypted' => true,
                            'isLargeValue' => true,
                            'name' => 'name',
                            'persistenceTimestamp' => 0,
                            'requestId' => 'requestId',
                            'selectedByUser' => true,
                            'selectedByUserTimestamp' => 0,
                            'source' => 'UNKNOWN',
                            'sourceId' => 'sourceId',
                            'sourceLabel' => 'sourceLabel',
                            'sourceMetadata' => 'sourceMetadata',
                            'sourceUpstreamDeployable' => 'sourceUpstreamDeployable',
                            'sourceVid' => [0],
                            'timestamp' => 0,
                            'unit' => 'unit',
                            'updatedByUserId' => 0,
                            'useTimestampAsPersistenceTimestamp' => true,
                            'value' => 'value',
                        ],
                    ],
                    'eventName' => 'eventName',
                    'eventOrganizer' => 'eventOrganizer',
                    'externalAccountId' => 'externalAccountId',
                    'externalEventId' => 'externalEventId',
                ],
            ],
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpsertBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->upsertBatch([
            'inputs' => [
                [
                    'customProperties' => [
                        [
                            'dataSensitivity' => 'none',
                            'isEncrypted' => true,
                            'isLargeValue' => true,
                            'name' => 'name',
                            'persistenceTimestamp' => 0,
                            'requestId' => 'requestId',
                            'selectedByUser' => true,
                            'selectedByUserTimestamp' => 0,
                            'source' => 'UNKNOWN',
                            'sourceId' => 'sourceId',
                            'sourceLabel' => 'sourceLabel',
                            'sourceMetadata' => 'sourceMetadata',
                            'sourceUpstreamDeployable' => 'sourceUpstreamDeployable',
                            'sourceVid' => [0],
                            'timestamp' => 0,
                            'unit' => 'unit',
                            'updatedByUserId' => 0,
                            'useTimestampAsPersistenceTimestamp' => true,
                            'value' => 'value',
                        ],
                    ],
                    'eventName' => 'eventName',
                    'eventOrganizer' => 'eventOrganizer',
                    'externalAccountId' => 'externalAccountId',
                    'externalEventId' => 'externalEventId',
                    'endDateTime' => '2019-12-27T18:11:19.117Z',
                    'eventCancelled' => true,
                    'eventCompleted' => true,
                    'eventDescription' => 'eventDescription',
                    'eventType' => 'eventType',
                    'eventUrl' => 'eventUrl',
                    'startDateTime' => '2019-12-27T18:11:19.117Z',
                ],
            ],
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpsertByExternalEventID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->upsertByExternalEventID(
            'externalEventId',
            [
                'customProperties' => [
                    [
                        'dataSensitivity' => 'none',
                        'isEncrypted' => true,
                        'isLargeValue' => true,
                        'name' => 'name',
                        'persistenceTimestamp' => 0,
                        'requestId' => 'requestId',
                        'selectedByUser' => true,
                        'selectedByUserTimestamp' => 0,
                        'source' => 'UNKNOWN',
                        'sourceId' => 'sourceId',
                        'sourceLabel' => 'sourceLabel',
                        'sourceMetadata' => 'sourceMetadata',
                        'sourceUpstreamDeployable' => 'sourceUpstreamDeployable',
                        'sourceVid' => [0],
                        'timestamp' => 0,
                        'unit' => 'unit',
                        'updatedByUserId' => 0,
                        'useTimestampAsPersistenceTimestamp' => true,
                        'value' => 'value',
                    ],
                ],
                'eventName' => 'eventName',
                'eventOrganizer' => 'eventOrganizer',
                'externalAccountId' => 'externalAccountId',
                'externalEventId' => 'externalEventId',
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpsertByExternalEventIDWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->upsertByExternalEventID(
            'externalEventId',
            [
                'customProperties' => [
                    [
                        'dataSensitivity' => 'none',
                        'isEncrypted' => true,
                        'isLargeValue' => true,
                        'name' => 'name',
                        'persistenceTimestamp' => 0,
                        'requestId' => 'requestId',
                        'selectedByUser' => true,
                        'selectedByUserTimestamp' => 0,
                        'source' => 'UNKNOWN',
                        'sourceId' => 'sourceId',
                        'sourceLabel' => 'sourceLabel',
                        'sourceMetadata' => 'sourceMetadata',
                        'sourceUpstreamDeployable' => 'sourceUpstreamDeployable',
                        'sourceVid' => [0],
                        'timestamp' => 0,
                        'unit' => 'unit',
                        'updatedByUserId' => 0,
                        'useTimestampAsPersistenceTimestamp' => true,
                        'value' => 'value',
                    ],
                ],
                'eventName' => 'eventName',
                'eventOrganizer' => 'eventOrganizer',
                'externalAccountId' => 'externalAccountId',
                'externalEventId' => 'externalEventId',
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpsertSubscriberStateByEmail(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->upsertSubscriberStateByEmail(
            'subscriberState',
            [
                'externalEventId' => 'externalEventId',
                'externalAccountId' => 'externalAccountId',
                'inputs' => [
                    [
                        'contactProperties' => ['foo' => 'string'],
                        'email' => 'email',
                        'interactionDateTime' => 0,
                        'properties' => ['foo' => 'string'],
                    ],
                ],
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpsertSubscriberStateByEmailWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->upsertSubscriberStateByEmail(
            'subscriberState',
            [
                'externalEventId' => 'externalEventId',
                'externalAccountId' => 'externalAccountId',
                'inputs' => [
                    [
                        'contactProperties' => ['foo' => 'string'],
                        'email' => 'email',
                        'interactionDateTime' => 0,
                        'properties' => ['foo' => 'string'],
                    ],
                ],
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpsertSubscriberStateByID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->upsertSubscriberStateByID(
            'subscriberState',
            [
                'externalEventId' => 'externalEventId',
                'externalAccountId' => 'externalAccountId',
                'inputs' => [
                    [
                        'interactionDateTime' => 0,
                        'properties' => ['foo' => 'string'],
                        'vid' => 0,
                    ],
                ],
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpsertSubscriberStateByIDWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->upsertSubscriberStateByID(
            'subscriberState',
            [
                'externalEventId' => 'externalEventId',
                'externalAccountId' => 'externalAccountId',
                'inputs' => [
                    [
                        'interactionDateTime' => 0,
                        'properties' => ['foo' => 'string'],
                        'vid' => 0,
                    ],
                ],
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
