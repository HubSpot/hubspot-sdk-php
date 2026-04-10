<?php

namespace Tests\Services\Crm;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Crm\Limits\AssociationRecordLimitResponse;
use HubSpotSDK\Crm\Limits\CalculatedPropertyLimitResponse;
use HubSpotSDK\Crm\Limits\CollectionResponseAssociationLabelLimitResponseNoPaging;
use HubSpotSDK\Crm\Limits\CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging;
use HubSpotSDK\Crm\Limits\CustomObjectLimitResponse;
use HubSpotSDK\Crm\Limits\CustomPropertyLimitResponse;
use HubSpotSDK\Crm\Limits\PipelineLimitResponse;
use HubSpotSDK\Crm\Limits\RecordLimitResponse;
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

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(accessToken: 'My Access Token', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testGetAssociationLabelLimits(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->limits->getAssociationLabelLimits();

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
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->limits
            ->getAssociationRecordsLimitsByObjectType(
                'toObjectTypeId',
                fromObjectTypeID: 'fromObjectTypeId'
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AssociationRecordLimitResponse::class, $result);
    }

    #[Test]
    public function testGetAssociationRecordsLimitsByObjectTypeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->limits
            ->getAssociationRecordsLimitsByObjectType(
                'toObjectTypeId',
                fromObjectTypeID: 'fromObjectTypeId'
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AssociationRecordLimitResponse::class, $result);
    }

    #[Test]
    public function testGetAssociationRecordsLimitsFromObjects(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
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
            $this->markTestSkipped('Mock server tests are disabled');
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
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->limits->getCalculatedPropertyLimits();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CalculatedPropertyLimitResponse::class, $result);
    }

    #[Test]
    public function testGetCustomObjectTypeLimits(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->limits->getCustomObjectTypeLimits();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CustomObjectLimitResponse::class, $result);
    }

    #[Test]
    public function testGetCustomPropertyLimits(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->limits->getCustomPropertyLimits();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CustomPropertyLimitResponse::class, $result);
    }

    #[Test]
    public function testGetPipelineLimits(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->limits->getPipelineLimits();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PipelineLimitResponse::class, $result);
    }

    #[Test]
    public function testGetRecordLimits(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->limits->getRecordLimits();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(RecordLimitResponse::class, $result);
    }
}
