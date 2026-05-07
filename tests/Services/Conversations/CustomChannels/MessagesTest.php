<?php

namespace Tests\Services\Conversations\CustomChannels;

use HubSpotSDK\Client;
use HubSpotSDK\Conversations\CustomChannels\PublicConversationsMessage;
use HubSpotSDK\Core\Util;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class MessagesTest extends TestCase
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

        $result = $this->client->conversations->customChannels->messages->create(
            0,
            attachments: [['fileID' => 'fileId', 'type' => 'FILE']],
            channelAccountID: 'channelAccountId',
            messageDirection: 'INCOMING',
            recipients: [
                [
                    'deliveryIdentifier' => [
                        'type' => 'CHANNEL_SPECIFIC_OPAQUE_ID', 'value' => 'value',
                    ],
                ],
            ],
            senders: [
                [
                    'deliveryIdentifier' => [
                        'type' => 'CHANNEL_SPECIFIC_OPAQUE_ID', 'value' => 'value',
                    ],
                ],
            ],
            text: 'text',
            timestamp: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicConversationsMessage::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->conversations->customChannels->messages->create(
            0,
            attachments: [
                ['fileID' => 'fileId', 'type' => 'FILE', 'fileUsageType' => 'AUDIO'],
            ],
            channelAccountID: 'channelAccountId',
            messageDirection: 'INCOMING',
            recipients: [
                [
                    'deliveryIdentifier' => [
                        'type' => 'CHANNEL_SPECIFIC_OPAQUE_ID', 'value' => 'value',
                    ],
                    'name' => 'name',
                    'senderActorID' => 'senderActorId',
                ],
            ],
            senders: [
                [
                    'deliveryIdentifier' => [
                        'type' => 'CHANNEL_SPECIFIC_OPAQUE_ID', 'value' => 'value',
                    ],
                    'name' => 'name',
                    'senderActorID' => 'senderActorId',
                ],
            ],
            text: 'text',
            timestamp: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            associateWithContactID: 0,
            inReplyToID: 'inReplyToId',
            integrationIdempotencyID: 'integrationIdempotencyId',
            integrationThreadID: 'integrationThreadId',
            richText: 'richText',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicConversationsMessage::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->conversations->customChannels->messages->update(
            'messageId',
            channelID: 0,
            statusType: 'FAILED'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicConversationsMessage::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->conversations->customChannels->messages->update(
            'messageId',
            channelID: 0,
            statusType: 'FAILED',
            errorMessage: 'errorMessage',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicConversationsMessage::class, $result);
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->conversations->customChannels->messages->get(
            'messageId',
            channelID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicConversationsMessage::class, $result);
    }

    #[Test]
    public function testGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->conversations->customChannels->messages->get(
            'messageId',
            channelID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicConversationsMessage::class, $result);
    }
}
