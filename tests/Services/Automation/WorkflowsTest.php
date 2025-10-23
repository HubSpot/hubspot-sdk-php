<?php

namespace Tests\Services\Automation;

use HubspotSDK\Automation\Workflows\APIFlowBatchFetchFlowIDCoordinate;
use HubspotSDK\Automation\Workflows\APIFlowBatchFetchMigrationFlowIDCoordinate;
use HubspotSDK\Client;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class WorkflowsTest extends TestCase
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

        $result = $this->client->automation->workflows->create();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->workflows->update('flowId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->workflows->list();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->workflows->delete(0);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBatchGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->workflows->batchGet(
            [
                APIFlowBatchFetchFlowIDCoordinate::with(
                    flowID: 'flowId',
                    type: 'FLOW_ID'
                ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBatchGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->workflows->batchGet(
            [
                APIFlowBatchFetchFlowIDCoordinate::with(
                    flowID: 'flowId',
                    type: 'FLOW_ID'
                ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBatchGetIDMappings(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->workflows->batchGetIDMappings(
            [
                APIFlowBatchFetchMigrationFlowIDCoordinate::with(
                    flowMigrationStatuses: '12345',
                    type: 'FLOW_ID'
                ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBatchGetIDMappingsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->workflows->batchGetIDMappings(
            [
                APIFlowBatchFetchMigrationFlowIDCoordinate::with(
                    flowMigrationStatuses: '12345',
                    type: 'FLOW_ID'
                ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->workflows->get('flowId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testListEmailCampaigns(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->workflows->listEmailCampaigns();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
