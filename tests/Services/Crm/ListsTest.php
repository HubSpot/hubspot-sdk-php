<?php

namespace Tests\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Crm\Lists\ListCreateResponse;
use HubspotSDK\Crm\Lists\ListFetchResponse;
use HubspotSDK\Crm\Lists\ListsByIDResponse;
use HubspotSDK\Crm\Lists\ListSearchResponse;
use HubspotSDK\Crm\Lists\ListUpdateResponse;
use HubspotSDK\Crm\Lists\PublicListConversionResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ListsTest extends TestCase
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

        $result = $this->client->crm->lists->create([
            'name' => 'Dynamic Association List Example',
            'objectTypeID' => '0-1',
            'processingType' => 'DYNAMIC',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListCreateResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->lists->create([
            'name' => 'Dynamic Association List Example',
            'objectTypeID' => '0-1',
            'processingType' => 'DYNAMIC',
            'customProperties' => ['foo' => 'string'],
            'filterBranch' => [
                'filterBranches' => [
                    [
                        'filterBranches' => [
                            [
                                'filterBranches' => [
                                    [
                                        'filterBranches' => [
                                            [
                                                'filterBranches' => [
                                                    [
                                                        'eventTypeID' => 'eventTypeId',
                                                        'filterBranches' => [
                                                            [
                                                                'filterBranches' => [
                                                                    [
                                                                        'associationCategory' => 'associationCategory',
                                                                        'associationTypeID' => 0,
                                                                        'filterBranches' => [
                                                                            [
                                                                                'filterBranches' => [],
                                                                                'filterBranchOperator' => 'filterBranchOperator',
                                                                                'filterBranchType' => 'OR',
                                                                                'filters' => [
                                                                                    [
                                                                                        'filterType' => 'PROPERTY',
                                                                                        'operation' => [
                                                                                            'includeObjectsWithNoValueSet' => true,
                                                                                            'operationType' => 'BOOL',
                                                                                            'operator' => 'operator',
                                                                                            'value' => true,
                                                                                        ],
                                                                                        'property' => 'property',
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                        'filterBranchOperator' => 'filterBranchOperator',
                                                                        'filterBranchType' => 'ASSOCIATION',
                                                                        'filters' => [
                                                                            [
                                                                                'filterType' => 'PROPERTY',
                                                                                'operation' => [
                                                                                    'includeObjectsWithNoValueSet' => true,
                                                                                    'operationType' => 'BOOL',
                                                                                    'operator' => 'operator',
                                                                                    'value' => true,
                                                                                ],
                                                                                'property' => 'property',
                                                                            ],
                                                                        ],
                                                                        'objectTypeID' => 'objectTypeId',
                                                                        'operator' => 'operator',
                                                                    ],
                                                                ],
                                                                'filterBranchOperator' => 'filterBranchOperator',
                                                                'filterBranchType' => 'PROPERTY_ASSOCIATION',
                                                                'filters' => [
                                                                    [
                                                                        'filterType' => 'PROPERTY',
                                                                        'operation' => [
                                                                            'includeObjectsWithNoValueSet' => true,
                                                                            'operationType' => 'BOOL',
                                                                            'operator' => 'operator',
                                                                            'value' => true,
                                                                        ],
                                                                        'property' => 'property',
                                                                    ],
                                                                ],
                                                                'objectTypeID' => 'objectTypeId',
                                                                'operator' => 'operator',
                                                                'propertyWithObjectID' => 'propertyWithObjectId',
                                                            ],
                                                        ],
                                                        'filterBranchOperator' => 'filterBranchOperator',
                                                        'filterBranchType' => 'UNIFIED_EVENTS',
                                                        'filters' => [
                                                            [
                                                                'filterType' => 'PROPERTY',
                                                                'operation' => [
                                                                    'includeObjectsWithNoValueSet' => true,
                                                                    'operationType' => 'BOOL',
                                                                    'operator' => 'operator',
                                                                    'value' => true,
                                                                ],
                                                                'property' => 'property',
                                                            ],
                                                        ],
                                                        'operator' => 'HAS_COMPLETED',
                                                        'coalescingRefineBy' => [
                                                            'type' => 'NUM_OCCURRENCES',
                                                            'maxOccurrences' => 0,
                                                            'minOccurrences' => 0,
                                                        ],
                                                    ],
                                                ],
                                                'filterBranchOperator' => 'filterBranchOperator',
                                                'filterBranchType' => 'RESTRICTED',
                                                'filters' => [
                                                    [
                                                        'filterType' => 'PROPERTY',
                                                        'operation' => [
                                                            'includeObjectsWithNoValueSet' => true,
                                                            'operationType' => 'BOOL',
                                                            'operator' => 'operator',
                                                            'value' => true,
                                                        ],
                                                        'property' => 'property',
                                                    ],
                                                ],
                                            ],
                                        ],
                                        'filterBranchOperator' => 'filterBranchOperator',
                                        'filterBranchType' => 'NOT_ANY',
                                        'filters' => [
                                            [
                                                'filterType' => 'PROPERTY',
                                                'operation' => [
                                                    'includeObjectsWithNoValueSet' => true,
                                                    'operationType' => 'BOOL',
                                                    'operator' => 'operator',
                                                    'value' => true,
                                                ],
                                                'property' => 'property',
                                            ],
                                        ],
                                    ],
                                ],
                                'filterBranchOperator' => 'filterBranchOperator',
                                'filterBranchType' => 'NOT_ALL',
                                'filters' => [
                                    [
                                        'filterType' => 'PROPERTY',
                                        'operation' => [
                                            'includeObjectsWithNoValueSet' => true,
                                            'operationType' => 'BOOL',
                                            'operator' => 'IS_EQUAL_TO',
                                            'value' => true,
                                        ],
                                        'property' => 'hs_is_closed_won',
                                    ],
                                ],
                            ],
                        ],
                        'filterBranchOperator' => 'filterBranchOperator',
                        'filterBranchType' => 'AND',
                        'filters' => [
                            [
                                'filterType' => 'PROPERTY',
                                'operation' => [
                                    'includeObjectsWithNoValueSet' => true,
                                    'operationType' => 'BOOL',
                                    'operator' => 'IS_EQUAL_TO',
                                    'value' => true,
                                ],
                                'property' => 'firstname',
                            ],
                        ],
                    ],
                ],
                'filterBranchOperator' => 'filterBranchOperator',
                'filterBranchType' => 'OR',
                'filters' => [
                    [
                        'filterType' => 'PROPERTY',
                        'operation' => [
                            'includeObjectsWithNoValueSet' => true,
                            'operationType' => 'BOOL',
                            'operator' => 'operator',
                            'value' => true,
                        ],
                        'property' => 'property',
                    ],
                ],
            ],
            'listFolderID' => 0,
            'listPermissions' => [
                'teamsWithEditAccess' => [0], 'usersWithEditAccess' => [0],
            ],
            'membershipSettings' => [
                'includeUnassigned' => true, 'membershipTeamID' => 0,
            ],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListCreateResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->lists->list([]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListsByIDResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->lists->delete('listId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteScheduleConversion(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->lists->deleteScheduleConversion('listId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->lists->get('listId', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListFetchResponse::class, $result);
    }

    #[Test]
    public function testGetByObjectTypeIDAndName(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->lists->getByObjectTypeIDAndName(
            'listName',
            ['objectTypeID' => 'objectTypeId']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListFetchResponse::class, $result);
    }

    #[Test]
    public function testGetByObjectTypeIDAndNameWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->lists->getByObjectTypeIDAndName(
            'listName',
            ['objectTypeID' => 'objectTypeId', 'includeFilters' => true]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListFetchResponse::class, $result);
    }

    #[Test]
    public function testGetScheduleConversion(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->lists->getScheduleConversion('listId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicListConversionResponse::class, $result);
    }

    #[Test]
    public function testRestore(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->lists->restore('listId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testScheduleConversion(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->lists->scheduleConversion(
            'listId',
            [
                'conversionType' => 'INACTIVITY',
                'day' => 0,
                'month' => 0,
                'year' => 0,
                'offset' => 0,
                'timeUnit' => 'DAY',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicListConversionResponse::class, $result);
    }

    #[Test]
    public function testScheduleConversionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->lists->scheduleConversion(
            'listId',
            [
                'conversionType' => 'INACTIVITY',
                'day' => 0,
                'month' => 0,
                'year' => 0,
                'offset' => 0,
                'timeUnit' => 'DAY',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicListConversionResponse::class, $result);
    }

    #[Test]
    public function testSearch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->lists->search([
            'additionalProperties' => ['hs_list_size_week_delta'], 'offset' => 0,
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListSearchResponse::class, $result);
    }

    #[Test]
    public function testSearchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->lists->search([
            'additionalProperties' => ['hs_list_size_week_delta'],
            'offset' => 0,
            'count' => 100,
            'listIDs' => ['string'],
            'processingTypes' => ['string'],
            'query' => 'Test',
            'sort' => 'sort',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListSearchResponse::class, $result);
    }

    #[Test]
    public function testUpdateFilters(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->lists->updateFilters(
            'listId',
            [
                'filterBranch' => [
                    'filterBranches' => [
                        [
                            'filterBranches' => [
                                [
                                    'filterBranches' => [
                                        [
                                            'filterBranches' => [
                                                [
                                                    'filterBranches' => [
                                                        [
                                                            'eventTypeID' => 'eventTypeId',
                                                            'filterBranches' => [
                                                                [
                                                                    'filterBranches' => [
                                                                        [
                                                                            'associationCategory' => 'associationCategory',
                                                                            'associationTypeID' => 0,
                                                                            'filterBranches' => [
                                                                                [
                                                                                    'filterBranches' => [],
                                                                                    'filterBranchOperator' => 'filterBranchOperator',
                                                                                    'filterBranchType' => 'OR',
                                                                                    'filters' => [
                                                                                        [
                                                                                            'filterType' => 'PROPERTY',
                                                                                            'operation' => [
                                                                                                'includeObjectsWithNoValueSet' => true,
                                                                                                'operationType' => 'BOOL',
                                                                                                'operator' => 'operator',
                                                                                                'value' => true,
                                                                                            ],
                                                                                            'property' => 'property',
                                                                                        ],
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                            'filterBranchOperator' => 'filterBranchOperator',
                                                                            'filterBranchType' => 'ASSOCIATION',
                                                                            'filters' => [
                                                                                [
                                                                                    'filterType' => 'PROPERTY',
                                                                                    'operation' => [
                                                                                        'includeObjectsWithNoValueSet' => true,
                                                                                        'operationType' => 'BOOL',
                                                                                        'operator' => 'operator',
                                                                                        'value' => true,
                                                                                    ],
                                                                                    'property' => 'property',
                                                                                ],
                                                                            ],
                                                                            'objectTypeID' => 'objectTypeId',
                                                                            'operator' => 'operator',
                                                                        ],
                                                                    ],
                                                                    'filterBranchOperator' => 'filterBranchOperator',
                                                                    'filterBranchType' => 'PROPERTY_ASSOCIATION',
                                                                    'filters' => [
                                                                        [
                                                                            'filterType' => 'PROPERTY',
                                                                            'operation' => [
                                                                                'includeObjectsWithNoValueSet' => true,
                                                                                'operationType' => 'BOOL',
                                                                                'operator' => 'operator',
                                                                                'value' => true,
                                                                            ],
                                                                            'property' => 'property',
                                                                        ],
                                                                    ],
                                                                    'objectTypeID' => 'objectTypeId',
                                                                    'operator' => 'operator',
                                                                    'propertyWithObjectID' => 'propertyWithObjectId',
                                                                ],
                                                            ],
                                                            'filterBranchOperator' => 'filterBranchOperator',
                                                            'filterBranchType' => 'UNIFIED_EVENTS',
                                                            'filters' => [
                                                                [
                                                                    'filterType' => 'PROPERTY',
                                                                    'operation' => [
                                                                        'includeObjectsWithNoValueSet' => true,
                                                                        'operationType' => 'BOOL',
                                                                        'operator' => 'operator',
                                                                        'value' => true,
                                                                    ],
                                                                    'property' => 'property',
                                                                ],
                                                            ],
                                                            'operator' => 'HAS_COMPLETED',
                                                        ],
                                                    ],
                                                    'filterBranchOperator' => 'filterBranchOperator',
                                                    'filterBranchType' => 'RESTRICTED',
                                                    'filters' => [
                                                        [
                                                            'filterType' => 'PROPERTY',
                                                            'operation' => [
                                                                'includeObjectsWithNoValueSet' => true,
                                                                'operationType' => 'BOOL',
                                                                'operator' => 'operator',
                                                                'value' => true,
                                                            ],
                                                            'property' => 'property',
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'filterBranchOperator' => 'filterBranchOperator',
                                            'filterBranchType' => 'NOT_ANY',
                                            'filters' => [
                                                [
                                                    'filterType' => 'PROPERTY',
                                                    'operation' => [
                                                        'includeObjectsWithNoValueSet' => true,
                                                        'operationType' => 'BOOL',
                                                        'operator' => 'operator',
                                                        'value' => true,
                                                    ],
                                                    'property' => 'property',
                                                ],
                                            ],
                                        ],
                                    ],
                                    'filterBranchOperator' => 'filterBranchOperator',
                                    'filterBranchType' => 'NOT_ALL',
                                    'filters' => [
                                        [
                                            'filterType' => 'PROPERTY',
                                            'operation' => [
                                                'includeObjectsWithNoValueSet' => true,
                                                'operationType' => 'BOOL',
                                                'operator' => 'operator',
                                                'value' => true,
                                            ],
                                            'property' => 'property',
                                        ],
                                    ],
                                ],
                            ],
                            'filterBranchOperator' => 'filterBranchOperator',
                            'filterBranchType' => 'AND',
                            'filters' => [
                                [
                                    'filterType' => 'PROPERTY',
                                    'operation' => [
                                        'includeObjectsWithNoValueSet' => true,
                                        'operationType' => 'BOOL',
                                        'operator' => 'IS_GREATER_THAN_OR_EQUAL_TO',
                                        'value' => true,
                                    ],
                                    'property' => 'hs_predictivecontactscore_v2',
                                ],
                                [
                                    'filterType' => 'PROPERTY',
                                    'operation' => [
                                        'includeObjectsWithNoValueSet' => true,
                                        'operationType' => 'BOOL',
                                        'operator' => 'IS_UNKNOWN',
                                        'value' => true,
                                    ],
                                    'property' => 'engagements_last_meeting_booked_source',
                                ],
                                [
                                    'acceptedStatuses' => ['OPT_IN'],
                                    'filterType' => 'EMAIL_SUBSCRIPTION',
                                    'subscriptionIDs' => ['81537745', '321981152'],
                                ],
                            ],
                        ],
                    ],
                    'filterBranchOperator' => 'filterBranchOperator',
                    'filterBranchType' => 'OR',
                    'filters' => [
                        [
                            'filterType' => 'PROPERTY',
                            'operation' => [
                                'includeObjectsWithNoValueSet' => true,
                                'operationType' => 'BOOL',
                                'operator' => 'operator',
                                'value' => true,
                            ],
                            'property' => 'property',
                        ],
                    ],
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListUpdateResponse::class, $result);
    }

    #[Test]
    public function testUpdateFiltersWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->lists->updateFilters(
            'listId',
            [
                'filterBranch' => [
                    'filterBranches' => [
                        [
                            'filterBranches' => [
                                [
                                    'filterBranches' => [
                                        [
                                            'filterBranches' => [
                                                [
                                                    'filterBranches' => [
                                                        [
                                                            'eventTypeID' => 'eventTypeId',
                                                            'filterBranches' => [
                                                                [
                                                                    'filterBranches' => [
                                                                        [
                                                                            'associationCategory' => 'associationCategory',
                                                                            'associationTypeID' => 0,
                                                                            'filterBranches' => [
                                                                                [
                                                                                    'filterBranches' => [],
                                                                                    'filterBranchOperator' => 'filterBranchOperator',
                                                                                    'filterBranchType' => 'OR',
                                                                                    'filters' => [
                                                                                        [
                                                                                            'filterType' => 'PROPERTY',
                                                                                            'operation' => [
                                                                                                'includeObjectsWithNoValueSet' => true,
                                                                                                'operationType' => 'BOOL',
                                                                                                'operator' => 'operator',
                                                                                                'value' => true,
                                                                                            ],
                                                                                            'property' => 'property',
                                                                                        ],
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                            'filterBranchOperator' => 'filterBranchOperator',
                                                                            'filterBranchType' => 'ASSOCIATION',
                                                                            'filters' => [
                                                                                [
                                                                                    'filterType' => 'PROPERTY',
                                                                                    'operation' => [
                                                                                        'includeObjectsWithNoValueSet' => true,
                                                                                        'operationType' => 'BOOL',
                                                                                        'operator' => 'operator',
                                                                                        'value' => true,
                                                                                    ],
                                                                                    'property' => 'property',
                                                                                ],
                                                                            ],
                                                                            'objectTypeID' => 'objectTypeId',
                                                                            'operator' => 'operator',
                                                                        ],
                                                                    ],
                                                                    'filterBranchOperator' => 'filterBranchOperator',
                                                                    'filterBranchType' => 'PROPERTY_ASSOCIATION',
                                                                    'filters' => [
                                                                        [
                                                                            'filterType' => 'PROPERTY',
                                                                            'operation' => [
                                                                                'includeObjectsWithNoValueSet' => true,
                                                                                'operationType' => 'BOOL',
                                                                                'operator' => 'operator',
                                                                                'value' => true,
                                                                            ],
                                                                            'property' => 'property',
                                                                        ],
                                                                    ],
                                                                    'objectTypeID' => 'objectTypeId',
                                                                    'operator' => 'operator',
                                                                    'propertyWithObjectID' => 'propertyWithObjectId',
                                                                ],
                                                            ],
                                                            'filterBranchOperator' => 'filterBranchOperator',
                                                            'filterBranchType' => 'UNIFIED_EVENTS',
                                                            'filters' => [
                                                                [
                                                                    'filterType' => 'PROPERTY',
                                                                    'operation' => [
                                                                        'includeObjectsWithNoValueSet' => true,
                                                                        'operationType' => 'BOOL',
                                                                        'operator' => 'operator',
                                                                        'value' => true,
                                                                    ],
                                                                    'property' => 'property',
                                                                ],
                                                            ],
                                                            'operator' => 'HAS_COMPLETED',
                                                            'coalescingRefineBy' => [
                                                                'type' => 'NUM_OCCURRENCES',
                                                                'maxOccurrences' => 0,
                                                                'minOccurrences' => 0,
                                                            ],
                                                        ],
                                                    ],
                                                    'filterBranchOperator' => 'filterBranchOperator',
                                                    'filterBranchType' => 'RESTRICTED',
                                                    'filters' => [
                                                        [
                                                            'filterType' => 'PROPERTY',
                                                            'operation' => [
                                                                'includeObjectsWithNoValueSet' => true,
                                                                'operationType' => 'BOOL',
                                                                'operator' => 'operator',
                                                                'value' => true,
                                                            ],
                                                            'property' => 'property',
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'filterBranchOperator' => 'filterBranchOperator',
                                            'filterBranchType' => 'NOT_ANY',
                                            'filters' => [
                                                [
                                                    'filterType' => 'PROPERTY',
                                                    'operation' => [
                                                        'includeObjectsWithNoValueSet' => true,
                                                        'operationType' => 'BOOL',
                                                        'operator' => 'operator',
                                                        'value' => true,
                                                    ],
                                                    'property' => 'property',
                                                ],
                                            ],
                                        ],
                                    ],
                                    'filterBranchOperator' => 'filterBranchOperator',
                                    'filterBranchType' => 'NOT_ALL',
                                    'filters' => [
                                        [
                                            'filterType' => 'PROPERTY',
                                            'operation' => [
                                                'includeObjectsWithNoValueSet' => true,
                                                'operationType' => 'BOOL',
                                                'operator' => 'operator',
                                                'value' => true,
                                            ],
                                            'property' => 'property',
                                        ],
                                    ],
                                ],
                            ],
                            'filterBranchOperator' => 'filterBranchOperator',
                            'filterBranchType' => 'AND',
                            'filters' => [
                                [
                                    'filterType' => 'PROPERTY',
                                    'operation' => [
                                        'includeObjectsWithNoValueSet' => true,
                                        'operationType' => 'BOOL',
                                        'operator' => 'IS_GREATER_THAN_OR_EQUAL_TO',
                                        'value' => true,
                                    ],
                                    'property' => 'hs_predictivecontactscore_v2',
                                ],
                                [
                                    'filterType' => 'PROPERTY',
                                    'operation' => [
                                        'includeObjectsWithNoValueSet' => true,
                                        'operationType' => 'BOOL',
                                        'operator' => 'IS_UNKNOWN',
                                        'value' => true,
                                    ],
                                    'property' => 'engagements_last_meeting_booked_source',
                                ],
                                [
                                    'acceptedStatuses' => ['OPT_IN'],
                                    'filterType' => 'EMAIL_SUBSCRIPTION',
                                    'subscriptionIDs' => ['81537745', '321981152'],
                                    'subscriptionType' => 'subscriptionType',
                                ],
                            ],
                        ],
                    ],
                    'filterBranchOperator' => 'filterBranchOperator',
                    'filterBranchType' => 'OR',
                    'filters' => [
                        [
                            'filterType' => 'PROPERTY',
                            'operation' => [
                                'includeObjectsWithNoValueSet' => true,
                                'operationType' => 'BOOL',
                                'operator' => 'operator',
                                'value' => true,
                            ],
                            'property' => 'property',
                        ],
                    ],
                ],
                'enrollObjectsInWorkflows' => true,
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListUpdateResponse::class, $result);
    }

    #[Test]
    public function testUpdateName(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->lists->updateName('listId', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListUpdateResponse::class, $result);
    }
}
