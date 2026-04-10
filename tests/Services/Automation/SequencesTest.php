<?php

namespace Tests\Services\Automation;

use HubSpotSDK\Automation\Sequences\PublicSequenceEnrollmentLiteResponse;
use HubSpotSDK\Automation\Sequences\PublicSequenceEnrollmentResponse;
use HubSpotSDK\Automation\Sequences\PublicSequenceLiteResponse;
use HubSpotSDK\Automation\Sequences\PublicSequenceResponse;
use HubSpotSDK\Client;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Page;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class SequencesTest extends TestCase
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
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->automation->sequences->list(userID: 'userId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(PublicSequenceLiteResponse::class, $item);
        }
    }

    #[Test]
    public function testListWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->automation->sequences->list(
            userID: 'userId',
            after: 'after',
            limit: 0,
            name: 'name'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(PublicSequenceLiteResponse::class, $item);
        }
    }

    #[Test]
    public function testCreateEnrollment(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->sequences->createEnrollment(
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
    public function testCreateEnrollmentWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->sequences->createEnrollment(
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
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->sequences->get(
            'sequenceId',
            userID: 'userId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicSequenceResponse::class, $result);
    }

    #[Test]
    public function testGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->sequences->get(
            'sequenceId',
            userID: 'userId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicSequenceResponse::class, $result);
    }

    #[Test]
    public function testGetEnrollmentByContactID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->sequences->getEnrollmentByContactID(
            'contactId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicSequenceEnrollmentResponse::class, $result);
    }
}
