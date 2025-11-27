<?php

namespace Tests\Services\Crm\Extensions\VideoConferencing;

use HubspotSDK\Client;
use HubspotSDK\Crm\Extensions\VideoConferencing\ExternalSettings;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class SettingsTest extends TestCase
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
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->extensions
            ->videoConferencing
            ->settings
            ->update(0, ['createMeetingUrl' => 'https://example.com/create-meeting'])
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExternalSettings::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->extensions
            ->videoConferencing
            ->settings
            ->update(
                0,
                [
                    'createMeetingUrl' => 'https://example.com/create-meeting',
                    'deleteMeetingUrl' => 'https://example.com/delete-meeting',
                    'fetchAccountsUri' => 'fetchAccountsUri',
                    'updateMeetingUrl' => 'https://example.com/update-meeting',
                    'userVerifyUrl' => 'https://example.com/user-verify',
                ],
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExternalSettings::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->extensions
            ->videoConferencing
            ->settings
            ->delete(0)
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->extensions->videoConferencing->settings->get(
            0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExternalSettings::class, $result);
    }
}
