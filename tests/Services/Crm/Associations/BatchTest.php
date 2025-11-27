<?php

namespace Tests\Services\Crm\Associations;

use HubspotSDK\Client;
use HubspotSDK\Crm\Associations\BatchResponsePublicAssociation;
use HubspotSDK\Crm\Associations\BatchResponsePublicAssociationMulti;
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

        $result = $this->client->crm->associations->batch->create(
            'toObjectType',
            [
                'fromObjectType' => 'fromObjectType',
                'inputs' => [
                    [
                        'from' => ['id' => '53628'],
                        'to' => ['id' => '12726'],
                        'type' => 'contact_to_company',
                    ],
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponsePublicAssociation::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->batch->create(
            'toObjectType',
            [
                'fromObjectType' => 'fromObjectType',
                'inputs' => [
                    [
                        'from' => ['id' => '53628'],
                        'to' => ['id' => '12726'],
                        'type' => 'contact_to_company',
                    ],
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponsePublicAssociation::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->batch->delete(
            'toObjectType',
            [
                'fromObjectType' => 'fromObjectType',
                'inputs' => [
                    [
                        'from' => ['id' => '53628'],
                        'to' => ['id' => '12726'],
                        'type' => 'contact_to_company',
                    ],
                ],
            ],
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

        $result = $this->client->crm->associations->batch->delete(
            'toObjectType',
            [
                'fromObjectType' => 'fromObjectType',
                'inputs' => [
                    [
                        'from' => ['id' => '53628'],
                        'to' => ['id' => '12726'],
                        'type' => 'contact_to_company',
                    ],
                ],
            ],
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

        $result = $this->client->crm->associations->batch->get(
            'toObjectType',
            ['fromObjectType' => 'fromObjectType', 'inputs' => [['id' => '37295']]],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponsePublicAssociationMulti::class,
            $result
        );
    }

    #[Test]
    public function testGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->batch->get(
            'toObjectType',
            ['fromObjectType' => 'fromObjectType', 'inputs' => [['id' => '37295']]],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponsePublicAssociationMulti::class,
            $result
        );
    }
}
