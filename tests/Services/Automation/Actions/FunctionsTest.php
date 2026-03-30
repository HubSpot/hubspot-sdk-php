<?php

namespace Tests\Services\Automation\Actions;

use HubspotSDK\Automation\Actions\CollectionResponsePublicActionFunctionIdentifierNoPaging;
use HubspotSDK\Automation\Actions\PublicActionFunction;
use HubspotSDK\Automation\Actions\PublicActionFunctionIdentifier;
use HubspotSDK\Client;
use HubspotSDK\Core\Util;
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

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
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
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->functions->list(
            'definitionId',
            appID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponsePublicActionFunctionIdentifierNoPaging::class,
            $result
        );
    }

    #[Test]
    public function testListWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->functions->list(
            'definitionId',
            appID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponsePublicActionFunctionIdentifierNoPaging::class,
            $result
        );
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->functions->delete(
            'functionId',
            appID: 0,
            definitionID: 'definitionId',
            functionType: 'POST_ACTION_EXECUTION',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->functions->delete(
            'functionId',
            appID: 0,
            definitionID: 'definitionId',
            functionType: 'POST_ACTION_EXECUTION',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCreateOrReplace(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->functions->createOrReplace(
            'functionId',
            appID: 0,
            definitionID: 'definitionId',
            functionType: 'POST_ACTION_EXECUTION',
            body: 'body',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicActionFunctionIdentifier::class, $result);
    }

    #[Test]
    public function testCreateOrReplaceWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->functions->createOrReplace(
            'functionId',
            appID: 0,
            definitionID: 'definitionId',
            functionType: 'POST_ACTION_EXECUTION',
            body: 'body',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicActionFunctionIdentifier::class, $result);
    }

    #[Test]
    public function testCreateOrReplaceByFunctionType(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->automation
            ->actions
            ->functions
            ->createOrReplaceByFunctionType(
                'POST_ACTION_EXECUTION',
                appID: 0,
                definitionID: 'definitionId',
                body: 'body',
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicActionFunctionIdentifier::class, $result);
    }

    #[Test]
    public function testCreateOrReplaceByFunctionTypeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->automation
            ->actions
            ->functions
            ->createOrReplaceByFunctionType(
                'POST_ACTION_EXECUTION',
                appID: 0,
                definitionID: 'definitionId',
                body: 'body',
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicActionFunctionIdentifier::class, $result);
    }

    #[Test]
    public function testDeleteByFunctionType(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->automation
            ->actions
            ->functions
            ->deleteByFunctionType(
                'POST_ACTION_EXECUTION',
                appID: 0,
                definitionID: 'definitionId'
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteByFunctionTypeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->automation
            ->actions
            ->functions
            ->deleteByFunctionType(
                'POST_ACTION_EXECUTION',
                appID: 0,
                definitionID: 'definitionId'
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->functions->get(
            'functionId',
            appID: 0,
            definitionID: 'definitionId',
            functionType: 'POST_ACTION_EXECUTION',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicActionFunction::class, $result);
    }

    #[Test]
    public function testGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->functions->get(
            'functionId',
            appID: 0,
            definitionID: 'definitionId',
            functionType: 'POST_ACTION_EXECUTION',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicActionFunction::class, $result);
    }

    #[Test]
    public function testGetByFunctionType(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->functions->getByFunctionType(
            'POST_ACTION_EXECUTION',
            appID: 0,
            definitionID: 'definitionId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicActionFunction::class, $result);
    }

    #[Test]
    public function testGetByFunctionTypeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->functions->getByFunctionType(
            'POST_ACTION_EXECUTION',
            appID: 0,
            definitionID: 'definitionId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicActionFunction::class, $result);
    }
}
