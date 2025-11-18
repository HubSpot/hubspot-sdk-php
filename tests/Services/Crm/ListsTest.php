<?php

namespace Tests\Services\Crm;

use HubspotSDK\Client;
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
            'objectTypeId' => '0-1',
            'processingType' => 'DYNAMIC',
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->lists->create([
            'name' => 'Dynamic Association List Example',
            'objectTypeId' => '0-1',
            'processingType' => 'DYNAMIC',
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->lists->list([]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->lists->delete('listId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteScheduleConversion(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->lists->deleteScheduleConversion('listId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->lists->get('listId', []);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetByObjectTypeIDAndName(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->lists->getByObjectTypeIDAndName(
            'listName',
            ['objectTypeId' => 'objectTypeId']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetByObjectTypeIDAndNameWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->lists->getByObjectTypeIDAndName(
            'listName',
            ['objectTypeId' => 'objectTypeId']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetScheduleConversion(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->lists->getScheduleConversion('listId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRestore(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->lists->restore('listId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSearchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->lists->search([
            'additionalProperties' => ['hs_list_size_week_delta'], 'offset' => 0,
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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
                                                            'eventTypeId' => 'eventTypeId',
                                                            'filterBranches' => [
                                                                [
                                                                    'filterBranches' => [
                                                                        [
                                                                            'associationCategory' => 'associationCategory',
                                                                            'associationTypeId' => 0,
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
                                                                            'objectTypeId' => 'objectTypeId',
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
                                                                    'objectTypeId' => 'objectTypeId',
                                                                    'operator' => 'operator',
                                                                    'propertyWithObjectId' => 'propertyWithObjectId',
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
                                        'value' => 12,
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
                                    'subscriptionIds' => ['81537745', '321981152'],
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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
                                                            'eventTypeId' => 'eventTypeId',
                                                            'filterBranches' => [
                                                                [
                                                                    'filterBranches' => [
                                                                        [
                                                                            'associationCategory' => 'associationCategory',
                                                                            'associationTypeId' => 0,
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
                                                                            'objectTypeId' => 'objectTypeId',
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
                                                                    'objectTypeId' => 'objectTypeId',
                                                                    'operator' => 'operator',
                                                                    'propertyWithObjectId' => 'propertyWithObjectId',
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
                                        'value' => 12,
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
                                    'subscriptionIds' => ['81537745', '321981152'],
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
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateName(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->lists->updateName('listId', []);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
