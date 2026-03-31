<?php

namespace Tests\Services;

use HubspotSDK\Client;
use HubspotSDK\CommunicationPreferences\ActionResponseWithResultsPublicStatus;
use HubspotSDK\CommunicationPreferences\ActionResponseWithResultsPublicWideStatus;
use HubspotSDK\CommunicationPreferences\LinkGenerationResponse;
use HubspotSDK\Core\Util;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class CommunicationPreferencesTest extends TestCase
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
    public function testGenerateLinks(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->communicationPreferences->generateLinks(
            channel: 'EMAIL',
            subscriberIDString: 'subscriberIdString'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(LinkGenerationResponse::class, $result);
    }

    #[Test]
    public function testGenerateLinksWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->communicationPreferences->generateLinks(
            channel: 'EMAIL',
            subscriberIDString: 'subscriberIdString',
            businessUnitID: 0,
            language: 'language',
            subscriptionID: 0,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(LinkGenerationResponse::class, $result);
    }

    #[Test]
    public function testGetStatuses(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->communicationPreferences->getStatuses(
            'subscriberIdString',
            channel: 'EMAIL'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ActionResponseWithResultsPublicStatus::class,
            $result
        );
    }

    #[Test]
    public function testGetStatusesWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->communicationPreferences->getStatuses(
            'subscriberIdString',
            channel: 'EMAIL',
            businessUnitID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ActionResponseWithResultsPublicStatus::class,
            $result
        );
    }

    #[Test]
    public function testGetUnsubscribeAllStatus(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->communicationPreferences->getUnsubscribeAllStatus(
            'subscriberIdString',
            channel: 'EMAIL'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ActionResponseWithResultsPublicWideStatus::class,
            $result
        );
    }

    #[Test]
    public function testGetUnsubscribeAllStatusWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->communicationPreferences->getUnsubscribeAllStatus(
            'subscriberIdString',
            channel: 'EMAIL',
            businessUnitID: 0,
            verbose: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ActionResponseWithResultsPublicWideStatus::class,
            $result
        );
    }

    #[Test]
    public function testUnsubscribeAll(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->communicationPreferences->unsubscribeAll(
            'subscriberIdString',
            channel: 'EMAIL'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ActionResponseWithResultsPublicStatus::class,
            $result
        );
    }

    #[Test]
    public function testUnsubscribeAllWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->communicationPreferences->unsubscribeAll(
            'subscriberIdString',
            channel: 'EMAIL',
            businessUnitID: 0,
            verbose: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ActionResponseWithResultsPublicStatus::class,
            $result
        );
    }

    #[Test]
    public function testUpdateStatus(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->communicationPreferences->updateStatus(
            'subscriberIdString',
            channel: 'EMAIL',
            statusState: 'NOT_SPECIFIED',
            subscriptionID: 0,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ActionResponseWithResultsPublicStatus::class,
            $result
        );
    }

    #[Test]
    public function testUpdateStatusWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->communicationPreferences->updateStatus(
            'subscriberIdString',
            channel: 'EMAIL',
            statusState: 'NOT_SPECIFIED',
            subscriptionID: 0,
            legalBasis: 'CONSENT_WITH_NOTICE',
            legalBasisExplanation: 'legalBasisExplanation',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ActionResponseWithResultsPublicStatus::class,
            $result
        );
    }
}
