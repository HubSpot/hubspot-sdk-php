<?php

namespace Tests\Services\Crm\Associations\V4;

use HubspotSDK\Client;
use HubspotSDK\Crm\Associations\V4\AssociationSpec1;
use HubspotSDK\Crm\Associations\V4\PublicAssociationMultiArchive;
use HubspotSDK\Crm\Associations\V4\PublicAssociationMultiPost;
use HubspotSDK\Crm\Associations\V4\PublicDefaultAssociationMultiPost;
use HubspotSDK\Crm\Associations\V4\PublicFetchAssociationsBatchRequest;
use HubspotSDK\PublicObjectID;
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

        $result = $this->client->crm->associations->v4->batch->create(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [
                PublicAssociationMultiPost::with(
                    from: PublicObjectID::with(id: '37295'),
                    to: PublicObjectID::with(id: '37295'),
                    types: [
                        AssociationSpec1::with(
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
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->batch->create(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [
                PublicAssociationMultiPost::with(
                    from: PublicObjectID::with(id: '37295'),
                    to: PublicObjectID::with(id: '37295'),
                    types: [
                        AssociationSpec1::with(
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
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->batch->delete(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [
                PublicAssociationMultiArchive::with(
                    from: PublicObjectID::with(id: '37295'),
                    to: [PublicObjectID::with(id: '37295')],
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

        $result = $this->client->crm->associations->v4->batch->delete(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [
                PublicAssociationMultiArchive::with(
                    from: PublicObjectID::with(id: '37295'),
                    to: [PublicObjectID::with(id: '37295')],
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

        $result = $this->client->crm->associations->v4->batch->createDefault(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [
                PublicDefaultAssociationMultiPost::with(
                    from: PublicObjectID::with(id: '37295'),
                    to: PublicObjectID::with(id: '37295'),
                ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateDefaultWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->batch->createDefault(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [
                PublicDefaultAssociationMultiPost::with(
                    from: PublicObjectID::with(id: '37295'),
                    to: PublicObjectID::with(id: '37295'),
                ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteLabels(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->batch->deleteLabels(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [
                PublicAssociationMultiPost::with(
                    from: PublicObjectID::with(id: '37295'),
                    to: PublicObjectID::with(id: '37295'),
                    types: [
                        AssociationSpec1::with(
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
    public function testDeleteLabelsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->batch->deleteLabels(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [
                PublicAssociationMultiPost::with(
                    from: PublicObjectID::with(id: '37295'),
                    to: PublicObjectID::with(id: '37295'),
                    types: [
                        AssociationSpec1::with(
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
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->batch->get(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [PublicFetchAssociationsBatchRequest::with(id: 'id')],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->batch->get(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [
                PublicFetchAssociationsBatchRequest::with(id: 'id')->withAfter('after'),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
