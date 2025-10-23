<?php

namespace Tests\Services\CRM;

use HubspotSDK\Client;
use HubspotSDK\PublicAssociationFilterBranch;
use HubspotSDK\PublicBoolPropertyOperation;
use HubspotSDK\PublicEmailSubscriptionFilter;
use HubspotSDK\PublicNotAllFilterBranch;
use HubspotSDK\PublicNotAnyFilterBranch;
use HubspotSDK\PublicNumOccurrencesRefineBy;
use HubspotSDK\PublicOrFilterBranch;
use HubspotSDK\PublicPropertyAssociationFilterBranch;
use HubspotSDK\PublicPropertyFilter;
use HubspotSDK\PublicRestrictedFilterBranch;
use HubspotSDK\PublicUnifiedEventsFilterBranch;
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
            accessToken: 'pat-na1-xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx',
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

        $result = $this->client->crm->lists->create(
            name: 'Dynamic Association List Example',
            objectTypeID: '0-1',
            processingType: 'DYNAMIC',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->lists->create(
            name: 'Dynamic Association List Example',
            objectTypeID: '0-1',
            processingType: 'DYNAMIC',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->lists->list();

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

        $result = $this->client->crm->lists->get('listId');

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
            objectTypeID: 'objectTypeId'
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
            objectTypeID: 'objectTypeId'
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
            conversionType: 'INACTIVITY',
            day: 0,
            month: 0,
            year: 0,
            offset: 0,
            timeUnit: 'DAY',
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
            conversionType: 'INACTIVITY',
            day: 0,
            month: 0,
            year: 0,
            offset: 0,
            timeUnit: 'DAY',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSearch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->lists->search();

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
            filterBranch: PublicOrFilterBranch::with(
                filterBranches: [
                    PublicOrFilterBranch::with(
                        filterBranches: [
                            PublicNotAllFilterBranch::with(
                                filterBranches: [
                                    PublicNotAnyFilterBranch::with(
                                        filterBranches: [
                                            PublicRestrictedFilterBranch::with(
                                                filterBranches: [
                                                    PublicUnifiedEventsFilterBranch::with(
                                                        eventTypeID: 'eventTypeId',
                                                        filterBranches: [
                                                            PublicPropertyAssociationFilterBranch::with(
                                                                filterBranches: [
                                                                    PublicAssociationFilterBranch::with(
                                                                        associationCategory: 'associationCategory',
                                                                        associationTypeID: 0,
                                                                        filterBranches: [
                                                                            PublicOrFilterBranch::with(
                                                                                filterBranches: [],
                                                                                filterBranchOperator: 'filterBranchOperator',
                                                                                filterBranchType: 'OR',
                                                                                filters: [
                                                                                    PublicPropertyFilter::with(
                                                                                        filterType: 'PROPERTY',
                                                                                        operation: PublicBoolPropertyOperation::with(
                                                                                            includeObjectsWithNoValueSet: true,
                                                                                            operationType: 'BOOL',
                                                                                            operator: 'operator',
                                                                                            value: true,
                                                                                        ),
                                                                                        property: 'property',
                                                                                    ),
                                                                                ],
                                                                            ),
                                                                        ],
                                                                        filterBranchOperator: 'filterBranchOperator',
                                                                        filterBranchType: 'ASSOCIATION',
                                                                        filters: [
                                                                            PublicPropertyFilter::with(
                                                                                filterType: 'PROPERTY',
                                                                                operation: PublicBoolPropertyOperation::with(
                                                                                    includeObjectsWithNoValueSet: true,
                                                                                    operationType: 'BOOL',
                                                                                    operator: 'operator',
                                                                                    value: true,
                                                                                ),
                                                                                property: 'property',
                                                                            ),
                                                                        ],
                                                                        objectTypeID: 'objectTypeId',
                                                                        operator: 'operator',
                                                                    ),
                                                                ],
                                                                filterBranchOperator: 'filterBranchOperator',
                                                                filterBranchType: 'PROPERTY_ASSOCIATION',
                                                                filters: [
                                                                    PublicPropertyFilter::with(
                                                                        filterType: 'PROPERTY',
                                                                        operation: PublicBoolPropertyOperation::with(
                                                                            includeObjectsWithNoValueSet: true,
                                                                            operationType: 'BOOL',
                                                                            operator: 'operator',
                                                                            value: true,
                                                                        ),
                                                                        property: 'property',
                                                                    ),
                                                                ],
                                                                objectTypeID: 'objectTypeId',
                                                                operator: 'operator',
                                                                propertyWithObjectID: 'propertyWithObjectId',
                                                            ),
                                                        ],
                                                        filterBranchOperator: 'filterBranchOperator',
                                                        filterBranchType: 'UNIFIED_EVENTS',
                                                        filters: [
                                                            PublicPropertyFilter::with(
                                                                filterType: 'PROPERTY',
                                                                operation: PublicBoolPropertyOperation::with(
                                                                    includeObjectsWithNoValueSet: true,
                                                                    operationType: 'BOOL',
                                                                    operator: 'operator',
                                                                    value: true,
                                                                ),
                                                                property: 'property',
                                                            ),
                                                        ],
                                                        operator: 'HAS_COMPLETED',
                                                    ),
                                                ],
                                                filterBranchOperator: 'filterBranchOperator',
                                                filterBranchType: 'RESTRICTED',
                                                filters: [
                                                    PublicPropertyFilter::with(
                                                        filterType: 'PROPERTY',
                                                        operation: PublicBoolPropertyOperation::with(
                                                            includeObjectsWithNoValueSet: true,
                                                            operationType: 'BOOL',
                                                            operator: 'operator',
                                                            value: true,
                                                        ),
                                                        property: 'property',
                                                    ),
                                                ],
                                            ),
                                        ],
                                        filterBranchOperator: 'filterBranchOperator',
                                        filterBranchType: 'NOT_ANY',
                                        filters: [
                                            PublicPropertyFilter::with(
                                                filterType: 'PROPERTY',
                                                operation: PublicBoolPropertyOperation::with(
                                                    includeObjectsWithNoValueSet: true,
                                                    operationType: 'BOOL',
                                                    operator: 'operator',
                                                    value: true,
                                                ),
                                                property: 'property',
                                            ),
                                        ],
                                    ),
                                ],
                                filterBranchOperator: 'filterBranchOperator',
                                filterBranchType: 'NOT_ALL',
                                filters: [
                                    PublicPropertyFilter::with(
                                        filterType: 'PROPERTY',
                                        operation: PublicBoolPropertyOperation::with(
                                            includeObjectsWithNoValueSet: true,
                                            operationType: 'BOOL',
                                            operator: 'operator',
                                            value: true,
                                        ),
                                        property: 'property',
                                    ),
                                ],
                            ),
                        ],
                        filterBranchOperator: 'filterBranchOperator',
                        filterBranchType: 'AND',
                        filters: [
                            PublicPropertyFilter::with(
                                filterType: 'PROPERTY',
                                operation: PublicBoolPropertyOperation::with(
                                    includeObjectsWithNoValueSet: true,
                                    operationType: 'BOOL',
                                    operator: 'IS_GREATER_THAN_OR_EQUAL_TO',
                                    value: true,
                                ),
                                property: 'hs_predictivecontactscore_v2',
                            ),
                            PublicPropertyFilter::with(
                                filterType: 'PROPERTY',
                                operation: PublicBoolPropertyOperation::with(
                                    includeObjectsWithNoValueSet: true,
                                    operationType: 'BOOL',
                                    operator: 'IS_UNKNOWN',
                                    value: true,
                                ),
                                property: 'engagements_last_meeting_booked_source',
                            ),
                            PublicEmailSubscriptionFilter::with(
                                acceptedStatuses: ['OPT_IN'],
                                filterType: 'EMAIL_SUBSCRIPTION',
                                subscriptionIDs: ['81537745', '321981152'],
                            ),
                        ],
                    ),
                ],
                filterBranchOperator: 'filterBranchOperator',
                filterBranchType: 'OR',
                filters: [
                    PublicPropertyFilter::with(
                        filterType: 'PROPERTY',
                        operation: PublicBoolPropertyOperation::with(
                            includeObjectsWithNoValueSet: true,
                            operationType: 'BOOL',
                            operator: 'operator',
                            value: true,
                        ),
                        property: 'property',
                    ),
                ],
            ),
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
            filterBranch: PublicOrFilterBranch::with(
                filterBranches: [
                    PublicOrFilterBranch::with(
                        filterBranches: [
                            PublicNotAllFilterBranch::with(
                                filterBranches: [
                                    PublicNotAnyFilterBranch::with(
                                        filterBranches: [
                                            PublicRestrictedFilterBranch::with(
                                                filterBranches: [
                                                    PublicUnifiedEventsFilterBranch::with(
                                                        eventTypeID: 'eventTypeId',
                                                        filterBranches: [
                                                            PublicPropertyAssociationFilterBranch::with(
                                                                filterBranches: [
                                                                    PublicAssociationFilterBranch::with(
                                                                        associationCategory: 'associationCategory',
                                                                        associationTypeID: 0,
                                                                        filterBranches: [
                                                                            PublicOrFilterBranch::with(
                                                                                filterBranches: [],
                                                                                filterBranchOperator: 'filterBranchOperator',
                                                                                filterBranchType: 'OR',
                                                                                filters: [
                                                                                    PublicPropertyFilter::with(
                                                                                        filterType: 'PROPERTY',
                                                                                        operation: PublicBoolPropertyOperation::with(
                                                                                            includeObjectsWithNoValueSet: true,
                                                                                            operationType: 'BOOL',
                                                                                            operator: 'operator',
                                                                                            value: true,
                                                                                        ),
                                                                                        property: 'property',
                                                                                    ),
                                                                                ],
                                                                            ),
                                                                        ],
                                                                        filterBranchOperator: 'filterBranchOperator',
                                                                        filterBranchType: 'ASSOCIATION',
                                                                        filters: [
                                                                            PublicPropertyFilter::with(
                                                                                filterType: 'PROPERTY',
                                                                                operation: PublicBoolPropertyOperation::with(
                                                                                    includeObjectsWithNoValueSet: true,
                                                                                    operationType: 'BOOL',
                                                                                    operator: 'operator',
                                                                                    value: true,
                                                                                ),
                                                                                property: 'property',
                                                                            ),
                                                                        ],
                                                                        objectTypeID: 'objectTypeId',
                                                                        operator: 'operator',
                                                                    ),
                                                                ],
                                                                filterBranchOperator: 'filterBranchOperator',
                                                                filterBranchType: 'PROPERTY_ASSOCIATION',
                                                                filters: [
                                                                    PublicPropertyFilter::with(
                                                                        filterType: 'PROPERTY',
                                                                        operation: PublicBoolPropertyOperation::with(
                                                                            includeObjectsWithNoValueSet: true,
                                                                            operationType: 'BOOL',
                                                                            operator: 'operator',
                                                                            value: true,
                                                                        ),
                                                                        property: 'property',
                                                                    ),
                                                                ],
                                                                objectTypeID: 'objectTypeId',
                                                                operator: 'operator',
                                                                propertyWithObjectID: 'propertyWithObjectId',
                                                            ),
                                                        ],
                                                        filterBranchOperator: 'filterBranchOperator',
                                                        filterBranchType: 'UNIFIED_EVENTS',
                                                        filters: [
                                                            PublicPropertyFilter::with(
                                                                filterType: 'PROPERTY',
                                                                operation: PublicBoolPropertyOperation::with(
                                                                    includeObjectsWithNoValueSet: true,
                                                                    operationType: 'BOOL',
                                                                    operator: 'operator',
                                                                    value: true,
                                                                ),
                                                                property: 'property',
                                                            ),
                                                        ],
                                                        operator: 'HAS_COMPLETED',
                                                    )
                                                        ->withCoalescingRefineBy(
                                                            PublicNumOccurrencesRefineBy::with(
                                                                type: 'NUM_OCCURRENCES'
                                                            )
                                                                ->withMaxOccurrences(0)
                                                                ->withMinOccurrences(0),
                                                        ),
                                                ],
                                                filterBranchOperator: 'filterBranchOperator',
                                                filterBranchType: 'RESTRICTED',
                                                filters: [
                                                    PublicPropertyFilter::with(
                                                        filterType: 'PROPERTY',
                                                        operation: PublicBoolPropertyOperation::with(
                                                            includeObjectsWithNoValueSet: true,
                                                            operationType: 'BOOL',
                                                            operator: 'operator',
                                                            value: true,
                                                        ),
                                                        property: 'property',
                                                    ),
                                                ],
                                            ),
                                        ],
                                        filterBranchOperator: 'filterBranchOperator',
                                        filterBranchType: 'NOT_ANY',
                                        filters: [
                                            PublicPropertyFilter::with(
                                                filterType: 'PROPERTY',
                                                operation: PublicBoolPropertyOperation::with(
                                                    includeObjectsWithNoValueSet: true,
                                                    operationType: 'BOOL',
                                                    operator: 'operator',
                                                    value: true,
                                                ),
                                                property: 'property',
                                            ),
                                        ],
                                    ),
                                ],
                                filterBranchOperator: 'filterBranchOperator',
                                filterBranchType: 'NOT_ALL',
                                filters: [
                                    PublicPropertyFilter::with(
                                        filterType: 'PROPERTY',
                                        operation: PublicBoolPropertyOperation::with(
                                            includeObjectsWithNoValueSet: true,
                                            operationType: 'BOOL',
                                            operator: 'operator',
                                            value: true,
                                        ),
                                        property: 'property',
                                    ),
                                ],
                            ),
                        ],
                        filterBranchOperator: 'filterBranchOperator',
                        filterBranchType: 'AND',
                        filters: [
                            PublicPropertyFilter::with(
                                filterType: 'PROPERTY',
                                operation: PublicBoolPropertyOperation::with(
                                    includeObjectsWithNoValueSet: true,
                                    operationType: 'BOOL',
                                    operator: 'IS_GREATER_THAN_OR_EQUAL_TO',
                                    value: true,
                                ),
                                property: 'hs_predictivecontactscore_v2',
                            ),
                            PublicPropertyFilter::with(
                                filterType: 'PROPERTY',
                                operation: PublicBoolPropertyOperation::with(
                                    includeObjectsWithNoValueSet: true,
                                    operationType: 'BOOL',
                                    operator: 'IS_UNKNOWN',
                                    value: true,
                                ),
                                property: 'engagements_last_meeting_booked_source',
                            ),
                            PublicEmailSubscriptionFilter::with(
                                acceptedStatuses: ['OPT_IN'],
                                filterType: 'EMAIL_SUBSCRIPTION',
                                subscriptionIDs: ['81537745', '321981152'],
                            )
                                ->withSubscriptionType('subscriptionType'),
                        ],
                    ),
                ],
                filterBranchOperator: 'filterBranchOperator',
                filterBranchType: 'OR',
                filters: [
                    PublicPropertyFilter::with(
                        filterType: 'PROPERTY',
                        operation: PublicBoolPropertyOperation::with(
                            includeObjectsWithNoValueSet: true,
                            operationType: 'BOOL',
                            operator: 'operator',
                            value: true,
                        ),
                        property: 'property',
                    ),
                ],
            ),
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateName(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->lists->updateName('listId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
