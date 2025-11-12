<?php

namespace Tests\Services\Marketing\Events;

use HubspotSDK\Client;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class AttendanceTest extends TestCase
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
    public function testCreateByEventIDAndContactID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->events
            ->attendance
            ->createByEventIDAndContactID(
                'subscriberState',
                ['objectId' => 'objectId', 'inputs' => [['interactionDateTime' => 0]]],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateByEventIDAndContactIDWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->events
            ->attendance
            ->createByEventIDAndContactID(
                'subscriberState',
                [
                    'objectId' => 'objectId',
                    'inputs' => [
                        [
                            'interactionDateTime' => 0,
                            'properties' => ['foo' => 'string'],
                            'vid' => 0,
                        ],
                    ],
                ],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateByEventIDAndEmail(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->events
            ->attendance
            ->createByEventIDAndEmail(
                'subscriberState',
                [
                    'objectId' => 'objectId',
                    'inputs' => [['email' => 'email', 'interactionDateTime' => 0]],
                ],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateByEventIDAndEmailWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->events
            ->attendance
            ->createByEventIDAndEmail(
                'subscriberState',
                [
                    'objectId' => 'objectId',
                    'inputs' => [
                        [
                            'email' => 'email',
                            'interactionDateTime' => 0,
                            'contactProperties' => ['foo' => 'string'],
                            'properties' => ['foo' => 'string'],
                        ],
                    ],
                ],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateByExternalEventIDAndContactID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->events
            ->attendance
            ->createByExternalEventIDAndContactID(
                'subscriberState',
                [
                    'externalEventId' => 'externalEventId',
                    'inputs' => [['interactionDateTime' => 0]],
                ],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateByExternalEventIDAndContactIDWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->events
            ->attendance
            ->createByExternalEventIDAndContactID(
                'subscriberState',
                [
                    'externalEventId' => 'externalEventId',
                    'inputs' => [
                        [
                            'interactionDateTime' => 0,
                            'properties' => ['foo' => 'string'],
                            'vid' => 0,
                        ],
                    ],
                ],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateByExternalEventIDAndEmail(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->events
            ->attendance
            ->createByExternalEventIDAndEmail(
                'subscriberState',
                [
                    'externalEventId' => 'externalEventId',
                    'inputs' => [['email' => 'email', 'interactionDateTime' => 0]],
                ],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateByExternalEventIDAndEmailWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->events
            ->attendance
            ->createByExternalEventIDAndEmail(
                'subscriberState',
                [
                    'externalEventId' => 'externalEventId',
                    'inputs' => [
                        [
                            'email' => 'email',
                            'interactionDateTime' => 0,
                            'contactProperties' => ['foo' => 'string'],
                            'properties' => ['foo' => 'string'],
                        ],
                    ],
                ],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
