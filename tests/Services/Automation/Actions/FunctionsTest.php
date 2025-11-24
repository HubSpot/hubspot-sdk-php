<?php

namespace Tests\Services\Automation\Actions;

use HubspotSDK\Client;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class FunctionsTest extends TestCase
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

        $result = $this->client->automation->actions->functions->list(
            'definitionId',
            ['appId' => 0]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testListWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->functions->list(
            'definitionId',
            ['appId' => 0]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->functions->delete(
            'functionId',
            [
                'appId' => 0,
                'definitionId' => 'definitionId',
                'functionType' => 'POST_ACTION_EXECUTION',
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->functions->delete(
            'functionId',
            [
                'appId' => 0,
                'definitionId' => 'definitionId',
                'functionType' => 'POST_ACTION_EXECUTION',
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateOrReplace(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->functions->createOrReplace(
            'functionId',
            [
                'appId' => 0,
                'definitionId' => 'definitionId',
                'functionType' => 'POST_ACTION_EXECUTION',
                'body' => 'body',
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateOrReplaceWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->functions->createOrReplace(
            'functionId',
            [
                'appId' => 0,
                'definitionId' => 'definitionId',
                'functionType' => 'POST_ACTION_EXECUTION',
                'body' => 'body',
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateOrReplaceByFunctionType(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->automation
            ->actions
            ->functions
            ->createOrReplaceByFunctionType(
                'POST_ACTION_EXECUTION',
                ['appId' => 0, 'definitionId' => 'definitionId', 'body' => 'body'],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateOrReplaceByFunctionTypeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->automation
            ->actions
            ->functions
            ->createOrReplaceByFunctionType(
                'POST_ACTION_EXECUTION',
                ['appId' => 0, 'definitionId' => 'definitionId', 'body' => 'body'],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteByFunctionType(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->automation
            ->actions
            ->functions
            ->deleteByFunctionType(
                'POST_ACTION_EXECUTION',
                ['appId' => 0, 'definitionId' => 'definitionId']
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteByFunctionTypeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->automation
            ->actions
            ->functions
            ->deleteByFunctionType(
                'POST_ACTION_EXECUTION',
                ['appId' => 0, 'definitionId' => 'definitionId']
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->functions->get(
            'functionId',
            [
                'appId' => 0,
                'definitionId' => 'definitionId',
                'functionType' => 'POST_ACTION_EXECUTION',
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->functions->get(
            'functionId',
            [
                'appId' => 0,
                'definitionId' => 'definitionId',
                'functionType' => 'POST_ACTION_EXECUTION',
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetByFunctionType(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->functions->getByFunctionType(
            'POST_ACTION_EXECUTION',
            ['appId' => 0, 'definitionId' => 'definitionId']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetByFunctionTypeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->functions->getByFunctionType(
            'POST_ACTION_EXECUTION',
            ['appId' => 0, 'definitionId' => 'definitionId']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
