<?php

namespace Tests\Services\CRM\Associations\V4;

use HubspotSDK\Client;
use HubspotSDK\CRM\Associations\V4\AssociationSpec1;
use HubspotSDK\CRM\Associations\V4\PublicAssociationMultiArchive;
use HubspotSDK\CRM\Associations\V4\PublicAssociationMultiPost;
use HubspotSDK\CRM\Associations\V4\PublicDefaultAssociationMultiPost;
use HubspotSDK\CRM\Associations\V4\PublicFetchAssociationsBatchRequest;
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
            accessToken: 'pat-na1-xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx',
            baseUrl: $testUrl,
        );

        $this->client = $client;
    }

    #[Test]
    public function testBatchAssociateDefault(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->associations
            ->v4
            ->batch
            ->batchAssociateDefault(
                'toObjectType',
                fromObjectType: 'fromObjectType',
                inputs: [
                    PublicDefaultAssociationMultiPost::with(
                        from: PublicObjectID::with(id: '37295'),
                        to: PublicObjectID::with(id: '37295'),
                    ),
                ],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBatchAssociateDefaultWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->associations
            ->v4
            ->batch
            ->batchAssociateDefault(
                'toObjectType',
                fromObjectType: 'fromObjectType',
                inputs: [
                    PublicDefaultAssociationMultiPost::with(
                        from: PublicObjectID::with(id: '37295'),
                        to: PublicObjectID::with(id: '37295'),
                    ),
                ],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBatchCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->batch->batchCreate(
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
    public function testBatchCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->batch->batchCreate(
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
    public function testBatchDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->batch->batchDelete(
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
    public function testBatchDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->batch->batchDelete(
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
    public function testBatchDeleteLabels(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->batch->batchDeleteLabels(
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
    public function testBatchDeleteLabelsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->batch->batchDeleteLabels(
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
    public function testBatchRead(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->batch->batchRead(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [PublicFetchAssociationsBatchRequest::with(id: 'id')],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBatchReadWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->batch->batchRead(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [
                PublicFetchAssociationsBatchRequest::with(id: 'id')->withAfter('after'),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
