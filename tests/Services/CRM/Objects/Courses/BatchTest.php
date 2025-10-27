<?php

namespace Tests\Services\CRM\Objects\Courses;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Client;
use HubspotSDK\CRM\PublicAssociationsForObject;
use HubspotSDK\CRM\SimplePublicObjectBatchInput;
use HubspotSDK\CRM\SimplePublicObjectBatchInputForCreate;
use HubspotSDK\CRM\SimplePublicObjectBatchInputUpsert;
use HubspotSDK\CRM\SimplePublicObjectID;
use HubspotSDK\PublicObjectID;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class BatchTest extends TestCase
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

        $result = $this->client->crm->objects->courses->batch->create(
            [
                SimplePublicObjectBatchInputForCreate::with(
                    properties: ['foo' => 'string']
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

        $result = $this->client->crm->objects->courses->batch->create(
            [
                SimplePublicObjectBatchInputForCreate::with(
                    properties: ['foo' => 'string']
                )
                    ->withAssociations(
                        [
                            PublicAssociationsForObject::with(
                                to: PublicObjectID::with(id: '37295'),
                                types: [
                                    AssociationSpec::with(
                                        associationCategory: 'HUBSPOT_DEFINED',
                                        associationTypeID: 0
                                    ),
                                ],
                            ),
                        ],
                    )
                    ->withObjectWriteTraceID('objectWriteTraceId'),
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

        $result = $this->client->crm->objects->courses->batch->update(
            [
                SimplePublicObjectBatchInput::with(
                    id: 'id',
                    properties: ['foo' => 'string']
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

        $result = $this->client->crm->objects->courses->batch->update(
            [
                SimplePublicObjectBatchInput::with(
                    id: 'id',
                    properties: ['foo' => 'string']
                )
                    ->withIDProperty('my_unique_property_name')
                    ->withObjectWriteTraceID('objectWriteTraceId'),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->courses->batch->delete(
            [SimplePublicObjectID::with(id: 'id')]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->courses->batch->delete(
            [SimplePublicObjectID::with(id: 'id')]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->courses->batch->get(
            inputs: [SimplePublicObjectID::with(id: 'id')],
            properties: ['string'],
            propertiesWithHistory: ['string'],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->courses->batch->get(
            inputs: [SimplePublicObjectID::with(id: 'id')],
            properties: ['string'],
            propertiesWithHistory: ['string'],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpsert(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->courses->batch->upsert(
            [
                SimplePublicObjectBatchInputUpsert::with(
                    id: 'id',
                    properties: ['foo' => 'string']
                ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpsertWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->courses->batch->upsert(
            [
                SimplePublicObjectBatchInputUpsert::with(
                    id: 'id',
                    properties: ['foo' => 'string']
                )
                    ->withIDProperty('idProperty')
                    ->withObjectWriteTraceID('objectWriteTraceId'),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
