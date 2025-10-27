<?php

namespace Tests\Services\CRM\Objects\PartnerClients;

use HubspotSDK\Client;
use HubspotSDK\CRM\SimplePublicObjectBatchInput;
use HubspotSDK\CRM\SimplePublicObjectID;
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
    public function testBatchGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->partnerClients->batch->batchGet(
            inputs: [SimplePublicObjectID::with(id: 'id')],
            properties: ['string'],
            propertiesWithHistory: ['string'],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBatchGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->partnerClients->batch->batchGet(
            inputs: [SimplePublicObjectID::with(id: 'id')],
            properties: ['string'],
            propertiesWithHistory: ['string'],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBatchUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->partnerClients->batch->batchUpdate(
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
    public function testBatchUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->partnerClients->batch->batchUpdate(
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
}
