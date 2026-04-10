<?php

namespace Tests\Services\Events;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Util;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class SendTest extends TestCase
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
    public function testBatchSend(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->events->send->batchSend(
            inputs: [
                ['eventName' => 'eventName', 'properties' => ['foo' => 'string']],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testBatchSendWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->events->send->batchSend(
            inputs: [
                [
                    'eventName' => 'eventName',
                    'properties' => ['foo' => 'string'],
                    'email' => 'email',
                    'objectID' => 'objectId',
                    'occurredAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'utk' => 'utk',
                    'uuid' => 'uuid',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testSend(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->events->send->send(
            eventName: 'eventName',
            properties: ['foo' => 'string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testSendWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->events->send->send(
            eventName: 'eventName',
            properties: ['foo' => 'string'],
            email: 'email',
            objectID: 'objectId',
            occurredAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            utk: 'utk',
            uuid: 'uuid',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
