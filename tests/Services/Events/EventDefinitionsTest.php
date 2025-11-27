<?php

namespace Tests\Services\Events;

use HubspotSDK\Client;
use HubspotSDK\Events\EventDefinitions\ExternalBehavioralEventTypeDefinition;
use HubspotSDK\Page;
use HubspotSDK\Property;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class EventDefinitionsTest extends TestCase
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

        $result = $this->client->events->eventDefinitions->create([
            'label' => 'label',
            'propertyDefinitions' => [['label' => 'label', 'type' => 'type']],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ExternalBehavioralEventTypeDefinition::class,
            $result
        );
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->events->eventDefinitions->create([
            'label' => 'label',
            'propertyDefinitions' => [
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
            'description' => 'description',
            'name' => 'name',
            'primaryObject' => 'primaryObject',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ExternalBehavioralEventTypeDefinition::class,
            $result
        );
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->events->eventDefinitions->update('eventName', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ExternalBehavioralEventTypeDefinition::class,
            $result
        );
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->events->eventDefinitions->list([]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->events->eventDefinitions->delete('eventName');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCreateProperty(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->events->eventDefinitions->createProperty(
            'eventName',
            ['label' => 'label', 'type' => 'type']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Property::class, $result);
    }

    #[Test]
    public function testCreatePropertyWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->events->eventDefinitions->createProperty(
            'eventName',
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
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Property::class, $result);
    }

    #[Test]
    public function testDeleteProperty(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->events->eventDefinitions->deleteProperty(
            'propertyName',
            ['eventName' => 'eventName']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeletePropertyWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->events->eventDefinitions->deleteProperty(
            'propertyName',
            ['eventName' => 'eventName']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->events->eventDefinitions->get('eventName');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ExternalBehavioralEventTypeDefinition::class,
            $result
        );
    }

    #[Test]
    public function testUpdateProperty(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->events->eventDefinitions->updateProperty(
            'propertyName',
            ['eventName' => 'eventName']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Property::class, $result);
    }

    #[Test]
    public function testUpdatePropertyWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->events->eventDefinitions->updateProperty(
            'propertyName',
            [
                'eventName' => 'eventName',
                'description' => 'description',
                'label' => 'label',
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
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Property::class, $result);
    }
}
