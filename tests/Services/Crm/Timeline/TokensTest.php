<?php

namespace Tests\Services\Crm\Timeline;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Timeline\TimelineEventTemplateToken;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class TokensTest extends TestCase
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
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->timeline->tokens->create(
            'eventTemplateId',
            appID: 0,
            label: 'Pet Type',
            name: 'petType',
            type: 'enumeration',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TimelineEventTemplateToken::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->timeline->tokens->create(
            'eventTemplateId',
            appID: 0,
            label: 'Pet Type',
            name: 'petType',
            type: 'enumeration',
            createdAt: new \DateTimeImmutable('2020-02-12T20:58:26Z'),
            objectPropertyName: 'customPropertyPetType',
            options: [
                ['label' => 'Dog', 'value' => 'dog'],
                ['label' => 'Cat', 'value' => 'cat'],
            ],
            updatedAt: new \DateTimeImmutable('2020-02-12T20:58:26Z'),
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TimelineEventTemplateToken::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->timeline->tokens->update(
            'tokenName',
            appID: 0,
            eventTemplateID: 'eventTemplateId',
            label: 'petType edit',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TimelineEventTemplateToken::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->timeline->tokens->update(
            'tokenName',
            appID: 0,
            eventTemplateID: 'eventTemplateId',
            label: 'petType edit',
            objectPropertyName: 'objectPropertyName',
            options: [
                ['label' => 'Dog', 'value' => 'dog'],
                ['label' => 'Cat', 'value' => 'cat'],
                ['label' => 'Bird', 'value' => 'bird'],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TimelineEventTemplateToken::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->timeline->tokens->delete(
            'tokenName',
            appID: 0,
            eventTemplateID: 'eventTemplateId'
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

        $result = $this->client->crm->timeline->tokens->delete(
            'tokenName',
            appID: 0,
            eventTemplateID: 'eventTemplateId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
