<?php

namespace Tests\Services\Crm;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Crm\PropertiesValidations\CollectionResponsePublicPropertyValidationRuleMapNoPaging;
use HubSpotSDK\Crm\PropertiesValidations\CollectionResponsePublicPropertyValidationRuleNoPaging;
use HubSpotSDK\Crm\PropertiesValidations\PublicPropertyValidationRule;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class PropertiesValidationsTest extends TestCase
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
    public function testGetByObjectTypeID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->propertiesValidations->getByObjectTypeID(
            'objectTypeId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponsePublicPropertyValidationRuleMapNoPaging::class,
            $result
        );
    }

    #[Test]
    public function testGetByObjectTypeIDAndPropertyName(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->propertiesValidations
            ->getByObjectTypeIDAndPropertyName(
                'propertyName',
                objectTypeID: 'objectTypeId'
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponsePublicPropertyValidationRuleNoPaging::class,
            $result
        );
    }

    #[Test]
    public function testGetByObjectTypeIDAndPropertyNameWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->propertiesValidations
            ->getByObjectTypeIDAndPropertyName(
                'propertyName',
                objectTypeID: 'objectTypeId'
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponsePublicPropertyValidationRuleNoPaging::class,
            $result
        );
    }

    #[Test]
    public function testGetByObjectTypeIDPropertyNameAndRuleType(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->propertiesValidations
            ->getByObjectTypeIDPropertyNameAndRuleType(
                'AFTER_DATETIME_DURATION',
                objectTypeID: 'objectTypeId',
                propertyName: 'propertyName',
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicPropertyValidationRule::class, $result);
    }

    #[Test]
    public function testGetByObjectTypeIDPropertyNameAndRuleTypeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->propertiesValidations
            ->getByObjectTypeIDPropertyNameAndRuleType(
                'AFTER_DATETIME_DURATION',
                objectTypeID: 'objectTypeId',
                propertyName: 'propertyName',
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicPropertyValidationRule::class, $result);
    }

    #[Test]
    public function testUpdateByObjectTypeIDPropertyNameAndRuleType(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->propertiesValidations
            ->updateByObjectTypeIDPropertyNameAndRuleType(
                'AFTER_DATETIME_DURATION',
                objectTypeID: 'objectTypeId',
                propertyName: 'propertyName',
                ruleArguments: ['string'],
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testUpdateByObjectTypeIDPropertyNameAndRuleTypeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->propertiesValidations
            ->updateByObjectTypeIDPropertyNameAndRuleType(
                'AFTER_DATETIME_DURATION',
                objectTypeID: 'objectTypeId',
                propertyName: 'propertyName',
                ruleArguments: ['string'],
                shouldApplyNormalization: true,
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
