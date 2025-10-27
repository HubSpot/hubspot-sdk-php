<?php

namespace Tests\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Marketing\Events\MarketingEventCreateRequestParams;
use HubspotSDK\Marketing\Events\MarketingEventEmailSubscriber;
use HubspotSDK\Marketing\Events\MarketingEventExternalUniqueIdentifier;
use HubspotSDK\Marketing\Events\MarketingEventPublicObjectIDDeleteRequest;
use HubspotSDK\Marketing\Events\MarketingEventPublicUpdateRequestFullV2;
use HubspotSDK\Marketing\Events\MarketingEventSubscriber;
use HubspotSDK\Marketing\Events\PropertyValue;
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
            accessToken: 'pat-na1-xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx',
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

        $result = $this->client->marketing->events->create(
            eventName: 'eventName',
            eventOrganizer: 'eventOrganizer',
            externalAccountID: 'externalAccountId',
            externalEventID: 'externalEventId',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->create(
            eventName: 'eventName',
            eventOrganizer: 'eventOrganizer',
            externalAccountID: 'externalAccountId',
            externalEventID: 'externalEventId',
        );

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
            customProperties: [
                PropertyValue::with(
                    name: '',
                    sourceUpstreamDeployable: 'sourceUpstreamDeployable',
                    value: '',
                ),
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
            customProperties: [
                PropertyValue::with(
                    name: '',
                    sourceUpstreamDeployable: 'sourceUpstreamDeployable',
                    value: '',
                )
                    ->withDataSensitivity('none')
                    ->withIsEncrypted(false)
                    ->withIsLargeValue(true)
                    ->withPersistenceTimestamp(0)
                    ->withRequestID('')
                    ->withSelectedByUser(false)
                    ->withSelectedByUserTimestamp(0)
                    ->withSource('UNKNOWN')
                    ->withSourceID('')
                    ->withSourceLabel('')
                    ->withSourceMetadata('')
                    ->withSourceVid([0])
                    ->withTimestamp(0)
                    ->withUnit('')
                    ->withUpdatedByUserID(0)
                    ->withUseTimestampAsPersistenceTimestamp(true),
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

        $result = $this->client->marketing->events->list();

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
            'externalAccountId'
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
            'externalAccountId'
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
            externalAccountID: 'externalAccountId',
            endDateTime: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            startDateTime: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
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
            externalAccountID: 'externalAccountId',
            endDateTime: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            startDateTime: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->deleteBatch(
            [MarketingEventPublicObjectIDDeleteRequest::with(objectID: 'objectId')]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->deleteBatch(
            [MarketingEventPublicObjectIDDeleteRequest::with(objectID: 'objectId')]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteBatchByExternalEventID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->deleteBatchByExternalEventID(
            [
                MarketingEventExternalUniqueIdentifier::with(
                    appID: 0,
                    externalAccountID: 'externalAccountId',
                    externalEventID: 'externalEventId',
                ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteBatchByExternalEventIDWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->deleteBatchByExternalEventID(
            [
                MarketingEventExternalUniqueIdentifier::with(
                    appID: 0,
                    externalAccountID: 'externalAccountId',
                    externalEventID: 'externalEventId',
                ),
            ],
        );

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
            'externalAccountId'
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
            'externalAccountId'
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
            'externalAccountId'
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
            'externalAccountId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSearchByExternalEventID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->searchByExternalEventID('q');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSearchByExternalEventIDWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->searchByExternalEventID('q');

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

        $result = $this->client->marketing->events->updateBatch(
            [
                MarketingEventPublicUpdateRequestFullV2::with(
                    customProperties: [
                        PropertyValue::with(
                            name: '',
                            sourceUpstreamDeployable: 'sourceUpstreamDeployable',
                            value: '',
                        ),
                    ],
                    objectID: 'objectId',
                ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->updateBatch(
            [
                MarketingEventPublicUpdateRequestFullV2::with(
                    customProperties: [
                        PropertyValue::with(
                            name: '',
                            sourceUpstreamDeployable: 'sourceUpstreamDeployable',
                            value: '',
                        )
                            ->withDataSensitivity('none')
                            ->withIsEncrypted(false)
                            ->withIsLargeValue(true)
                            ->withPersistenceTimestamp(0)
                            ->withRequestID('')
                            ->withSelectedByUser(false)
                            ->withSelectedByUserTimestamp(0)
                            ->withSource('UNKNOWN')
                            ->withSourceID('')
                            ->withSourceLabel('')
                            ->withSourceMetadata('')
                            ->withSourceVid([0])
                            ->withTimestamp(0)
                            ->withUnit('')
                            ->withUpdatedByUserID(0)
                            ->withUseTimestampAsPersistenceTimestamp(true),
                    ],
                    objectID: 'objectId',
                )
                    ->withEndDateTime(new \DateTimeImmutable('2019-12-27T18:11:19.117Z'))
                    ->withEventCancelled(true)
                    ->withEventDescription('eventDescription')
                    ->withEventName('eventName')
                    ->withEventOrganizer('eventOrganizer')
                    ->withEventType('eventType')
                    ->withEventURL('eventUrl')
                    ->withStartDateTime(
                        new \DateTimeImmutable('2019-12-27T18:11:19.117Z')
                    ),
            ],
        );

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
            externalAccountID: 'externalAccountId'
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
            externalAccountID: 'externalAccountId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpsertBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->upsertBatch(
            [
                MarketingEventCreateRequestParams::with(
                    eventName: 'eventName',
                    eventOrganizer: 'eventOrganizer',
                    externalAccountID: 'externalAccountId',
                    externalEventID: 'externalEventId',
                ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpsertBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->events->upsertBatch(
            [
                MarketingEventCreateRequestParams::with(
                    eventName: 'eventName',
                    eventOrganizer: 'eventOrganizer',
                    externalAccountID: 'externalAccountId',
                    externalEventID: 'externalEventId',
                )
                    ->withCustomProperties(
                        [
                            PropertyValue::with(
                                name: '',
                                sourceUpstreamDeployable: 'sourceUpstreamDeployable',
                                value: '',
                            )
                                ->withDataSensitivity('none')
                                ->withIsEncrypted(false)
                                ->withIsLargeValue(true)
                                ->withPersistenceTimestamp(0)
                                ->withRequestID('')
                                ->withSelectedByUser(false)
                                ->withSelectedByUserTimestamp(0)
                                ->withSource('UNKNOWN')
                                ->withSourceID('')
                                ->withSourceLabel('')
                                ->withSourceMetadata('')
                                ->withSourceVid([0])
                                ->withTimestamp(0)
                                ->withUnit('')
                                ->withUpdatedByUserID(0)
                                ->withUseTimestampAsPersistenceTimestamp(true),
                        ],
                    )
                    ->withEndDateTime(new \DateTimeImmutable('2019-12-27T18:11:19.117Z'))
                    ->withEventCancelled(true)
                    ->withEventCompleted(true)
                    ->withEventDescription('eventDescription')
                    ->withEventType('eventType')
                    ->withEventURL('eventUrl')
                    ->withStartDateTime(
                        new \DateTimeImmutable('2019-12-27T18:11:19.117Z')
                    ),
            ],
        );

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
            eventName: 'eventName',
            eventOrganizer: 'eventOrganizer',
            externalAccountID: 'externalAccountId',
            externalEventID1: 'externalEventId',
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
            eventName: 'eventName',
            eventOrganizer: 'eventOrganizer',
            externalAccountID: 'externalAccountId',
            externalEventID1: 'externalEventId',
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
            externalEventID: 'externalEventId',
            externalAccountID: 'externalAccountId',
            inputs: [
                MarketingEventEmailSubscriber::with(
                    email: 'email',
                    interactionDateTime: 0
                ),
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
            externalEventID: 'externalEventId',
            externalAccountID: 'externalAccountId',
            inputs: [
                MarketingEventEmailSubscriber::with(
                    email: 'email',
                    interactionDateTime: 0
                )
                    ->withContactProperties(['foo' => 'string'])
                    ->withProperties(['foo' => 'string']),
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
            externalEventID: 'externalEventId',
            externalAccountID: 'externalAccountId',
            inputs: [MarketingEventSubscriber::with(interactionDateTime: 0)],
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
            externalEventID: 'externalEventId',
            externalAccountID: 'externalAccountId',
            inputs: [
                MarketingEventSubscriber::with(interactionDateTime: 0)
                    ->withProperties(['foo' => 'string'])
                    ->withVid(0),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
