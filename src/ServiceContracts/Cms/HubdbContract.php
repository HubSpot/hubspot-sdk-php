<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms;

use HubspotSDK\Cms\Hubdb\BatchResponseHubDBTableRowV3;
use HubspotSDK\Cms\Hubdb\CollectionResponseWithTotalHubDBTableV3ForwardPaging;
use HubspotSDK\Cms\Hubdb\ColumnRequest;
use HubspotSDK\Cms\Hubdb\HubDBTableRowBatchCloneRequest;
use HubspotSDK\Cms\Hubdb\HubDBTableRowV3;
use HubspotSDK\Cms\Hubdb\HubDBTableRowV3BatchUpdateRequest;
use HubspotSDK\Cms\Hubdb\HubDBTableRowV3Request;
use HubspotSDK\Cms\Hubdb\HubDBTableV3;
use HubspotSDK\Cms\Hubdb\ImportResult;
use HubspotSDK\Cms\Hubdb\RandomAccessCollectionResponseWithTotalHubDBTableRowV3;
use HubspotSDK\Cms\Hubdb\StreamingCollectionResponseWithTotalHubDBTableRowV3;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface HubdbContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function archiveTable(
        string $tableIDOrName,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param bool $copyRows
     * @param bool $isHubspotDefined
     * @param string $newLabel
     * @param string $newName
     *
     * @throws APIException
     */
    public function cloneDraftTable(
        string $tableIDOrName,
        $copyRows,
        $isHubspotDefined,
        $newLabel = omit,
        $newName = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function cloneDraftTableRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3;

    /**
     * @api
     *
     * @param string $tableIDOrName
     * @param string $name
     *
     * @throws APIException
     */
    public function cloneDraftTableRow(
        string $rowID,
        $tableIDOrName,
        $name = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableRowV3;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function cloneDraftTableRowRaw(
        string $rowID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): HubDBTableRowV3;

    /**
     * @api
     *
     * @param list<HubDBTableRowBatchCloneRequest> $inputs
     *
     * @throws APIException
     */
    public function cloneDraftTableRows(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function cloneDraftTableRowsRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param list<HubDBTableRowV3Request> $inputs
     *
     * @throws APIException
     */
    public function createDraftTableRows(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createDraftTableRowsRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param string $label
     * @param string $name
     * @param bool $allowChildTables
     * @param bool $allowPublicAPIAccess
     * @param list<ColumnRequest> $columns
     * @param array<string, int> $dynamicMetaTags
     * @param bool $enableChildTablePages
     * @param bool $useForPages
     *
     * @throws APIException
     */
    public function createTable(
        $label,
        $name,
        $allowChildTables = omit,
        $allowPublicAPIAccess = omit,
        $columns = omit,
        $dynamicMetaTags = omit,
        $enableChildTablePages = omit,
        $useForPages = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createTableRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): HubDBTableV3;

    /**
     * @api
     *
     * @param array<string, mixed> $values
     * @param int $childTableID
     * @param int $displayIndex
     * @param string $name
     * @param string $path
     *
     * @throws APIException
     */
    public function createTableRow(
        string $tableIDOrName,
        $values,
        $childTableID = omit,
        $displayIndex = omit,
        $name = omit,
        $path = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableRowV3;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createTableRowRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableRowV3;

    /**
     * @api
     *
     * @param string $format
     *
     * @throws APIException
     */
    public function exportDraftTable(
        string $tableIDOrName,
        $format = omit,
        ?RequestOptions $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function exportDraftTableRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param string $format
     *
     * @throws APIException
     */
    public function exportTable(
        string $tableIDOrName,
        $format = omit,
        ?RequestOptions $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function exportTableRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param string $after
     * @param bool $archived
     * @param string $contentType
     * @param \DateTimeInterface $createdAfter
     * @param \DateTimeInterface $createdAt
     * @param \DateTimeInterface $createdBefore
     * @param bool $isGetLocalizedSchema
     * @param int $limit
     * @param list<string> $sort
     * @param \DateTimeInterface $updatedAfter
     * @param \DateTimeInterface $updatedAt
     * @param \DateTimeInterface $updatedBefore
     *
     * @throws APIException
     */
    public function getAllDraftTables(
        $after = omit,
        $archived = omit,
        $contentType = omit,
        $createdAfter = omit,
        $createdAt = omit,
        $createdBefore = omit,
        $isGetLocalizedSchema = omit,
        $limit = omit,
        $sort = omit,
        $updatedAfter = omit,
        $updatedAt = omit,
        $updatedBefore = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalHubDBTableV3ForwardPaging;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getAllDraftTablesRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalHubDBTableV3ForwardPaging;

    /**
     * @api
     *
     * @param string $after
     * @param bool $archived
     * @param string $contentType
     * @param \DateTimeInterface $createdAfter
     * @param \DateTimeInterface $createdAt
     * @param \DateTimeInterface $createdBefore
     * @param bool $isGetLocalizedSchema
     * @param int $limit
     * @param list<string> $sort
     * @param \DateTimeInterface $updatedAfter
     * @param \DateTimeInterface $updatedAt
     * @param \DateTimeInterface $updatedBefore
     *
     * @throws APIException
     */
    public function getAllTables(
        $after = omit,
        $archived = omit,
        $contentType = omit,
        $createdAfter = omit,
        $createdAt = omit,
        $createdBefore = omit,
        $isGetLocalizedSchema = omit,
        $limit = omit,
        $sort = omit,
        $updatedAfter = omit,
        $updatedAt = omit,
        $updatedBefore = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalHubDBTableV3ForwardPaging;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getAllTablesRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalHubDBTableV3ForwardPaging;

    /**
     * @api
     *
     * @param bool $archived
     * @param bool $includeForeignIDs
     * @param bool $isGetLocalizedSchema
     *
     * @throws APIException
     */
    public function getDraftTableDetailsByID(
        string $tableIDOrName,
        $archived = omit,
        $includeForeignIDs = omit,
        $isGetLocalizedSchema = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getDraftTableDetailsByIDRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3;

    /**
     * @api
     *
     * @param string $tableIDOrName
     * @param bool $archived
     *
     * @throws APIException
     */
    public function getDraftTableRowByID(
        string $rowID,
        $tableIDOrName,
        $archived = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableRowV3;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getDraftTableRowByIDRaw(
        string $rowID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): HubDBTableRowV3;

    /**
     * @api
     *
     * @param bool $archived
     * @param bool $includeForeignIDs
     * @param bool $isGetLocalizedSchema
     *
     * @throws APIException
     */
    public function getTableDetails(
        string $tableIDOrName,
        $archived = omit,
        $includeForeignIDs = omit,
        $isGetLocalizedSchema = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getTableDetailsRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3;

    /**
     * @api
     *
     * @param string $tableIDOrName
     * @param bool $archived
     *
     * @throws APIException
     */
    public function getTableRow(
        string $rowID,
        $tableIDOrName,
        $archived = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableRowV3;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getTableRowRaw(
        string $rowID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): HubDBTableRowV3;

    /**
     * @api
     *
     * @param string $after
     * @param bool $archived
     * @param int $limit
     * @param int $offset
     * @param list<string> $properties
     * @param list<string> $sort
     *
     * @throws APIException
     */
    public function getTableRows(
        string $tableIDOrName,
        $after = omit,
        $archived = omit,
        $limit = omit,
        $offset = omit,
        $properties = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): RandomAccessCollectionResponseWithTotalHubDBTableRowV3|StreamingCollectionResponseWithTotalHubDBTableRowV3;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getTableRowsRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): RandomAccessCollectionResponseWithTotalHubDBTableRowV3|StreamingCollectionResponseWithTotalHubDBTableRowV3;

    /**
     * @api
     *
     * @param string $config
     * @param string $file
     *
     * @throws APIException
     */
    public function importDraftTable(
        string $tableIDOrName,
        $config = omit,
        $file = omit,
        ?RequestOptions $requestOptions = null,
    ): ImportResult;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function importDraftTableRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ImportResult;

    /**
     * @api
     *
     * @param bool $includeForeignIDs
     *
     * @throws APIException
     */
    public function publishDraftTable(
        string $tableIDOrName,
        $includeForeignIDs = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function publishDraftTableRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3;

    /**
     * @api
     *
     * @param string $tableIDOrName
     *
     * @throws APIException
     */
    public function purgeDraftTableRow(
        string $rowID,
        $tableIDOrName,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function purgeDraftTableRowRaw(
        string $rowID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param list<string> $inputs
     *
     * @throws APIException
     */
    public function purgeDraftTableRows(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function purgeDraftTableRowsRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param list<string> $inputs
     *
     * @throws APIException
     */
    public function readDraftTableRows(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function readDraftTableRowsRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param list<string> $inputs
     *
     * @throws APIException
     */
    public function readTableRows(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function readTableRowsRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param string $tableIDOrName
     *
     * @throws APIException
     */
    public function removeTableVersion(
        int $versionID,
        $tableIDOrName,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function removeTableVersionRaw(
        int $versionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $tableIDOrName
     * @param array<string, mixed> $values
     * @param int $childTableID
     * @param int $displayIndex
     * @param string $name
     * @param string $path
     *
     * @throws APIException
     */
    public function replaceDraftTableRow(
        string $rowID,
        $tableIDOrName,
        $values,
        $childTableID = omit,
        $displayIndex = omit,
        $name = omit,
        $path = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableRowV3;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function replaceDraftTableRowRaw(
        string $rowID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): HubDBTableRowV3;

    /**
     * @api
     *
     * @param list<HubDBTableRowV3BatchUpdateRequest> $inputs
     *
     * @throws APIException
     */
    public function replaceDraftTableRows(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function replaceDraftTableRowsRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param bool $includeForeignIDs
     *
     * @throws APIException
     */
    public function resetDraftTable(
        string $tableIDOrName,
        $includeForeignIDs = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function resetDraftTableRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3;

    /**
     * @api
     *
     * @param bool $includeForeignIDs
     *
     * @throws APIException
     */
    public function unpublishTable(
        string $tableIDOrName,
        $includeForeignIDs = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function unpublishTableRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3;

    /**
     * @api
     *
     * @param string $label
     * @param string $name
     * @param bool $archived
     * @param bool $includeForeignIDs
     * @param bool $isGetLocalizedSchema
     * @param bool $allowChildTables
     * @param bool $allowPublicAPIAccess
     * @param list<ColumnRequest> $columns
     * @param array<string, int> $dynamicMetaTags
     * @param bool $enableChildTablePages
     * @param bool $useForPages
     *
     * @throws APIException
     */
    public function updateDraftTable(
        string $tableIDOrName,
        $label,
        $name,
        $archived = omit,
        $includeForeignIDs = omit,
        $isGetLocalizedSchema = omit,
        $allowChildTables = omit,
        $allowPublicAPIAccess = omit,
        $columns = omit,
        $dynamicMetaTags = omit,
        $enableChildTablePages = omit,
        $useForPages = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateDraftTableRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3;

    /**
     * @api
     *
     * @param string $tableIDOrName
     * @param array<string, mixed> $values
     * @param int $childTableID
     * @param int $displayIndex
     * @param string $name
     * @param string $path
     *
     * @throws APIException
     */
    public function updateDraftTableRow(
        string $rowID,
        $tableIDOrName,
        $values,
        $childTableID = omit,
        $displayIndex = omit,
        $name = omit,
        $path = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableRowV3;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateDraftTableRowRaw(
        string $rowID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): HubDBTableRowV3;

    /**
     * @api
     *
     * @param list<HubDBTableRowV3BatchUpdateRequest> $inputs
     *
     * @throws APIException
     */
    public function updateDraftTableRows(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateDraftTableRowsRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;
}
