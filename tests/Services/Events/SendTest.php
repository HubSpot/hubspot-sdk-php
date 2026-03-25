<?php

namespace Tests\Services\Events;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Events\Send\ExternalBehavioralEventTypeDefinition;
use HubspotSDK\Events\Send\Property;
use HubspotSDK\Page;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class SendTest extends TestCase
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
    public function testCreateEventDefinition(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->events->send->createEventDefinition(
            includeDefaultProperties: true,
            label: 'label',
            propertyDefinitions: [['label' => 'label', 'type' => 'type']],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ExternalBehavioralEventTypeDefinition::class,
            $result
        );
    }

    #[Test]
    public function testCreateEventDefinitionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->events->send->createEventDefinition(
            includeDefaultProperties: true,
            label: 'label',
            propertyDefinitions: [
                [
                    'label' => 'label',
                    'type' => 'type',
                    'description' => 'description',
                    'name' => 'name',
                    'options' => [
                        [
                            'displayOrder' => 0,
                            'hidden' => true,
                            'label' => 'label',
                            'value' => 'value',
                            'description' => 'description',
                        ],
                    ],
                ],
            ],
            customMatchingID: [
                'primaryObjectRule' => [
                    'eventPropertyName' => 'eventPropertyName',
                    'targetObjectPropertyName' => 'targetObjectPropertyName',
                ],
            ],
            description: 'description',
            name: 'name',
            primaryObject: 'primaryObject',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ExternalBehavioralEventTypeDefinition::class,
            $result
        );
    }

    #[Test]
    public function testCreateEventDefinitionProperty(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->events->send->createEventDefinitionProperty(
            'eventName',
            label: 'label',
            type: 'type'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Property::class, $result);
    }

    #[Test]
    public function testCreateEventDefinitionPropertyWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->events->send->createEventDefinitionProperty(
            'eventName',
            label: 'label',
            type: 'type',
            description: 'description',
            name: 'name',
            options: [
                [
                    'displayOrder' => 0,
                    'hidden' => true,
                    'label' => 'label',
                    'value' => 'value',
                    'description' => 'description',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Property::class, $result);
    }

    #[Test]
    public function testDeleteEventDefinition(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->events->send->deleteEventDefinition('eventName');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteEventDefinitionProperty(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->events->send->deleteEventDefinitionProperty(
            'propertyName',
            eventName: 'eventName'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteEventDefinitionPropertyWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->events->send->deleteEventDefinitionProperty(
            'propertyName',
            eventName: 'eventName'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGetEventDefinition(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->events->send->getEventDefinition('eventName');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ExternalBehavioralEventTypeDefinition::class,
            $result
        );
    }

    #[Test]
    public function testListEventDefinitions(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->events->send->listEventDefinitions();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(
                ExternalBehavioralEventTypeDefinition::class,
                $item
            );
        }
    }

    #[Test]
    public function testSendEvent(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->events->send->sendEvent(
            eventName: 'eventName',
            properties: ['foo' => 'string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testSendEventWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->events->send->sendEvent(
            eventName: 'eventName',
            properties: ['foo' => 'string'],
            email: 'email',
            objectID: 'objectId',
            occurredAt: new \DateTimeImmutable('2026-01-20T21:14:16.512Z'),
            utk: 'utk',
            uuid: 'uuid',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testSendEventBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->events->send->sendEventBatch(
            inputs: [
                ['eventName' => 'eventName', 'properties' => ['foo' => 'string']],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testSendEventBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->events->send->sendEventBatch(
            inputs: [
                [
                    'eventName' => 'eventName',
                    'properties' => ['foo' => 'string'],
                    'email' => 'email',
                    'objectID' => 'objectId',
                    'occurredAt' => new \DateTimeImmutable('2026-01-20T21:14:16.512Z'),
                    'utk' => 'utk',
                    'uuid' => 'uuid',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testUpdateEventDefinition(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->events->send->updateEventDefinition('eventName');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ExternalBehavioralEventTypeDefinition::class,
            $result
        );
    }

    #[Test]
    public function testUpdateEventDefinitionProperty(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->events->send->updateEventDefinitionProperty(
            'propertyName',
            eventName: 'eventName'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Property::class, $result);
    }

    #[Test]
    public function testUpdateEventDefinitionPropertyWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->events->send->updateEventDefinitionProperty(
            'propertyName',
            eventName: 'eventName',
            description: 'description',
            label: 'label',
            options: [
                [
                    'displayOrder' => 0,
                    'hidden' => true,
                    'label' => 'label',
                    'value' => 'value',
                    'description' => 'description',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Property::class, $result);
    }
}
