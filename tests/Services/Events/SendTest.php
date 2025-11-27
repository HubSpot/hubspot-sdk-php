<?php

namespace Tests\Services\Events;

use HubspotSDK\Client;
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

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(
            accessToken: 'pat-na1-xxxxxxxx-xxxx',
            baseUrl: $testUrl,
        );

        $this->client = $client;
    }

    #[Test]
    public function testSend(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->events->send->send([
            'eventName' => 'eventName', 'properties' => ['foo' => 'string'],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testSendWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->events->send->send([
            'eventName' => 'eventName',
            'properties' => ['foo' => 'string'],
            'email' => 'email',
            'objectId' => 'objectId',
            'occurredAt' => '2019-12-27T18:11:19.117Z',
            'utk' => 'utk',
            'uuid' => 'uuid',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testSendBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->events->send->sendBatch([
            'inputs' => [
                ['eventName' => 'eventName', 'properties' => ['foo' => 'string']],
            ],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testSendBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->events->send->sendBatch([
            'inputs' => [
                [
                    'eventName' => 'eventName',
                    'properties' => ['foo' => 'string'],
                    'email' => 'email',
                    'objectId' => 'objectId',
                    'occurredAt' => '2019-12-27T18:11:19.117Z',
                    'utk' => 'utk',
                    'uuid' => 'uuid',
                ],
            ],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
