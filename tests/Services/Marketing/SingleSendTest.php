<?php

namespace Tests\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\EmailSendStatusView;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class SingleSendTest extends TestCase
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
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->singleSend->create(
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
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->singleSend->create(
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
