<?php

namespace Tests\Services\Crm\ObjectLibrary;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\ObjectLibrary\ObjectTypeEnablementPublicResponse;
use HubspotSDK\Crm\ObjectLibrary\PortalObjectTypeEnablementPublicResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class EnablementTest extends TestCase
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
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objectLibrary->enablement->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            PortalObjectTypeEnablementPublicResponse::class,
            $result
        );
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objectLibrary->enablement->get(
            'objectTypeId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ObjectTypeEnablementPublicResponse::class, $result);
    }
}
