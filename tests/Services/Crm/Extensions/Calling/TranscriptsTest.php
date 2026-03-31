<?php

namespace Tests\Services\Crm\Extensions\Calling;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Extensions\Calling\CompletedThirdPartyCallResponse;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateResponse;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class TranscriptsTest extends TestCase
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

        $result = $this->client->crm->extensions->calling->transcripts->create(
            engagementID: 0,
            transcriptCreateUtterances: [
                [
                    'endTimeMillis' => 0,
                    'speaker' => ['id' => 'id', 'name' => 'name'],
                    'startTimeMillis' => 0,
                    'text' => 'text',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TranscriptCreateResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->extensions->calling->transcripts->create(
            engagementID: 0,
            transcriptCreateUtterances: [
                [
                    'endTimeMillis' => 0,
                    'speaker' => ['id' => 'id', 'name' => 'name', 'email' => 'email'],
                    'startTimeMillis' => 0,
                    'text' => 'text',
                    'languageCode' => 'languageCode',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TranscriptCreateResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->extensions->calling->transcripts->delete(
            'transcriptId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCreateInboundCall(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->extensions
            ->calling
            ->transcripts
            ->createInboundCall(
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
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CompletedThirdPartyCallResponse::class, $result);
    }

    #[Test]
    public function testCreateInboundCallWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->extensions
            ->calling
            ->transcripts
            ->createInboundCall(
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
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CompletedThirdPartyCallResponse::class, $result);
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->extensions->calling->transcripts->get(
            'transcriptId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TranscriptResponse::class, $result);
    }
}
