<?php

namespace Tests\Services\Crm\ObjectSchemas;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\ObjectSchemas\CollectionResponseObjectSchemaNoPaging;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class BatchTest extends TestCase
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
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->objectSchemas->batch->get(
            includeAssociationDefinitions: true,
            includeAuditMetadata: true,
            includePropertyDefinitions: true,
            inputs: ['string'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponseObjectSchemaNoPaging::class,
            $result
        );
    }

    #[Test]
    public function testGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->objectSchemas->batch->get(
            includeAssociationDefinitions: true,
            includeAuditMetadata: true,
            includePropertyDefinitions: true,
            inputs: ['string'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponseObjectSchemaNoPaging::class,
            $result
        );
    }
}
