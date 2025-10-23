<?php

namespace Tests\Services\Events;

use HubspotSDK\Client;
use HubspotSDK\Events\Send\BehavioralEventHTTPCompletionRequest;
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
            accessToken: 'pat-na1-xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx',
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

        $result = $this->client->events->send->send(
            eventName: 'pe123456_account_login'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSendWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->events->send->send(
            eventName: 'pe123456_account_login'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSendBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->events->send->sendBatch(
            [
                BehavioralEventHTTPCompletionRequest::with(
                    eventName: 'pe123456_account_login'
                ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSendBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->events->send->sendBatch(
            [
                BehavioralEventHTTPCompletionRequest::with(
                    eventName: 'pe123456_account_login'
                )
                    ->withEmail('mark.s@lumon.industries')
                    ->withObjectID('089274502')
                    ->withOccurredAt(new \DateTimeImmutable('2019-12-27T18:11:19.117Z'))
                    ->withProperties(
                        [
                            '0' => '{',
                            '1' => '"',
                            '2' => 'h',
                            '3' => 's',
                            '4' => '_',
                            '5' => 'p',
                            '6' => 'a',
                            '7' => 'g',
                            '8' => 'e',
                            '9' => '_',
                            '10' => 'i',
                            '11' => 'd',
                            '12' => '"',
                            '13' => ':',
                            '14' => '"',
                            '15' => '1',
                            '16' => '2',
                            '17' => '3',
                            '18' => '4',
                            '19' => '5',
                            '20' => '6',
                            '21' => '7',
                            '22' => '8',
                            '23' => '9',
                            '24' => '0',
                            '25' => '"',
                            '26' => ',',
                            '27' => '"',
                            '28' => 'h',
                            '29' => 's',
                            '30' => '_',
                            '31' => 'e',
                            '32' => 'l',
                            '33' => 'e',
                            '34' => 'm',
                            '35' => 'e',
                            '36' => 'n',
                            '37' => 't',
                            '38' => '_',
                            '39' => 'i',
                            '40' => 'd',
                            '41' => '"',
                            '42' => ':',
                            '43' => '"',
                            '44' => 'l',
                            '45' => 'o',
                            '46' => 'g',
                            '47' => 'i',
                            '48' => 'n',
                            '49' => '-',
                            '50' => 'b',
                            '51' => 'u',
                            '52' => 't',
                            '53' => 't',
                            '54' => 'o',
                            '55' => 'n',
                            '56' => '"',
                            '57' => ',',
                            '58' => '"',
                            '59' => 'h',
                            '60' => 's',
                            '61' => '_',
                            '62' => 'p',
                            '63' => 'a',
                            '64' => 'g',
                            '65' => 'e',
                            '66' => '_',
                            '67' => 't',
                            '68' => 'i',
                            '69' => 't',
                            '70' => 'l',
                            '71' => 'e',
                            '72' => '"',
                            '73' => ':',
                            '74' => '"',
                            '75' => 'h',
                            '76' => 'o',
                            '77' => 'm',
                            '78' => 'e',
                            '79' => 'p',
                            '80' => 'a',
                            '81' => 'g',
                            '82' => 'e',
                            '83' => '"',
                            '84' => '}',
                        ],
                    )
                    ->withUtk('utk')
                    ->withUuid('uuid'),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
