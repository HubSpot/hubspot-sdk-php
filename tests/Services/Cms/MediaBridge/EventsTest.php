<?php

namespace Tests\Services\Cms\MediaBridge;

use HubspotSDK\Client;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class EventsTest extends TestCase
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
    public function testCreateAttentionSpanEvent(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->mediaBridge
            ->events
            ->createAttentionSpanEvent([
                'mediaType' => 'VIDEO',
                'occurredTimestamp' => 0,
                'rawDataMap' => ['foo' => 0],
                'sessionId' => 'sessionId',
            ])
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateAttentionSpanEventWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->mediaBridge
            ->events
            ->createAttentionSpanEvent([
                'mediaType' => 'VIDEO',
                'occurredTimestamp' => 0,
                'rawDataMap' => ['foo' => 0],
                'sessionId' => 'sessionId',
            ])
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateMediaPlayedEvent(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->events->createMediaPlayedEvent([
            'mediaType' => 'VIDEO',
            'occurredTimestamp' => 0,
            'sessionId' => 'sessionId',
            'state' => 'STARTED',
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateMediaPlayedEventWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->events->createMediaPlayedEvent([
            'mediaType' => 'VIDEO',
            'occurredTimestamp' => 0,
            'sessionId' => 'sessionId',
            'state' => 'STARTED',
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateMediaPlayedPercentEvent(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->mediaBridge
            ->events
            ->createMediaPlayedPercentEvent([
                'mediaType' => 'VIDEO',
                'occurredTimestamp' => 0,
                'playedPercent' => 0,
                'sessionId' => 'sessionId',
            ])
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateMediaPlayedPercentEventWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->mediaBridge
            ->events
            ->createMediaPlayedPercentEvent([
                'mediaType' => 'VIDEO',
                'occurredTimestamp' => 0,
                'playedPercent' => 0,
                'sessionId' => 'sessionId',
            ])
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
