<?php

namespace Tests\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Crm\Limits\AssociationRecordLimitResponse;
use HubspotSDK\Crm\Limits\CalculatedPropertyLimitResponse;
use HubspotSDK\Crm\Limits\CollectionResponseAssociationLabelLimitResponseNoPaging;
use HubspotSDK\Crm\Limits\CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging;
use HubspotSDK\Crm\Limits\CustomObjectLimitResponse;
use HubspotSDK\Crm\Limits\CustomPropertyLimitResponse;
use HubspotSDK\Crm\Limits\PipelineLimitResponse;
use HubspotSDK\Crm\Limits\RecordLimitResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class LimitsTest extends TestCase
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
    public function testGetAssociationLabelLimits(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->limits->getAssociationLabelLimits([]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponseAssociationLabelLimitResponseNoPaging::class,
            $result
        );
    }

    #[Test]
    public function testGetAssociationRecordsLimitsByObjectType(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->limits
            ->getAssociationRecordsLimitsByObjectType(
                'toObjectTypeId',
                ['fromObjectTypeID' => 'fromObjectTypeId']
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AssociationRecordLimitResponse::class, $result);
    }

    #[Test]
    public function testGetAssociationRecordsLimitsByObjectTypeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->limits
            ->getAssociationRecordsLimitsByObjectType(
                'toObjectTypeId',
                ['fromObjectTypeID' => 'fromObjectTypeId']
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AssociationRecordLimitResponse::class, $result);
    }

    #[Test]
    public function testGetAssociationRecordsLimitsFromObjects(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->limits
            ->getAssociationRecordsLimitsFromObjects()
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging::class,
            $result,
        );
    }

    #[Test]
    public function testGetAssociationRecordsLimitsToObjects(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->limits->getAssociationRecordsLimitsToObjects(
            'fromObjectTypeId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging::class,
            $result,
        );
    }

    #[Test]
    public function testGetCalculatedPropertyLimits(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->limits->getCalculatedPropertyLimits();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CalculatedPropertyLimitResponse::class, $result);
    }

    #[Test]
    public function testGetCustomObjectTypeLimits(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->limits->getCustomObjectTypeLimits();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CustomObjectLimitResponse::class, $result);
    }

    #[Test]
    public function testGetCustomPropertyLimits(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->limits->getCustomPropertyLimits();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CustomPropertyLimitResponse::class, $result);
    }

    #[Test]
    public function testGetPipelineLimits(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->limits->getPipelineLimits();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PipelineLimitResponse::class, $result);
    }

    #[Test]
    public function testGetRecordLimits(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->limits->getRecordLimits();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(RecordLimitResponse::class, $result);
    }
}
