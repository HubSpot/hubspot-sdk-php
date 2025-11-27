<?php

namespace Tests\Services\Crm\Extensions;

use HubspotSDK\Client;
use HubspotSDK\Crm\Extensions\Cards\IntegratorCardPayloadResponse;
use HubspotSDK\Crm\Extensions\Cards\PublicCardListResponse;
use HubspotSDK\Crm\Extensions\Cards\PublicCardResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class CardsTest extends TestCase
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
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->extensions->cards->create(
            0,
            [
                'actions' => ['baseUrls' => ['https://www.example.com/hubspot']],
                'display' => [
                    'properties' => [
                        [
                            'dataType' => 'STRING',
                            'label' => 'Pets Name',
                            'name' => 'pet_name',
                            'options' => [
                                ['label' => 'label', 'name' => 'name', 'type' => 'DANGER'],
                            ],
                        ],
                    ],
                ],
                'fetch' => [
                    'objectTypes' => [
                        ['name' => 'contacts', 'propertiesToSend' => ['email', 'firstname']],
                    ],
                    'targetUrl' => 'https://www.example.com/hubspot/target',
                ],
                'title' => 'PetSpot',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicCardResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->extensions->cards->create(
            0,
            [
                'actions' => ['baseUrls' => ['https://www.example.com/hubspot']],
                'display' => [
                    'properties' => [
                        [
                            'dataType' => 'STRING',
                            'label' => 'Pets Name',
                            'name' => 'pet_name',
                            'options' => [
                                ['label' => 'label', 'name' => 'name', 'type' => 'DANGER'],
                            ],
                        ],
                    ],
                ],
                'fetch' => [
                    'objectTypes' => [
                        ['name' => 'contacts', 'propertiesToSend' => ['email', 'firstname']],
                    ],
                    'targetUrl' => 'https://www.example.com/hubspot/target',
                    'cardType' => 'EXTERNAL',
                    'serverlessFunction' => 'serverlessFunction',
                ],
                'title' => 'PetSpot',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicCardResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->extensions->cards->update(
            'cardId',
            ['appId' => 0]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicCardResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->extensions->cards->update(
            'cardId',
            [
                'appId' => 0,
                'actions' => ['baseUrls' => ['https://www.example.com/hubspot']],
                'display' => [
                    'properties' => [
                        [
                            'dataType' => 'STRING',
                            'label' => 'Pets Name',
                            'name' => 'pet_name',
                            'options' => [
                                ['label' => 'label', 'name' => 'name', 'type' => 'DANGER'],
                            ],
                        ],
                    ],
                ],
                'fetch' => [
                    'objectTypes' => [
                        ['name' => 'contacts', 'propertiesToSend' => ['email', 'firstname']],
                    ],
                    'cardType' => 'EXTERNAL',
                    'serverlessFunction' => 'serverlessFunction',
                    'targetUrl' => 'https://www.example.com/hubspot/target',
                ],
                'title' => 'PetSpot',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicCardResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->extensions->cards->list(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicCardListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->extensions->cards->delete(
            'cardId',
            ['appId' => 0]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->extensions->cards->delete(
            'cardId',
            ['appId' => 0]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->extensions->cards->get(
            'cardId',
            ['appId' => 0]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicCardResponse::class, $result);
    }

    #[Test]
    public function testGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->extensions->cards->get(
            'cardId',
            ['appId' => 0]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicCardResponse::class, $result);
    }

    #[Test]
    public function testGetSampleResponse(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->extensions->cards->getSampleResponse();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(IntegratorCardPayloadResponse::class, $result);
    }
}
