<?php

namespace Tests\Services\Marketing\Transactional;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Marketing\EmailSendStatusView;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class SingleEmailTest extends TestCase
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
    public function testSend(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->transactional->singleEmail->send(
            contactProperties: ['foo' => 'string'],
            customProperties: ['foo' => (object) []],
            emailID: 0,
            message: [
                'bcc' => ['string'], 'cc' => ['string'], 'replyTo' => ['string'],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EmailSendStatusView::class, $result);
    }

    #[Test]
    public function testSendWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->transactional->singleEmail->send(
            contactProperties: ['foo' => 'string'],
            customProperties: ['foo' => (object) []],
            emailID: 0,
            message: [
                'bcc' => ['string'],
                'cc' => ['string'],
                'replyTo' => ['string'],
                'from' => 'from',
                'sendID' => 'sendId',
                'to' => 'to',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EmailSendStatusView::class, $result);
    }
}
