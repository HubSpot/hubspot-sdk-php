<?php

namespace Tests\Services\Crm;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Crm\Exports\ActionResponseWithSingleResultUri;
use HubSpotSDK\Crm\Exports\PublicExportResponse;
use HubSpotSDK\TaskLocator;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ExportsTest extends TestCase
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
    public function testCreateAsync(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->exports->createAsync(
            associatedObjectType: ['string'],
            exportInternalValuesOptions: ['NAMES'],
            exportName: 'exportName',
            exportType: 'LIST',
            format: 'CSV',
            includeLabeledAssociations: true,
            includePrimaryDisplayPropertyForAssociatedObjects: true,
            language: 'AF_ZA',
            objectProperties: ['string'],
            objectType: 'objectType',
            overrideAssociatedObjectsPerDefinitionPerRowLimit: true,
            listID: 'listId',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TaskLocator::class, $result);
    }

    #[Test]
    public function testCreateAsyncWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->exports->createAsync(
            associatedObjectType: ['string'],
            exportInternalValuesOptions: ['NAMES'],
            exportName: 'exportName',
            exportType: 'LIST',
            format: 'CSV',
            includeLabeledAssociations: true,
            includePrimaryDisplayPropertyForAssociatedObjects: true,
            language: 'AF_ZA',
            objectProperties: ['string'],
            objectType: 'objectType',
            overrideAssociatedObjectsPerDefinitionPerRowLimit: true,
            publicCrmSearchRequest: [
                'filterGroups' => [
                    [
                        'filters' => [
                            [
                                'operator' => 'BETWEEN',
                                'propertyName' => 'propertyName',
                                'highValue' => 'highValue',
                                'value' => 'value',
                                'values' => ['string'],
                            ],
                        ],
                    ],
                ],
                'filters' => [
                    [
                        'operator' => 'BETWEEN',
                        'propertyName' => 'propertyName',
                        'highValue' => 'highValue',
                        'value' => 'value',
                        'values' => ['string'],
                    ],
                ],
                'sorts' => ['string'],
                'query' => 'query',
            ],
            listID: 'listId',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TaskLocator::class, $result);
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->exports->get(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicExportResponse::class, $result);
    }

    #[Test]
    public function testGetStatus(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->exports->getStatus(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionResponseWithSingleResultUri::class, $result);
    }
}
