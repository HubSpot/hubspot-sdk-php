<?php

namespace Tests\Services\Crm\Timeline;

use HubspotSDK\Client;
use HubspotSDK\Crm\Timeline\TimelineEventTemplateToken;
use HubspotSDK\Crm\Timeline\TimelineEventTemplateTokenOption;
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
            name: 'PetSpot Registration',
            objectType: 'contacts',
            tokens: [
                TimelineEventTemplateToken::with(
                    label: 'Pet Name',
                    name: 'petName',
                    type: 'string'
                ),
                TimelineEventTemplateToken::with(
                    label: 'Pet Age',
                    name: 'petAge',
                    type: 'number'
                ),
                TimelineEventTemplateToken::with(
                    label: 'Pet Color',
                    name: 'petColor',
                    type: 'enumeration'
                ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->timeline->templates->create(
            0,
            name: 'PetSpot Registration',
            objectType: 'contacts',
            tokens: [
                TimelineEventTemplateToken::with(
                    label: 'Pet Name',
                    name: 'petName',
                    type: 'string'
                )
                    ->withCreatedAt(new \DateTimeImmutable('2020-02-12T20:58:26Z'))
                    ->withObjectPropertyName('customPropertyPetType')
                    ->withOptions(
                        [
                            TimelineEventTemplateTokenOption::with(label: 'Dog', value: 'dog'),
                            TimelineEventTemplateTokenOption::with(label: 'Cat', value: 'cat'),
                        ],
                    )
                    ->withUpdatedAt(new \DateTimeImmutable('2020-02-12T20:58:26Z')),
                TimelineEventTemplateToken::with(
                    label: 'Pet Age',
                    name: 'petAge',
                    type: 'number'
                )
                    ->withCreatedAt(new \DateTimeImmutable('2020-02-12T20:58:26Z'))
                    ->withObjectPropertyName('customPropertyPetType')
                    ->withOptions(
                        [
                            TimelineEventTemplateTokenOption::with(label: 'Dog', value: 'dog'),
                            TimelineEventTemplateTokenOption::with(label: 'Cat', value: 'cat'),
                        ],
                    )
                    ->withUpdatedAt(new \DateTimeImmutable('2020-02-12T20:58:26Z')),
                TimelineEventTemplateToken::with(
                    label: 'Pet Color',
                    name: 'petColor',
                    type: 'enumeration'
                )
                    ->withCreatedAt(new \DateTimeImmutable('2020-02-12T20:58:26Z'))
                    ->withObjectPropertyName('customPropertyPetType')
                    ->withOptions(
                        [
                            TimelineEventTemplateTokenOption::with(
                                label: 'White',
                                value: 'white'
                            ),
                            TimelineEventTemplateTokenOption::with(
                                label: 'Black',
                                value: 'black'
                            ),
                            TimelineEventTemplateTokenOption::with(
                                label: 'Brown',
                                value: 'brown'
                            ),
                            TimelineEventTemplateTokenOption::with(
                                label: 'Other',
                                value: 'other'
                            ),
                        ],
                    )
                    ->withUpdatedAt(new \DateTimeImmutable('2020-02-12T20:58:26Z')),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->timeline->templates->update(
            'eventTemplateId',
            appID: 0,
            id: '1001298',
            name: 'PetSpot Registration',
            tokens: [
                TimelineEventTemplateToken::with(
                    label: 'Pet Name',
                    name: 'petName',
                    type: 'string'
                ),
                TimelineEventTemplateToken::with(
                    label: 'Pet Age',
                    name: 'petAge',
                    type: 'number'
                ),
                TimelineEventTemplateToken::with(
                    label: 'Pet Color',
                    name: 'petColor',
                    type: 'enumeration'
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

        $result = $this->client->crm->timeline->templates->update(
            'eventTemplateId',
            appID: 0,
            id: '1001298',
            name: 'PetSpot Registration',
            tokens: [
                TimelineEventTemplateToken::with(
                    label: 'Pet Name',
                    name: 'petName',
                    type: 'string'
                )
                    ->withCreatedAt(new \DateTimeImmutable('2020-02-12T20:58:26Z'))
                    ->withObjectPropertyName('firstname')
                    ->withOptions(
                        [
                            TimelineEventTemplateTokenOption::with(label: 'Dog', value: 'dog'),
                            TimelineEventTemplateTokenOption::with(label: 'Cat', value: 'cat'),
                        ],
                    )
                    ->withUpdatedAt(new \DateTimeImmutable('2020-02-12T20:58:26Z')),
                TimelineEventTemplateToken::with(
                    label: 'Pet Age',
                    name: 'petAge',
                    type: 'number'
                )
                    ->withCreatedAt(new \DateTimeImmutable('2020-02-12T20:58:26Z'))
                    ->withObjectPropertyName('customPropertyPetType')
                    ->withOptions(
                        [
                            TimelineEventTemplateTokenOption::with(label: 'Dog', value: 'dog'),
                            TimelineEventTemplateTokenOption::with(label: 'Cat', value: 'cat'),
                        ],
                    )
                    ->withUpdatedAt(new \DateTimeImmutable('2020-02-12T20:58:26Z')),
                TimelineEventTemplateToken::with(
                    label: 'Pet Color',
                    name: 'petColor',
                    type: 'enumeration'
                )
                    ->withCreatedAt(new \DateTimeImmutable('2020-02-12T20:58:26Z'))
                    ->withObjectPropertyName('customPropertyPetType')
                    ->withOptions(
                        [
                            TimelineEventTemplateTokenOption::with(
                                label: 'White',
                                value: 'white'
                            ),
                            TimelineEventTemplateTokenOption::with(
                                label: 'Black',
                                value: 'black'
                            ),
                            TimelineEventTemplateTokenOption::with(
                                label: 'Brown',
                                value: 'brown'
                            ),
                            TimelineEventTemplateTokenOption::with(
                                label: 'Yellow',
                                value: 'yellow'
                            ),
                            TimelineEventTemplateTokenOption::with(
                                label: 'Other',
                                value: 'other'
                            ),
                        ],
                    )
                    ->withUpdatedAt(new \DateTimeImmutable('2020-02-12T20:58:26Z')),
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

        $result = $this->client->crm->timeline->templates->list(0);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->timeline->templates->delete(
            'eventTemplateId',
            0
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->timeline->templates->delete(
            'eventTemplateId',
            0
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->timeline->templates->get(
            'eventTemplateId',
            0
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->timeline->templates->get(
            'eventTemplateId',
            0
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
