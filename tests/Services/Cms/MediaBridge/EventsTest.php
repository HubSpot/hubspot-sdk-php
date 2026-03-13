<?php

namespace Tests\Services\Cms\MediaBridge;

use HubspotSDK\Client;
use HubspotSDK\Cms\MediaBridge\AttentionSpanEvent;
use HubspotSDK\Cms\MediaBridge\MediaPlayedEvent;
use HubspotSDK\Cms\MediaBridge\MediaPlayedPercentageEvent;
use HubspotSDK\Core\Util;
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

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
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

        $result = $this->client->cms->mediaBridge->events->createAttentionSpanEvent(
            mediaType: 'AUDIO',
            occurredTimestamp: 0,
            rawDataMap: ['foo' => 0],
            sessionID: 'sessionId',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AttentionSpanEvent::class, $result);
    }

    #[Test]
    public function testCreateAttentionSpanEventWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->events->createAttentionSpanEvent(
            mediaType: 'AUDIO',
            occurredTimestamp: 0,
            rawDataMap: ['foo' => 0],
            sessionID: 'sessionId',
            _hsenc: '_hsenc',
            contactID: 0,
            contactUtk: 'contactUtk',
            derivedValues: ['totalPercentPlayed' => 0, 'totalSecondsPlayed' => 0],
            externalID: 'externalId',
            mediaBridgeID: 0,
            mediaName: 'mediaName',
            mediaURL: 'mediaUrl',
            pageID: 0,
            pageName: 'pageName',
            pageURL: 'pageUrl',
            rawDataString: 'rawDataString',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AttentionSpanEvent::class, $result);
    }

    #[Test]
    public function testCreateMediaPlayedEvent(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->events->createMediaPlayedEvent(
            mediaType: 'AUDIO',
            occurredTimestamp: 0,
            sessionID: 'sessionId',
            state: 'STARTED',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MediaPlayedEvent::class, $result);
    }

    #[Test]
    public function testCreateMediaPlayedEventWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->events->createMediaPlayedEvent(
            mediaType: 'AUDIO',
            occurredTimestamp: 0,
            sessionID: 'sessionId',
            state: 'STARTED',
            _hsenc: '_hsenc',
            contactID: 0,
            contactUtk: 'contactUtk',
            externalID: 'externalId',
            iframeURL: 'iframeUrl',
            mediaBridgeID: 0,
            mediaName: 'mediaName',
            mediaURL: 'mediaUrl',
            pageID: 0,
            pageName: 'pageName',
            pageURL: 'pageUrl',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MediaPlayedEvent::class, $result);
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
            ->createMediaPlayedPercentEvent(
                mediaType: 'AUDIO',
                occurredTimestamp: 0,
                playedPercent: 0,
                sessionID: 'sessionId',
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MediaPlayedPercentageEvent::class, $result);
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
            ->createMediaPlayedPercentEvent(
                mediaType: 'AUDIO',
                occurredTimestamp: 0,
                playedPercent: 0,
                sessionID: 'sessionId',
                _hsenc: '_hsenc',
                contactID: 0,
                contactUtk: 'contactUtk',
                externalID: 'externalId',
                mediaBridgeID: 0,
                mediaName: 'mediaName',
                mediaURL: 'mediaUrl',
                pageID: 0,
                pageName: 'pageName',
                pageURL: 'pageUrl',
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MediaPlayedPercentageEvent::class, $result);
    }
}
