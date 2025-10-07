<?php

namespace Tests\Services\CRM\Associations;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Client;
use HubspotSDK\CRM\Associations\V4\AssociationSpec1;
use HubspotSDK\CRM\Associations\V4\PublicAssociationMultiPost;
use HubspotSDK\PublicObjectID;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class V4Test extends TestCase
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

        $result = $this->client->crm->associations->v4->create(
            'toObjectId',
            objectType: 'objectType',
            objectID: 'objectId',
            toObjectType: 'toObjectType',
            body: [
                AssociationSpec1::with(
                    associationCategory: 'HUBSPOT_DEFINED',
                    associationTypeID: 0
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

        $result = $this->client->crm->associations->v4->create(
            'toObjectId',
            objectType: 'objectType',
            objectID: 'objectId',
            toObjectType: 'toObjectType',
            body: [
                AssociationSpec1::with(
                    associationCategory: 'HUBSPOT_DEFINED',
                    associationTypeID: 0
                ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->list(
            'toObjectType',
            objectType: 'objectType',
            objectID: 'objectId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testListWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->list(
            'toObjectType',
            objectType: 'objectType',
            objectID: 'objectId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->delete(
            'toObjectId',
            objectType: 'objectType',
            objectID: 'objectId',
            toObjectType: 'toObjectType',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->delete(
            'toObjectId',
            objectType: 'objectType',
            objectID: 'objectId',
            toObjectType: 'toObjectType',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testArchiveLabels(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->archiveLabels(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [
                PublicAssociationMultiPost::with(
                    from: PublicObjectID::with(id: 'id'),
                    to: PublicObjectID::with(id: 'id'),
                    types: [
                        AssociationSpec::with(
                            associationCategory: 'HUBSPOT_DEFINED',
                            associationTypeID: 0
                        ),
                    ],
                ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testArchiveLabelsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->archiveLabels(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [
                PublicAssociationMultiPost::with(
                    from: PublicObjectID::with(id: 'id'),
                    to: PublicObjectID::with(id: 'id'),
                    types: [
                        AssociationSpec::with(
                            associationCategory: 'HUBSPOT_DEFINED',
                            associationTypeID: 0
                        ),
                    ],
                ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateDefault(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->createDefault(
            'toObjectId',
            fromObjectType: 'fromObjectType',
            fromObjectID: 'fromObjectId',
            toObjectType: 'toObjectType',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateDefaultWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->createDefault(
            'toObjectId',
            fromObjectType: 'fromObjectType',
            fromObjectID: 'fromObjectId',
            toObjectType: 'toObjectType',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRequest(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->request(0);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
