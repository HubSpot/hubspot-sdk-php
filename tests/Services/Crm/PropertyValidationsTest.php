<?php

namespace Tests\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Crm\PropertyValidations\CollectionResponsePublicPropertyValidationRuleMapNoPaging;
use HubspotSDK\Crm\PropertyValidations\CollectionResponsePublicPropertyValidationRuleNoPaging;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class PropertyValidationsTest extends TestCase
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
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->propertyValidations->list('objectTypeId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponsePublicPropertyValidationRuleMapNoPaging::class,
            $result
        );
    }

    #[Test]
    public function testCrmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleType(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->propertyValidations
            ->crmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleType(
                'AFTER_DATETIME_DURATION',
                [
                    'objectTypeID' => 'objectTypeId',
                    'propertyName' => 'propertyName',
                    'ruleArguments' => ['string'],
                ],
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCrmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleTypeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->propertyValidations
            ->crmV3PropertyValidationsObjectTypeIDPropertyNameRuleTypeRuleType(
                'AFTER_DATETIME_DURATION',
                [
                    'objectTypeID' => 'objectTypeId',
                    'propertyName' => 'propertyName',
                    'ruleArguments' => ['string'],
                ],
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->propertyValidations->get(
            'propertyName',
            ['objectTypeID' => 'objectTypeId']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponsePublicPropertyValidationRuleNoPaging::class,
            $result
        );
    }

    #[Test]
    public function testGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->propertyValidations->get(
            'propertyName',
            ['objectTypeID' => 'objectTypeId']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponsePublicPropertyValidationRuleNoPaging::class,
            $result
        );
    }
}
