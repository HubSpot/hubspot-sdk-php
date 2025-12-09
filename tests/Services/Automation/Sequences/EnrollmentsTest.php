<?php

namespace Tests\Services\Automation\Sequences;

use HubspotSDK\Automation\Sequences\PublicSequenceEnrollmentLiteResponse;
use HubspotSDK\Automation\Sequences\PublicSequenceEnrollmentResponse;
use HubspotSDK\Client;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class EnrollmentsTest extends TestCase
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
    public function testEnroll(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->sequences->enrollments->enroll(
            userID: 'userId',
            contactID: 'contactId',
            senderEmail: 'senderEmail',
            sequenceID: 'sequenceId',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            PublicSequenceEnrollmentLiteResponse::class,
            $result
        );
    }

    #[Test]
    public function testEnrollWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->sequences->enrollments->enroll(
            userID: 'userId',
            contactID: 'contactId',
            senderEmail: 'senderEmail',
            sequenceID: 'sequenceId',
            senderAliasAddress: 'senderAliasAddress',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            PublicSequenceEnrollmentLiteResponse::class,
            $result
        );
    }

    #[Test]
    public function testGetByContactID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->sequences->enrollments->getByContactID(
            'contactId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicSequenceEnrollmentResponse::class, $result);
    }
}
