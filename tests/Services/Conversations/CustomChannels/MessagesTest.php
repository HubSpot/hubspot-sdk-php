<?php

namespace Tests\Services\Conversations\CustomChannels;

use HubspotSDK\Client;
use HubspotSDK\Conversations\CustomChannels\ChannelIntegrationParticipant;
use HubspotSDK\Conversations\CustomChannels\FileAttachment;
use HubspotSDK\Conversations\PublicDeliveryIdentifier;
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

        $result = $this->client->conversations->customChannels->messages->create(
            'channelId',
            attachments: [FileAttachment::with(fileID: 'fileId', type: 'FILE')],
            channelAccountID: 'channelAccountId',
            integrationThreadID: 'integrationThreadId',
            messageDirection: 'INCOMING',
            recipients: [
                ChannelIntegrationParticipant::with(
                    deliveryIdentifier: PublicDeliveryIdentifier::with(
                        type: 'type',
                        value: 'value'
                    ),
                ),
            ],
            senders: [
                ChannelIntegrationParticipant::with(
                    deliveryIdentifier: PublicDeliveryIdentifier::with(
                        type: 'type',
                        value: 'value'
                    ),
                ),
            ],
            text: 'text',
            timestamp: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->conversations->customChannels->messages->create(
            'channelId',
            attachments: [
                FileAttachment::with(fileID: 'fileId', type: 'FILE')
                    ->withFileUsageType('fileUsageType'),
            ],
            channelAccountID: 'channelAccountId',
            integrationThreadID: 'integrationThreadId',
            messageDirection: 'INCOMING',
            recipients: [
                ChannelIntegrationParticipant::with(
                    deliveryIdentifier: PublicDeliveryIdentifier::with(
                        type: 'type',
                        value: 'value'
                    ),
                )
                    ->withName('name'),
            ],
            senders: [
                ChannelIntegrationParticipant::with(
                    deliveryIdentifier: PublicDeliveryIdentifier::with(
                        type: 'type',
                        value: 'value'
                    ),
                )
                    ->withName('name'),
            ],
            text: 'text',
            timestamp: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->conversations->customChannels->messages->update(
            'messageId',
            channelID: 'channelId',
            statusType: 'SENT'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->conversations->customChannels->messages->update(
            'messageId',
            channelID: 'channelId',
            statusType: 'SENT'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->conversations->customChannels->messages->get(
            'messageId',
            'channelId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->conversations->customChannels->messages->get(
            'messageId',
            'channelId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
