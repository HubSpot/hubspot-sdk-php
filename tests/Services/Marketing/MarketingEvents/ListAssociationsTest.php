<?php

namespace Tests\Services\Marketing\MarketingEvents;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\MarketingEvents\CollectionResponseWithTotalPublicList;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ListAssociationsTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(accessToken: 'My Access Token', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->marketingEvents->listAssociations->list(
            'marketingEventId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponseWithTotalPublicList::class,
            $result
        );
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->marketingEvents
            ->listAssociations
            ->delete('listId', marketingEventID: 'marketingEventId')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->marketingEvents
            ->listAssociations
            ->delete('listId', marketingEventID: 'marketingEventId')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testAssociate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->marketingEvents
            ->listAssociations
            ->associate('listId', marketingEventID: 'marketingEventId')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testAssociateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->marketingEvents
            ->listAssociations
            ->associate('listId', marketingEventID: 'marketingEventId')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testAssociateByExternalAccount(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->marketingEvents
            ->listAssociations
            ->associateByExternalAccount(
                'listId',
                externalAccountID: 'externalAccountId',
                externalEventID: 'externalEventId',
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testAssociateByExternalAccountWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->marketingEvents
            ->listAssociations
            ->associateByExternalAccount(
                'listId',
                externalAccountID: 'externalAccountId',
                externalEventID: 'externalEventId',
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteByExternalAccount(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->marketingEvents
            ->listAssociations
            ->deleteByExternalAccount(
                'listId',
                externalAccountID: 'externalAccountId',
                externalEventID: 'externalEventId',
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteByExternalAccountWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->marketingEvents
            ->listAssociations
            ->deleteByExternalAccount(
                'listId',
                externalAccountID: 'externalAccountId',
                externalEventID: 'externalEventId',
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testListByExternalAccount(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->marketingEvents
            ->listAssociations
            ->listByExternalAccount(
                'externalEventId',
                externalAccountID: 'externalAccountId'
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponseWithTotalPublicList::class,
            $result
        );
    }

    #[Test]
    public function testListByExternalAccountWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->marketingEvents
            ->listAssociations
            ->listByExternalAccount(
                'externalEventId',
                externalAccountID: 'externalAccountId'
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponseWithTotalPublicList::class,
            $result
        );
    }
}
