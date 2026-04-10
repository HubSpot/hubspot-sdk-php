<?php

namespace Tests\Services\Conversations\CustomChannels;

use HubSpotSDK\Client;
use HubSpotSDK\Conversations\CustomChannels\PublicChannelAccount;
use HubSpotSDK\Conversations\CustomChannels\PublicChannelAccountStagingToken;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Page;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ChannelAccountsTest extends TestCase
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
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->conversations
            ->customChannels
            ->channelAccounts
            ->create(0, authorized: true, inboxID: 'inboxId', name: 'name')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicChannelAccount::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->conversations
            ->customChannels
            ->channelAccounts
            ->create(
                0,
                authorized: true,
                inboxID: 'inboxId',
                name: 'name',
                deliveryIdentifier: [
                    'type' => 'CHANNEL_SPECIFIC_OPAQUE_ID', 'value' => 'value',
                ],
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicChannelAccount::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->conversations
            ->customChannels
            ->channelAccounts
            ->update(0, channelID: 0)
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicChannelAccount::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->conversations
            ->customChannels
            ->channelAccounts
            ->update(0, channelID: 0, authorized: true, name: 'name')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicChannelAccount::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->conversations->customChannels->channelAccounts->list(
            0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(PublicChannelAccount::class, $item);
        }
    }

    #[Test]
    public function testUpdateStagingToken(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->conversations
            ->customChannels
            ->channelAccounts
            ->updateStagingToken('accountToken', channelID: 0)
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicChannelAccountStagingToken::class, $result);
    }

    #[Test]
    public function testUpdateStagingTokenWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->conversations
            ->customChannels
            ->channelAccounts
            ->updateStagingToken(
                'accountToken',
                channelID: 0,
                accountName: 'accountName',
                deliveryIdentifier: [
                    'type' => 'CHANNEL_SPECIFIC_OPAQUE_ID', 'value' => 'value',
                ],
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicChannelAccountStagingToken::class, $result);
    }
}
