<?php

namespace Tests\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Associations\ReportCreationResponse;
use HubspotSDK\Crm\LabelsBetweenObjectPair;
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

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(
            accessToken: 'pat-na1-xxxxxxxx-xxxx',
            baseUrl: $testUrl,
        );

        $this->client = $client;
    }

    #[Test]
    public function testDeleteAssociations(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associations->deleteAssociations(
            'toObjectId',
            objectType: 'objectType',
            objectID: 'objectId',
            toObjectType: 'toObjectType',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteAssociationsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associations->deleteAssociations(
            'toObjectId',
            objectType: 'objectType',
            objectID: 'objectId',
            toObjectType: 'toObjectType',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testRequestHighUsageReport(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associations->requestHighUsageReport(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ReportCreationResponse::class, $result);
    }

    #[Test]
    public function testUpdateAssociationLabels(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associations->updateAssociationLabels(
            'toObjectId',
            objectType: 'objectType',
            objectID: 'objectId',
            toObjectType: 'toObjectType',
            body: [
                ['associationCategory' => 'HUBSPOT_DEFINED', 'associationTypeID' => 0],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(LabelsBetweenObjectPair::class, $result);
    }

    #[Test]
    public function testUpdateAssociationLabelsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associations->updateAssociationLabels(
            'toObjectId',
            objectType: 'objectType',
            objectID: 'objectId',
            toObjectType: 'toObjectType',
            body: [
                ['associationCategory' => 'HUBSPOT_DEFINED', 'associationTypeID' => 0],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(LabelsBetweenObjectPair::class, $result);
    }
}
