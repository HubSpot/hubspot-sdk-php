<?php

namespace Tests\Services\Marketing;

use HubspotSDK\Client;
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

        $result = $this->client->marketing->singleSend->send(
            emailID: 0,
            message: ['to' => 'to']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EmailSendStatusView::class, $result);
    }

    #[Test]
    public function testSendWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->singleSend->send(
            emailID: 0,
            message: [
                'to' => 'to',
                'bcc' => ['string'],
                'cc' => ['string'],
                'from' => 'from',
                'replyTo' => ['string'],
                'sendID' => 'sendId',
            ],
            contactProperties: ['foo' => 'string'],
            customProperties: ['foo' => []],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EmailSendStatusView::class, $result);
    }
}
