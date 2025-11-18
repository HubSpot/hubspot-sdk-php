<?php

namespace Tests\Services\Crm\Associations\Schema\V4;

use HubspotSDK\Client;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ConfigurationsTest extends TestCase
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
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->associations
            ->schema
            ->v4
            ->configurations
            ->list()
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBatchCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->associations
            ->schema
            ->v4
            ->configurations
            ->batchCreate(
                'toObjectType',
                [
                    'fromObjectType' => 'fromObjectType',
                    'inputs' => [
                        [
                            'category' => 'HUBSPOT_DEFINED',
                            'maxToObjectIds' => 0,
                            'typeId' => 0,
                        ],
                    ],
                ],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBatchCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->associations
            ->schema
            ->v4
            ->configurations
            ->batchCreate(
                'toObjectType',
                [
                    'fromObjectType' => 'fromObjectType',
                    'inputs' => [
                        [
                            'category' => 'HUBSPOT_DEFINED',
                            'maxToObjectIds' => 0,
                            'typeId' => 0,
                        ],
                    ],
                ],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBatchDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->associations
            ->schema
            ->v4
            ->configurations
            ->batchDelete(
                'toObjectType',
                [
                    'fromObjectType' => 'fromObjectType',
                    'inputs' => [['category' => 'category', 'typeId' => 0]],
                ],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBatchDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->associations
            ->schema
            ->v4
            ->configurations
            ->batchDelete(
                'toObjectType',
                [
                    'fromObjectType' => 'fromObjectType',
                    'inputs' => [['category' => 'category', 'typeId' => 0]],
                ],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBatchUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->associations
            ->schema
            ->v4
            ->configurations
            ->batchUpdate(
                'toObjectType',
                [
                    'fromObjectType' => 'fromObjectType',
                    'inputs' => [
                        [
                            'category' => 'HUBSPOT_DEFINED',
                            'maxToObjectIds' => 0,
                            'typeId' => 0,
                        ],
                    ],
                ],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBatchUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->associations
            ->schema
            ->v4
            ->configurations
            ->batchUpdate(
                'toObjectType',
                [
                    'fromObjectType' => 'fromObjectType',
                    'inputs' => [
                        [
                            'category' => 'HUBSPOT_DEFINED',
                            'maxToObjectIds' => 0,
                            'typeId' => 0,
                        ],
                    ],
                ],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetByObjectTypes(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->associations
            ->schema
            ->v4
            ->configurations
            ->getByObjectTypes(
                'toObjectType',
                ['fromObjectType' => 'fromObjectType']
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetByObjectTypesWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->associations
            ->schema
            ->v4
            ->configurations
            ->getByObjectTypes(
                'toObjectType',
                ['fromObjectType' => 'fromObjectType']
            );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
