<?php

namespace Tests\Services\Crm\Objects\PartnerClients;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Objects\BatchResponseSimplePublicObject;
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

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(
            accessToken: 'pat-na1-xxxxxxxx-xxxx',
            baseUrl: $testUrl,
        );

        $this->client = $client;
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->objects->partnerClients->batch->update(
            inputs: [['id' => 'id', 'properties' => ['foo' => 'string']]]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseSimplePublicObject::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->objects->partnerClients->batch->update(
            inputs: [
                [
                    'id' => 'id',
                    'properties' => ['foo' => 'string'],
                    'idProperty' => 'my_unique_property_name',
                    'objectWriteTraceID' => 'objectWriteTraceId',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseSimplePublicObject::class, $result);
    }
}
