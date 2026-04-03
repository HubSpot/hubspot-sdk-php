<?php

namespace Tests\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Lists\APICollectionResponseRecordListMembership;
use HubspotSDK\Crm\Lists\BatchResponseRecordIDWithMemberships;
use HubspotSDK\Crm\Lists\JoinTimeAndRecordID;
use HubspotSDK\Crm\Lists\ListCreateResponse;
use HubspotSDK\Crm\Lists\ListFetchResponse;
use HubspotSDK\Crm\Lists\ListFolderCreateResponse;
use HubspotSDK\Crm\Lists\ListFolderFetchResponse;
use HubspotSDK\Crm\Lists\ListsByIDResponse;
use HubspotSDK\Crm\Lists\ListSearchResponse;
use HubspotSDK\Crm\Lists\ListSizeAndEditHistoryResponse;
use HubspotSDK\Crm\Lists\ListUpdateResponse;
use HubspotSDK\Crm\Lists\MembershipsUpdateResponse;
use HubspotSDK\Crm\Lists\PublicBatchMigrationMapping;
use HubspotSDK\Crm\Lists\PublicListConversionResponse;
use HubspotSDK\Crm\Lists\PublicMigrationMapping;
use HubspotSDK\Page;
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

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(accessToken: 'My Access Token', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->create(
            name: 'name',
            objectTypeID: 'objectTypeId',
            processingType: 'processingType',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListCreateResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->create(
            name: 'name',
            objectTypeID: 'objectTypeId',
            processingType: 'processingType',
            customProperties: ['foo' => 'string'],
            filterBranch: [
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
                                                        'pruningRefineBy' => [
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
                                    'operator' => 'operator',
                                    'value' => true,
                                ],
                                'property' => 'property',
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
            listFolderID: 0,
            listPermissions: [
                'teamsWithEditAccess' => [0], 'usersWithEditAccess' => [0],
            ],
            membershipSettings: [
                'includeUnassigned' => true, 'membershipTeamID' => 0,
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListCreateResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListsByIDResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->delete('listId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testAddAndRemoveMemberships(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->addAndRemoveMemberships(
            'listId',
            recordIDsToAdd: ['string'],
            recordIDsToRemove: ['string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MembershipsUpdateResponse::class, $result);
    }

    #[Test]
    public function testAddAndRemoveMembershipsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->addAndRemoveMemberships(
            'listId',
            recordIDsToAdd: ['string'],
            recordIDsToRemove: ['string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MembershipsUpdateResponse::class, $result);
    }

    #[Test]
    public function testAddMemberships(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->addMemberships(
            'listId',
            body: ['string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MembershipsUpdateResponse::class, $result);
    }

    #[Test]
    public function testAddMembershipsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->addMemberships(
            'listId',
            body: ['string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MembershipsUpdateResponse::class, $result);
    }

    #[Test]
    public function testAddMembershipsFrom(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->addMembershipsFrom(
            'sourceListId',
            listID: 'listId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testAddMembershipsFromWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->addMembershipsFrom(
            'sourceListId',
            listID: 'listId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testBatchReadMemberships(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->batchReadMemberships(
            inputs: [['objectTypeID' => 'objectTypeId', 'recordID' => 'recordId']]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponseRecordIDWithMemberships::class,
            $result
        );
    }

    #[Test]
    public function testBatchReadMembershipsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->batchReadMemberships(
            inputs: [['objectTypeID' => 'objectTypeId', 'recordID' => 'recordId']]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponseRecordIDWithMemberships::class,
            $result
        );
    }

    #[Test]
    public function testCreateFolder(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->createFolder(name: 'name');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListFolderCreateResponse::class, $result);
    }

    #[Test]
    public function testCreateFolderWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->createFolder(
            name: 'name',
            parentFolderID: 'parentFolderId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListFolderCreateResponse::class, $result);
    }

    #[Test]
    public function testCreateIDMapping(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->createIDMapping(body: ['string']);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicBatchMigrationMapping::class, $result);
    }

    #[Test]
    public function testCreateIDMappingWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->createIDMapping(body: ['string']);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicBatchMigrationMapping::class, $result);
    }

    #[Test]
    public function testDeleteFolder(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->deleteFolder('folderId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteMemberships(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->deleteMemberships('listId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->get('listId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListFetchResponse::class, $result);
    }

    #[Test]
    public function testGetByObjectTypeAndName(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->getByObjectTypeAndName(
            'listName',
            objectTypeID: 'objectTypeId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListFetchResponse::class, $result);
    }

    #[Test]
    public function testGetByObjectTypeAndNameWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->getByObjectTypeAndName(
            'listName',
            objectTypeID: 'objectTypeId',
            includeFilters: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListFetchResponse::class, $result);
    }

    #[Test]
    public function testGetIDMapping(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->getIDMapping();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicMigrationMapping::class, $result);
    }

    #[Test]
    public function testGetMembershipsJoinOrder(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->crm->lists->getMembershipsJoinOrder('listId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(JoinTimeAndRecordID::class, $item);
        }
    }

    #[Test]
    public function testGetRecordMemberships(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->getRecordMemberships(
            'recordId',
            objectTypeID: 'objectTypeId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            APICollectionResponseRecordListMembership::class,
            $result
        );
    }

    #[Test]
    public function testGetRecordMembershipsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->getRecordMemberships(
            'recordId',
            objectTypeID: 'objectTypeId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            APICollectionResponseRecordListMembership::class,
            $result
        );
    }

    #[Test]
    public function testGetScheduleConversion(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->getScheduleConversion('listId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicListConversionResponse::class, $result);
    }

    #[Test]
    public function testGetSizeAndEditsHistoryBetween(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->getSizeAndEditsHistoryBetween(
            'listId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListSizeAndEditHistoryResponse::class, $result);
    }

    #[Test]
    public function testListBySearch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->listBySearch(
            listIDs: ['string'],
            offset: 0,
            processingTypes: ['string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListSearchResponse::class, $result);
    }

    #[Test]
    public function testListBySearchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->listBySearch(
            listIDs: ['string'],
            offset: 0,
            processingTypes: ['string'],
            additionalFilterProperties: ['string'],
            count: 0,
            objectTypeID: 'objectTypeId',
            query: 'query',
            sort: 'sort',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListSearchResponse::class, $result);
    }

    #[Test]
    public function testListFolders(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->listFolders();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListFolderFetchResponse::class, $result);
    }

    #[Test]
    public function testListMemberships(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->crm->lists->listMemberships('listId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(JoinTimeAndRecordID::class, $item);
        }
    }

    #[Test]
    public function testMoveFolder(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->moveFolder(
            'newParentFolderId',
            folderID: 'folderId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListFolderFetchResponse::class, $result);
    }

    #[Test]
    public function testMoveFolderWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->moveFolder(
            'newParentFolderId',
            folderID: 'folderId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListFolderFetchResponse::class, $result);
    }

    #[Test]
    public function testMoveList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->moveList(
            listID: 'listId',
            newFolderID: 'newFolderId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testMoveListWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->moveList(
            listID: 'listId',
            newFolderID: 'newFolderId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testRemoveMemberships(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->removeMemberships(
            'listId',
            body: ['string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MembershipsUpdateResponse::class, $result);
    }

    #[Test]
    public function testRemoveMembershipsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->removeMemberships(
            'listId',
            body: ['string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MembershipsUpdateResponse::class, $result);
    }

    #[Test]
    public function testRenameFolder(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->renameFolder('folderId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListFolderFetchResponse::class, $result);
    }

    #[Test]
    public function testRestore(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->restore('listId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testScheduleConversion(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->scheduleConversion('listId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testUpdateListFilters(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->updateListFilters(
            'listId',
            filterBranch: [
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
                                    'operator' => 'operator',
                                    'value' => true,
                                ],
                                'property' => 'property',
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
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListUpdateResponse::class, $result);
    }

    #[Test]
    public function testUpdateListFiltersWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->updateListFilters(
            'listId',
            filterBranch: [
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
                                                        'pruningRefineBy' => [
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
                                    'operator' => 'operator',
                                    'value' => true,
                                ],
                                'property' => 'property',
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
            enrollObjectsInWorkflows: true,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListUpdateResponse::class, $result);
    }

    #[Test]
    public function testUpdateListName(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->updateListName('listId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListUpdateResponse::class, $result);
    }

    #[Test]
    public function testUpdateScheduleConversion(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->updateScheduleConversion(
            'listId',
            conversionType: 'INACTIVITY',
            day: 0,
            month: 0,
            year: 0,
            offset: 0,
            timeUnit: 'DAY',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicListConversionResponse::class, $result);
    }

    #[Test]
    public function testUpdateScheduleConversionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->lists->updateScheduleConversion(
            'listId',
            conversionType: 'INACTIVITY',
            day: 0,
            month: 0,
            year: 0,
            offset: 0,
            timeUnit: 'DAY',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicListConversionResponse::class, $result);
    }
}
