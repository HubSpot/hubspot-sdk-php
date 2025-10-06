<?php

namespace Tests\Services\CRM;

use HubspotSDK\Client;
use HubspotSDK\CRM\Associations\PublicAssociation;
use HubspotSDK\CRM\PublicObjectID;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class AssociationsTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(
            STAINLESS_FIXME_accessToken: 'pat-na1-xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx',
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

        $result = $this->client->crm->associations->create(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [
                PublicAssociation::with(
                    from: PublicObjectID::with(id: 'id'),
                    to: PublicObjectID::with(id: 'id'),
                    type: 'type',
                ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->create(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [
                PublicAssociation::with(
                    from: PublicObjectID::with(id: 'id'),
                    to: PublicObjectID::with(id: 'id'),
                    type: 'type',
                ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->delete(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [
                PublicAssociation::with(
                    from: PublicObjectID::with(id: 'id'),
                    to: PublicObjectID::with(id: 'id'),
                    type: 'type',
                ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->delete(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [
                PublicAssociation::with(
                    from: PublicObjectID::with(id: 'id'),
                    to: PublicObjectID::with(id: 'id'),
                    type: 'type',
                ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRead(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->read(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [PublicObjectID::with(id: 'id')],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testReadWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->read(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [PublicObjectID::with(id: 'id')],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
