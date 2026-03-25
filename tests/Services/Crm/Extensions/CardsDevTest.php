<?php

namespace Tests\Services\Crm\Extensions;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Extensions\CardsDev\CardMigrateViewsResponse;
use HubspotSDK\Crm\Extensions\CardsDev\IntegratorCardPayloadResponse;
use HubspotSDK\Crm\Extensions\CardsDev\PublicCardListResponse;
use HubspotSDK\Crm\Extensions\CardsDev\PublicCardResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class CardsDevTest extends TestCase
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

        $result = $this->client->crm->extensions->cardsDev->create(
            0,
            actions: ['baseURLs' => ['string']],
            display: [
                'properties' => [
                    [
                        'dataType' => 'BOOLEAN',
                        'label' => 'label',
                        'name' => 'name',
                        'options' => [
                            ['label' => 'label', 'name' => 'name', 'type' => 'DANGER'],
                        ],
                    ],
                ],
            ],
            fetch: [
                'cardType' => 'EXTERNAL',
                'objectTypes' => [
                    ['name' => 'companies', 'propertiesToSend' => ['string']],
                ],
                'targetURL' => 'targetUrl',
            ],
            title: 'title',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicCardResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->extensions->cardsDev->create(
            0,
            actions: ['baseURLs' => ['string']],
            display: [
                'properties' => [
                    [
                        'dataType' => 'BOOLEAN',
                        'label' => 'label',
                        'name' => 'name',
                        'options' => [
                            ['label' => 'label', 'name' => 'name', 'type' => 'DANGER'],
                        ],
                    ],
                ],
            ],
            fetch: [
                'cardType' => 'EXTERNAL',
                'objectTypes' => [
                    ['name' => 'companies', 'propertiesToSend' => ['string']],
                ],
                'targetURL' => 'targetUrl',
                'serverlessFunction' => 'serverlessFunction',
            ],
            title: 'title',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicCardResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->extensions->cardsDev->update(
            'cardId',
            appID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicCardResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->extensions->cardsDev->update(
            'cardId',
            appID: 0,
            actions: ['baseURLs' => ['string']],
            display: [
                'properties' => [
                    [
                        'dataType' => 'BOOLEAN',
                        'label' => 'label',
                        'name' => 'name',
                        'options' => [
                            ['label' => 'label', 'name' => 'name', 'type' => 'DANGER'],
                        ],
                    ],
                ],
            ],
            fetch: [
                'objectTypes' => [
                    ['name' => 'companies', 'propertiesToSend' => ['string']],
                ],
                'cardType' => 'EXTERNAL',
                'serverlessFunction' => 'serverlessFunction',
                'targetURL' => 'targetUrl',
            ],
            title: 'title',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicCardResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->extensions->cardsDev->delete(
            'cardId',
            appID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->extensions->cardsDev->delete(
            'cardId',
            appID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->extensions->cardsDev->get(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicCardListResponse::class, $result);
    }

    #[Test]
    public function testGetByID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->extensions->cardsDev->getByID(
            'cardId',
            appID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicCardResponse::class, $result);
    }

    #[Test]
    public function testGetByIDWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->extensions->cardsDev->getByID(
            'cardId',
            appID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicCardResponse::class, $result);
    }

    #[Test]
    public function testGetSampleResponse(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->extensions->cardsDev->getSampleResponse();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(IntegratorCardPayloadResponse::class, $result);
    }

    #[Test]
    public function testMigrateViews(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->extensions->cardsDev->migrateViews(
            0,
            appCardID: 0,
            legacyCrmCardID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CardMigrateViewsResponse::class, $result);
    }

    #[Test]
    public function testMigrateViewsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->extensions->cardsDev->migrateViews(
            0,
            appCardID: 0,
            legacyCrmCardID: 0,
            helpdeskAppCardID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CardMigrateViewsResponse::class, $result);
    }
}
