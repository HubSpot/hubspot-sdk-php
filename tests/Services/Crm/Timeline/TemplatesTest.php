<?php

namespace Tests\Services\Crm\Timeline;

use HubspotSDK\Client;
use HubspotSDK\Crm\Timeline\CollectionResponseTimelineEventTemplateNoPaging;
use HubspotSDK\Crm\Timeline\TimelineEventTemplate;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class TemplatesTest extends TestCase
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

        $result = $this->client->crm->timeline->templates->create(
            0,
            [
                'name' => 'PetSpot Registration',
                'objectType' => 'contacts',
                'tokens' => [
                    ['label' => 'Pet Name', 'name' => 'petName', 'type' => 'string'],
                    ['label' => 'Pet Age', 'name' => 'petAge', 'type' => 'number'],
                    [
                        'label' => 'Pet Color',
                        'name' => 'petColor',
                        'type' => 'enumeration',
                    ],
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TimelineEventTemplate::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->timeline->templates->create(
            0,
            [
                'name' => 'PetSpot Registration',
                'objectType' => 'contacts',
                'tokens' => [
                    [
                        'label' => 'Pet Name',
                        'name' => 'petName',
                        'type' => 'string',
                        'createdAt' => '2020-02-12T20:58:26Z',
                        'objectPropertyName' => 'customPropertyPetType',
                        'options' => [
                            ['label' => 'Dog', 'value' => 'dog'],
                            ['label' => 'Cat', 'value' => 'cat'],
                        ],
                        'updatedAt' => '2020-02-12T20:58:26Z',
                    ],
                    [
                        'label' => 'Pet Age',
                        'name' => 'petAge',
                        'type' => 'number',
                        'createdAt' => '2020-02-12T20:58:26Z',
                        'objectPropertyName' => 'customPropertyPetType',
                        'options' => [
                            ['label' => 'Dog', 'value' => 'dog'],
                            ['label' => 'Cat', 'value' => 'cat'],
                        ],
                        'updatedAt' => '2020-02-12T20:58:26Z',
                    ],
                    [
                        'label' => 'Pet Color',
                        'name' => 'petColor',
                        'type' => 'enumeration',
                        'createdAt' => '2020-02-12T20:58:26Z',
                        'objectPropertyName' => 'customPropertyPetType',
                        'options' => [
                            ['label' => 'White', 'value' => 'white'],
                            ['label' => 'Black', 'value' => 'black'],
                            ['label' => 'Brown', 'value' => 'brown'],
                            ['label' => 'Other', 'value' => 'other'],
                        ],
                        'updatedAt' => '2020-02-12T20:58:26Z',
                    ],
                ],
                'detailTemplate' => 'Registration occurred at {{#formatDate timestamp}}{{/formatDate}}\n\n#### Questions\n{{#each extraData.questions}}\n  **{{question}}**: {{answer}}\n{{/each}}',
                'headerTemplate' => 'Registered for [{{petName}}](https://my.petspot.com/pets/{{petName}})',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TimelineEventTemplate::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->timeline->templates->update(
            'eventTemplateId',
            [
                'appId' => 0,
                'id' => '1001298',
                'name' => 'PetSpot Registration',
                'tokens' => [
                    ['label' => 'Pet Name', 'name' => 'petName', 'type' => 'string'],
                    ['label' => 'Pet Age', 'name' => 'petAge', 'type' => 'number'],
                    [
                        'label' => 'Pet Color',
                        'name' => 'petColor',
                        'type' => 'enumeration',
                    ],
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TimelineEventTemplate::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->timeline->templates->update(
            'eventTemplateId',
            [
                'appId' => 0,
                'id' => '1001298',
                'name' => 'PetSpot Registration',
                'tokens' => [
                    [
                        'label' => 'Pet Name',
                        'name' => 'petName',
                        'type' => 'string',
                        'createdAt' => '2020-02-12T20:58:26Z',
                        'objectPropertyName' => 'firstname',
                        'options' => [
                            ['label' => 'Dog', 'value' => 'dog'],
                            ['label' => 'Cat', 'value' => 'cat'],
                        ],
                        'updatedAt' => '2020-02-12T20:58:26Z',
                    ],
                    [
                        'label' => 'Pet Age',
                        'name' => 'petAge',
                        'type' => 'number',
                        'createdAt' => '2020-02-12T20:58:26Z',
                        'objectPropertyName' => 'customPropertyPetType',
                        'options' => [
                            ['label' => 'Dog', 'value' => 'dog'],
                            ['label' => 'Cat', 'value' => 'cat'],
                        ],
                        'updatedAt' => '2020-02-12T20:58:26Z',
                    ],
                    [
                        'label' => 'Pet Color',
                        'name' => 'petColor',
                        'type' => 'enumeration',
                        'createdAt' => '2020-02-12T20:58:26Z',
                        'objectPropertyName' => 'customPropertyPetType',
                        'options' => [
                            ['label' => 'White', 'value' => 'white'],
                            ['label' => 'Black', 'value' => 'black'],
                            ['label' => 'Brown', 'value' => 'brown'],
                            ['label' => 'Yellow', 'value' => 'yellow'],
                            ['label' => 'Other', 'value' => 'other'],
                        ],
                        'updatedAt' => '2020-02-12T20:58:26Z',
                    ],
                ],
                'detailTemplate' => 'Registration occurred at {{#formatDate timestamp}}{{/formatDate}}\n\n#### Questions\n{{#each extraData.questions}}\n  **{{question}}**: {{answer}}\n{{/each}}\n\nEDIT',
                'headerTemplate' => 'Registered for [{{petName}}](https://my.petspot.com/pets/{{petName}})',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TimelineEventTemplate::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->timeline->templates->list(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponseTimelineEventTemplateNoPaging::class,
            $result
        );
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->timeline->templates->delete(
            'eventTemplateId',
            ['appId' => 0]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->timeline->templates->delete(
            'eventTemplateId',
            ['appId' => 0]
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

        $result = $this->client->crm->timeline->templates->get(
            'eventTemplateId',
            ['appId' => 0]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TimelineEventTemplate::class, $result);
    }

    #[Test]
    public function testGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->timeline->templates->get(
            'eventTemplateId',
            ['appId' => 0]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TimelineEventTemplate::class, $result);
    }
}
