<?php

namespace Tests\Services\Crm\Extensions;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Crm\Extensions\Calling\ChannelConnectionSettingsResponse;
use HubSpotSDK\Crm\Extensions\Calling\CompletedThirdPartyCallResponse;
use HubSpotSDK\Crm\Extensions\Calling\RecordingSettingsResponse;
use HubSpotSDK\Crm\Extensions\Calling\SettingsResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class CallingTest extends TestCase
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
    public function testCreateChannelConnectionSettings(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->extensions
            ->calling
            ->createChannelConnectionSettings(0, isReady: true, url: 'url')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ChannelConnectionSettingsResponse::class, $result);
    }

    #[Test]
    public function testCreateChannelConnectionSettingsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->extensions
            ->calling
            ->createChannelConnectionSettings(0, isReady: true, url: 'url')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ChannelConnectionSettingsResponse::class, $result);
    }

    #[Test]
    public function testCreateInboundCall(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->extensions->calling->createInboundCall(
            createEngagement: true,
            engagementProperties: ['foo' => 'string'],
            externalCallID: 'externalCallId',
            finalCallStatus: 'BUSY',
            fromNumber: [
                'e164Number' => 'e164Number', 'phoneNumberType' => 'FIXED_LINE',
            ],
            potentialRecipientUserIDs: [0],
            toNumber: [
                'e164Number' => 'e164Number', 'phoneNumberType' => 'FIXED_LINE',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CompletedThirdPartyCallResponse::class, $result);
    }

    #[Test]
    public function testCreateInboundCallWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->extensions->calling->createInboundCall(
            createEngagement: true,
            engagementProperties: ['foo' => 'string'],
            externalCallID: 'externalCallId',
            finalCallStatus: 'BUSY',
            fromNumber: [
                'e164Number' => 'e164Number',
                'phoneNumberType' => 'FIXED_LINE',
                'extension' => 'extension',
            ],
            potentialRecipientUserIDs: [0],
            toNumber: [
                'e164Number' => 'e164Number',
                'phoneNumberType' => 'FIXED_LINE',
                'extension' => 'extension',
            ],
            callStartedTimestamp: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            durationSeconds: 0,
            userID: 0,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CompletedThirdPartyCallResponse::class, $result);
    }

    #[Test]
    public function testCreateRecordingReady(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->extensions->calling->createRecordingReady(
            engagementID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCreateRecordingReadyWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->extensions->calling->createRecordingReady(
            engagementID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCreateRecordingSettings(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->extensions->calling->createRecordingSettings(
            0,
            urlToRetrieveAuthedRecording: 'urlToRetrieveAuthedRecording'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(RecordingSettingsResponse::class, $result);
    }

    #[Test]
    public function testCreateRecordingSettingsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->extensions->calling->createRecordingSettings(
            0,
            urlToRetrieveAuthedRecording: 'urlToRetrieveAuthedRecording'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(RecordingSettingsResponse::class, $result);
    }

    #[Test]
    public function testCreateSettings(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->extensions->calling->createSettings(
            0,
            height: 0,
            isReady: true,
            name: 'name',
            supportsCustomObjects: true,
            supportsInboundCalling: true,
            url: 'url',
            usesCallingWindow: true,
            usesRemote: true,
            width: 0,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SettingsResponse::class, $result);
    }

    #[Test]
    public function testCreateSettingsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->extensions->calling->createSettings(
            0,
            height: 0,
            isReady: true,
            name: 'name',
            supportsCustomObjects: true,
            supportsInboundCalling: true,
            url: 'url',
            usesCallingWindow: true,
            usesRemote: true,
            width: 0,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SettingsResponse::class, $result);
    }

    #[Test]
    public function testDeleteChannelConnectionSettings(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->extensions
            ->calling
            ->deleteChannelConnectionSettings(0)
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteSettings(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->extensions->calling->deleteSettings(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGetChannelConnectionSettings(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->extensions
            ->calling
            ->getChannelConnectionSettings(0)
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ChannelConnectionSettingsResponse::class, $result);
    }

    #[Test]
    public function testGetRecordingSettings(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->extensions->calling->getRecordingSettings(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(RecordingSettingsResponse::class, $result);
    }

    #[Test]
    public function testGetSettings(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->extensions->calling->getSettings(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SettingsResponse::class, $result);
    }

    #[Test]
    public function testUpdateChannelConnectionSettings(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->extensions
            ->calling
            ->updateChannelConnectionSettings(0)
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ChannelConnectionSettingsResponse::class, $result);
    }

    #[Test]
    public function testUpdateRecordingSettings(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->extensions->calling->updateRecordingSettings(
            0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(RecordingSettingsResponse::class, $result);
    }

    #[Test]
    public function testUpdateSettings(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->extensions->calling->updateSettings(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SettingsResponse::class, $result);
    }
}
