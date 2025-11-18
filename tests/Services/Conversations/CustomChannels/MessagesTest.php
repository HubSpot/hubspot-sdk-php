<?php

namespace Tests\Services\Conversations\CustomChannels;

use HubspotSDK\Client;
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
            0,
            [
                'attachments' => [['fileId' => 'fileId', 'type' => 'FILE']],
                'channelAccountId' => 'channelAccountId',
                'messageDirection' => 'INCOMING',
                'recipients' => [
                    ['deliveryIdentifier' => ['type' => 'type', 'value' => 'value']],
                ],
                'senders' => [
                    ['deliveryIdentifier' => ['type' => 'type', 'value' => 'value']],
                ],
                'text' => 'text',
                'timestamp' => '2019-12-27T18:11:19.117Z',
            ],
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
            0,
            [
                'attachments' => [
                    [
                        'fileId' => 'fileId',
                        'type' => 'FILE',
                        'fileUsageType' => 'fileUsageType',
                    ],
                ],
                'channelAccountId' => 'channelAccountId',
                'messageDirection' => 'INCOMING',
                'recipients' => [
                    [
                        'deliveryIdentifier' => ['type' => 'type', 'value' => 'value'],
                        'name' => 'name',
                    ],
                ],
                'senders' => [
                    [
                        'deliveryIdentifier' => ['type' => 'type', 'value' => 'value'],
                        'name' => 'name',
                    ],
                ],
                'text' => 'text',
                'timestamp' => '2019-12-27T18:11:19.117Z',
            ],
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
            ['channelId' => 0, 'statusType' => 'SENT']
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
            ['channelId' => 0, 'statusType' => 'SENT']
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
            ['channelId' => 0]
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
            ['channelId' => 0]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
