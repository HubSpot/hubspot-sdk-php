<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms;

use HubspotSDK\Client;
use HubspotSDK\Cms\Hubdb\CmsHubdbBatchResponseHubDBTableRowV3;
use HubspotSDK\Cms\Hubdb\CmsHubdbCollectionResponseWithTotalHubDBTableV3ForwardPaging;
use HubspotSDK\Cms\Hubdb\CmsHubdbColumnRequest;
use HubspotSDK\Cms\Hubdb\CmsHubdbHubDBTableRowBatchCloneRequest;
use HubspotSDK\Cms\Hubdb\CmsHubdbHubDBTableRowV3;
use HubspotSDK\Cms\Hubdb\CmsHubdbHubDBTableRowV3BatchUpdateRequest;
use HubspotSDK\Cms\Hubdb\CmsHubdbHubDBTableRowV3Request;
use HubspotSDK\Cms\Hubdb\CmsHubdbHubDBTableV3;
use HubspotSDK\Cms\Hubdb\CmsHubdbImportResult;
use HubspotSDK\Cms\Hubdb\CmsHubdbRandomAccessCollectionResponseWithTotalHubDBTableRowV3;
use HubspotSDK\Cms\Hubdb\CmsHubdbStreamingCollectionResponseWithTotalHubDBTableRowV3;
use HubspotSDK\Cms\Hubdb\CmsHubdbUnifiedCollectionResponseWithTotalBaseHubDBTableRowV3;
use HubspotSDK\Cms\Hubdb\HubdbCloneDraftTableParams;
use HubspotSDK\Cms\Hubdb\HubdbCloneDraftTableRowParams;
use HubspotSDK\Cms\Hubdb\HubdbCloneDraftTableRowsParams;
use HubspotSDK\Cms\Hubdb\HubdbCreateDraftTableRowsParams;
use HubspotSDK\Cms\Hubdb\HubdbCreateTableParams;
use HubspotSDK\Cms\Hubdb\HubdbCreateTableRowParams;
use HubspotSDK\Cms\Hubdb\HubdbExportDraftTableParams;
use HubspotSDK\Cms\Hubdb\HubdbExportTableParams;
use HubspotSDK\Cms\Hubdb\HubdbGetAllDraftTablesParams;
use HubspotSDK\Cms\Hubdb\HubdbGetAllTablesParams;
use HubspotSDK\Cms\Hubdb\HubdbGetDraftTableDetailsByIDParams;
use HubspotSDK\Cms\Hubdb\HubdbGetDraftTableRowByIDParams;
use HubspotSDK\Cms\Hubdb\HubdbGetTableDetailsParams;
use HubspotSDK\Cms\Hubdb\HubdbGetTableRowParams;
use HubspotSDK\Cms\Hubdb\HubdbGetTableRowsParams;
use HubspotSDK\Cms\Hubdb\HubdbImportDraftTableParams;
use HubspotSDK\Cms\Hubdb\HubdbPublishDraftTableParams;
use HubspotSDK\Cms\Hubdb\HubdbPurgeDraftTableRowParams;
use HubspotSDK\Cms\Hubdb\HubdbPurgeDraftTableRowsParams;
use HubspotSDK\Cms\Hubdb\HubdbReadDraftTableRowsParams;
use HubspotSDK\Cms\Hubdb\HubdbReadTableRowsParams;
use HubspotSDK\Cms\Hubdb\HubdbRemoveTableVersionParams;
use HubspotSDK\Cms\Hubdb\HubdbReplaceDraftTableRowParams;
use HubspotSDK\Cms\Hubdb\HubdbReplaceDraftTableRowsParams;
use HubspotSDK\Cms\Hubdb\HubdbResetDraftTableParams;
use HubspotSDK\Cms\Hubdb\HubdbUnpublishTableParams;
use HubspotSDK\Cms\Hubdb\HubdbUpdateDraftTableParams;
use HubspotSDK\Cms\Hubdb\HubdbUpdateDraftTableRowParams;
use HubspotSDK\Cms\Hubdb\HubdbUpdateDraftTableRowsParams;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\HubdbContract;
use HubspotSDK\Services\Cms\Hubdb\RowsService;

use const HubspotSDK\Core\OMIT as omit;

final class HubdbService implements HubdbContract
{
    /**
     * @@api
     */
    public RowsService $rows;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->rows = new RowsService($client);
    }

    /**
     * @api
     *
     * Archive a table
     *
     * @throws APIException
     */
    public function archiveTable(
        string $tableIDOrName,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['cms/v3/hubdb/tables/%1$s', $tableIDOrName],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Clone a table
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
    ): CmsHubdbHubDBTableV3 {
        $params = [
            'copyRows' => $copyRows,
            'isHubspotDefined' => $isHubspotDefined,
            'newLabel' => $newLabel,
            'newName' => $newName,
        ];

        return $this->cloneDraftTableRaw($tableIDOrName, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): CmsHubdbHubDBTableV3 {
        [$parsed, $options] = HubdbCloneDraftTableParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['cms/v3/hubdb/tables/%1$s/draft/clone', $tableIDOrName],
            body: (object) $parsed,
            options: $options,
            convert: CmsHubdbHubDBTableV3::class,
        );
    }

    /**
     * @api
     *
     * Clone a row
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
    ): CmsHubdbHubDBTableRowV3 {
        $params = ['tableIDOrName' => $tableIDOrName, 'name' => $name];

        return $this->cloneDraftTableRowRaw($rowID, $params, $requestOptions);
    }

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
    ): CmsHubdbHubDBTableRowV3 {
        [$parsed, $options] = HubdbCloneDraftTableRowParams::parseRequest(
            $params,
            $requestOptions
        );
        $tableIDOrName = $parsed['tableIDOrName'];
        unset($parsed['tableIDOrName']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'cms/v3/hubdb/tables/%1$s/rows/%2$s/draft/clone', $tableIDOrName, $rowID,
            ],
            query: $parsed,
            options: $options,
            convert: CmsHubdbHubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Clone rows in batch
     *
     * @param list<CmsHubdbHubDBTableRowBatchCloneRequest> $inputs
     *
     * @throws APIException
     */
    public function cloneDraftTableRows(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): CmsHubdbBatchResponseHubDBTableRowV3 {
        $params = ['inputs' => $inputs];

        return $this->cloneDraftTableRowsRaw(
            $tableIDOrName,
            $params,
            $requestOptions
        );
    }

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
        ?RequestOptions $requestOptions = null
    ): CmsHubdbBatchResponseHubDBTableRowV3 {
        [$parsed, $options] = HubdbCloneDraftTableRowsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['cms/v3/hubdb/tables/%1$s/rows/draft/batch/clone', $tableIDOrName],
            body: (object) $parsed,
            options: $options,
            convert: CmsHubdbBatchResponseHubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Create rows in batch
     *
     * @param list<CmsHubdbHubDBTableRowV3Request> $inputs
     *
     * @throws APIException
     */
    public function createDraftTableRows(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): CmsHubdbBatchResponseHubDBTableRowV3 {
        $params = ['inputs' => $inputs];

        return $this->createDraftTableRowsRaw(
            $tableIDOrName,
            $params,
            $requestOptions
        );
    }

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
        ?RequestOptions $requestOptions = null
    ): CmsHubdbBatchResponseHubDBTableRowV3 {
        [$parsed, $options] = HubdbCreateDraftTableRowsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'cms/v3/hubdb/tables/%1$s/rows/draft/batch/create', $tableIDOrName,
            ],
            body: (object) $parsed,
            options: $options,
            convert: CmsHubdbBatchResponseHubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Create a new table
     *
     * @param string $label
     * @param string $name
     * @param bool $allowChildTables
     * @param bool $allowPublicAPIAccess
     * @param list<CmsHubdbColumnRequest> $columns
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
    ): CmsHubdbHubDBTableV3 {
        $params = [
            'label' => $label,
            'name' => $name,
            'allowChildTables' => $allowChildTables,
            'allowPublicAPIAccess' => $allowPublicAPIAccess,
            'columns' => $columns,
            'dynamicMetaTags' => $dynamicMetaTags,
            'enableChildTablePages' => $enableChildTablePages,
            'useForPages' => $useForPages,
        ];

        return $this->createTableRaw($params, $requestOptions);
    }

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
    ): CmsHubdbHubDBTableV3 {
        [$parsed, $options] = HubdbCreateTableParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/hubdb/tables',
            body: (object) $parsed,
            options: $options,
            convert: CmsHubdbHubDBTableV3::class,
        );
    }

    /**
     * @api
     *
     * Add a new row to a table
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
    ): CmsHubdbHubDBTableRowV3 {
        $params = [
            'values' => $values,
            'childTableID' => $childTableID,
            'displayIndex' => $displayIndex,
            'name' => $name,
            'path' => $path,
        ];

        return $this->createTableRowRaw($tableIDOrName, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): CmsHubdbHubDBTableRowV3 {
        [$parsed, $options] = HubdbCreateTableRowParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['cms/v3/hubdb/tables/%1$s/rows', $tableIDOrName],
            body: (object) $parsed,
            options: $options,
            convert: CmsHubdbHubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Export a draft table
     *
     * @param string $format
     *
     * @throws APIException
     */
    public function exportDraftTable(
        string $tableIDOrName,
        $format = omit,
        ?RequestOptions $requestOptions = null,
    ): string {
        $params = ['format' => $format];

        return $this->exportDraftTableRaw($tableIDOrName, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): string {
        [$parsed, $options] = HubdbExportDraftTableParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/hubdb/tables/%1$s/draft/export', $tableIDOrName],
            query: $parsed,
            headers: ['Accept' => 'application/vnd.ms-excel'],
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Export a published version of a table
     *
     * @param string $format
     *
     * @throws APIException
     */
    public function exportTable(
        string $tableIDOrName,
        $format = omit,
        ?RequestOptions $requestOptions = null,
    ): string {
        $params = ['format' => $format];

        return $this->exportTableRaw($tableIDOrName, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): string {
        [$parsed, $options] = HubdbExportTableParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/hubdb/tables/%1$s/export', $tableIDOrName],
            query: $parsed,
            headers: ['Accept' => 'application/vnd.ms-excel'],
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Return all draft tables
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
    ): CmsHubdbCollectionResponseWithTotalHubDBTableV3ForwardPaging {
        $params = [
            'after' => $after,
            'archived' => $archived,
            'contentType' => $contentType,
            'createdAfter' => $createdAfter,
            'createdAt' => $createdAt,
            'createdBefore' => $createdBefore,
            'isGetLocalizedSchema' => $isGetLocalizedSchema,
            'limit' => $limit,
            'sort' => $sort,
            'updatedAfter' => $updatedAfter,
            'updatedAt' => $updatedAt,
            'updatedBefore' => $updatedBefore,
        ];

        return $this->getAllDraftTablesRaw($params, $requestOptions);
    }

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
    ): CmsHubdbCollectionResponseWithTotalHubDBTableV3ForwardPaging {
        [$parsed, $options] = HubdbGetAllDraftTablesParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'cms/v3/hubdb/tables/draft',
            query: $parsed,
            options: $options,
            convert: CmsHubdbCollectionResponseWithTotalHubDBTableV3ForwardPaging::class,
        );
    }

    /**
     * @api
     *
     * Get all published tables
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
    ): CmsHubdbCollectionResponseWithTotalHubDBTableV3ForwardPaging {
        $params = [
            'after' => $after,
            'archived' => $archived,
            'contentType' => $contentType,
            'createdAfter' => $createdAfter,
            'createdAt' => $createdAt,
            'createdBefore' => $createdBefore,
            'isGetLocalizedSchema' => $isGetLocalizedSchema,
            'limit' => $limit,
            'sort' => $sort,
            'updatedAfter' => $updatedAfter,
            'updatedAt' => $updatedAt,
            'updatedBefore' => $updatedBefore,
        ];

        return $this->getAllTablesRaw($params, $requestOptions);
    }

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
    ): CmsHubdbCollectionResponseWithTotalHubDBTableV3ForwardPaging {
        [$parsed, $options] = HubdbGetAllTablesParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'cms/v3/hubdb/tables',
            query: $parsed,
            options: $options,
            convert: CmsHubdbCollectionResponseWithTotalHubDBTableV3ForwardPaging::class,
        );
    }

    /**
     * @api
     *
     * Get details for a draft table
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
    ): CmsHubdbHubDBTableV3 {
        $params = [
            'archived' => $archived,
            'includeForeignIDs' => $includeForeignIDs,
            'isGetLocalizedSchema' => $isGetLocalizedSchema,
        ];

        return $this->getDraftTableDetailsByIDRaw(
            $tableIDOrName,
            $params,
            $requestOptions
        );
    }

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
        ?RequestOptions $requestOptions = null
    ): CmsHubdbHubDBTableV3 {
        [$parsed, $options] = HubdbGetDraftTableDetailsByIDParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/hubdb/tables/%1$s/draft', $tableIDOrName],
            query: $parsed,
            options: $options,
            convert: CmsHubdbHubDBTableV3::class,
        );
    }

    /**
     * @api
     *
     * Get a row from the draft table
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
    ): CmsHubdbHubDBTableRowV3 {
        $params = ['tableIDOrName' => $tableIDOrName, 'archived' => $archived];

        return $this->getDraftTableRowByIDRaw($rowID, $params, $requestOptions);
    }

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
    ): CmsHubdbHubDBTableRowV3 {
        [$parsed, $options] = HubdbGetDraftTableRowByIDParams::parseRequest(
            $params,
            $requestOptions
        );
        $tableIDOrName = $parsed['tableIDOrName'];
        unset($parsed['tableIDOrName']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'cms/v3/hubdb/tables/%1$s/rows/%2$s/draft', $tableIDOrName, $rowID,
            ],
            query: $parsed,
            options: $options,
            convert: CmsHubdbHubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Get details of a published table
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
    ): CmsHubdbHubDBTableV3 {
        $params = [
            'archived' => $archived,
            'includeForeignIDs' => $includeForeignIDs,
            'isGetLocalizedSchema' => $isGetLocalizedSchema,
        ];

        return $this->getTableDetailsRaw($tableIDOrName, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): CmsHubdbHubDBTableV3 {
        [$parsed, $options] = HubdbGetTableDetailsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/hubdb/tables/%1$s', $tableIDOrName],
            query: $parsed,
            options: $options,
            convert: CmsHubdbHubDBTableV3::class,
        );
    }

    /**
     * @api
     *
     * Get a table row
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
    ): CmsHubdbHubDBTableRowV3 {
        $params = ['tableIDOrName' => $tableIDOrName, 'archived' => $archived];

        return $this->getTableRowRaw($rowID, $params, $requestOptions);
    }

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
    ): CmsHubdbHubDBTableRowV3 {
        [$parsed, $options] = HubdbGetTableRowParams::parseRequest(
            $params,
            $requestOptions
        );
        $tableIDOrName = $parsed['tableIDOrName'];
        unset($parsed['tableIDOrName']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/hubdb/tables/%1$s/rows/%2$s', $tableIDOrName, $rowID],
            query: $parsed,
            options: $options,
            convert: CmsHubdbHubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Get rows for a table
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
    ): CmsHubdbRandomAccessCollectionResponseWithTotalHubDBTableRowV3|CmsHubdbStreamingCollectionResponseWithTotalHubDBTableRowV3 {
        $params = [
            'after' => $after,
            'archived' => $archived,
            'limit' => $limit,
            'offset' => $offset,
            'properties' => $properties,
            'sort' => $sort,
        ];

        return $this->getTableRowsRaw($tableIDOrName, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): CmsHubdbRandomAccessCollectionResponseWithTotalHubDBTableRowV3|CmsHubdbStreamingCollectionResponseWithTotalHubDBTableRowV3 {
        [$parsed, $options] = HubdbGetTableRowsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/hubdb/tables/%1$s/rows', $tableIDOrName],
            query: $parsed,
            options: $options,
            convert: CmsHubdbUnifiedCollectionResponseWithTotalBaseHubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Import data into draft table
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
    ): CmsHubdbImportResult {
        $params = ['config' => $config, 'file' => $file];

        return $this->importDraftTableRaw($tableIDOrName, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): CmsHubdbImportResult {
        [$parsed, $options] = HubdbImportDraftTableParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['cms/v3/hubdb/tables/%1$s/draft/import', $tableIDOrName],
            headers: ['Content-Type' => 'multipart/form-data'],
            body: (object) $parsed,
            options: $options,
            convert: CmsHubdbImportResult::class,
        );
    }

    /**
     * @api
     *
     * Publish a table from draft
     *
     * @param bool $includeForeignIDs
     *
     * @throws APIException
     */
    public function publishDraftTable(
        string $tableIDOrName,
        $includeForeignIDs = omit,
        ?RequestOptions $requestOptions = null,
    ): CmsHubdbHubDBTableV3 {
        $params = ['includeForeignIDs' => $includeForeignIDs];

        return $this->publishDraftTableRaw(
            $tableIDOrName,
            $params,
            $requestOptions
        );
    }

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
        ?RequestOptions $requestOptions = null
    ): CmsHubdbHubDBTableV3 {
        [$parsed, $options] = HubdbPublishDraftTableParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['cms/v3/hubdb/tables/%1$s/draft/publish', $tableIDOrName],
            query: $parsed,
            options: $options,
            convert: CmsHubdbHubDBTableV3::class,
        );
    }

    /**
     * @api
     *
     * Permanently deletes a row
     *
     * @param string $tableIDOrName
     *
     * @throws APIException
     */
    public function purgeDraftTableRow(
        string $rowID,
        $tableIDOrName,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['tableIDOrName' => $tableIDOrName];

        return $this->purgeDraftTableRowRaw($rowID, $params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = HubdbPurgeDraftTableRowParams::parseRequest(
            $params,
            $requestOptions
        );
        $tableIDOrName = $parsed['tableIDOrName'];
        unset($parsed['tableIDOrName']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: [
                'cms/v3/hubdb/tables/%1$s/rows/%2$s/draft', $tableIDOrName, $rowID,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Permanently deletes rows
     *
     * @param list<string> $inputs
     *
     * @throws APIException
     */
    public function purgeDraftTableRows(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['inputs' => $inputs];

        return $this->purgeDraftTableRowsRaw(
            $tableIDOrName,
            $params,
            $requestOptions
        );
    }

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
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = HubdbPurgeDraftTableRowsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['cms/v3/hubdb/tables/%1$s/rows/draft/batch/purge', $tableIDOrName],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Get a set of rows from draft table
     *
     * @param list<string> $inputs
     *
     * @throws APIException
     */
    public function readDraftTableRows(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): CmsHubdbBatchResponseHubDBTableRowV3 {
        $params = ['inputs' => $inputs];

        return $this->readDraftTableRowsRaw(
            $tableIDOrName,
            $params,
            $requestOptions
        );
    }

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
        ?RequestOptions $requestOptions = null
    ): CmsHubdbBatchResponseHubDBTableRowV3 {
        [$parsed, $options] = HubdbReadDraftTableRowsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['cms/v3/hubdb/tables/%1$s/rows/draft/batch/read', $tableIDOrName],
            body: (object) $parsed,
            options: $options,
            convert: CmsHubdbBatchResponseHubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Get a set of rows
     *
     * @param list<string> $inputs
     *
     * @throws APIException
     */
    public function readTableRows(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): CmsHubdbBatchResponseHubDBTableRowV3 {
        $params = ['inputs' => $inputs];

        return $this->readTableRowsRaw($tableIDOrName, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): CmsHubdbBatchResponseHubDBTableRowV3 {
        [$parsed, $options] = HubdbReadTableRowsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['cms/v3/hubdb/tables/%1$s/rows/batch/read', $tableIDOrName],
            body: (object) $parsed,
            options: $options,
            convert: CmsHubdbBatchResponseHubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Delete a table version
     *
     * @param string $tableIDOrName
     *
     * @throws APIException
     */
    public function removeTableVersion(
        int $versionID,
        $tableIDOrName,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['tableIDOrName' => $tableIDOrName];

        return $this->removeTableVersionRaw($versionID, $params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = HubdbRemoveTableVersionParams::parseRequest(
            $params,
            $requestOptions
        );
        $tableIDOrName = $parsed['tableIDOrName'];
        unset($parsed['tableIDOrName']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: [
                'cms/v3/hubdb/tables/%1$s/versions/%2$s', $tableIDOrName, $versionID,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Replaces an existing row
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
    ): CmsHubdbHubDBTableRowV3 {
        $params = [
            'tableIDOrName' => $tableIDOrName,
            'values' => $values,
            'childTableID' => $childTableID,
            'displayIndex' => $displayIndex,
            'name' => $name,
            'path' => $path,
        ];

        return $this->replaceDraftTableRowRaw($rowID, $params, $requestOptions);
    }

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
    ): CmsHubdbHubDBTableRowV3 {
        [$parsed, $options] = HubdbReplaceDraftTableRowParams::parseRequest(
            $params,
            $requestOptions
        );
        $tableIDOrName = $parsed['tableIDOrName'];
        unset($parsed['tableIDOrName']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: [
                'cms/v3/hubdb/tables/%1$s/rows/%2$s/draft', $tableIDOrName, $rowID,
            ],
            body: (object) array_diff_key($parsed, ['tableIDOrName']),
            options: $options,
            convert: CmsHubdbHubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Replace rows in batch in draft table
     *
     * @param list<CmsHubdbHubDBTableRowV3BatchUpdateRequest> $inputs
     *
     * @throws APIException
     */
    public function replaceDraftTableRows(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): CmsHubdbBatchResponseHubDBTableRowV3 {
        $params = ['inputs' => $inputs];

        return $this->replaceDraftTableRowsRaw(
            $tableIDOrName,
            $params,
            $requestOptions
        );
    }

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
        ?RequestOptions $requestOptions = null
    ): CmsHubdbBatchResponseHubDBTableRowV3 {
        [$parsed, $options] = HubdbReplaceDraftTableRowsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'cms/v3/hubdb/tables/%1$s/rows/draft/batch/replace', $tableIDOrName,
            ],
            body: (object) $parsed,
            options: $options,
            convert: CmsHubdbBatchResponseHubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Reset a draft table
     *
     * @param bool $includeForeignIDs
     *
     * @throws APIException
     */
    public function resetDraftTable(
        string $tableIDOrName,
        $includeForeignIDs = omit,
        ?RequestOptions $requestOptions = null,
    ): CmsHubdbHubDBTableV3 {
        $params = ['includeForeignIDs' => $includeForeignIDs];

        return $this->resetDraftTableRaw($tableIDOrName, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): CmsHubdbHubDBTableV3 {
        [$parsed, $options] = HubdbResetDraftTableParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['cms/v3/hubdb/tables/%1$s/draft/reset', $tableIDOrName],
            query: $parsed,
            options: $options,
            convert: CmsHubdbHubDBTableV3::class,
        );
    }

    /**
     * @api
     *
     * Unpublish a table
     *
     * @param bool $includeForeignIDs
     *
     * @throws APIException
     */
    public function unpublishTable(
        string $tableIDOrName,
        $includeForeignIDs = omit,
        ?RequestOptions $requestOptions = null,
    ): CmsHubdbHubDBTableV3 {
        $params = ['includeForeignIDs' => $includeForeignIDs];

        return $this->unpublishTableRaw($tableIDOrName, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): CmsHubdbHubDBTableV3 {
        [$parsed, $options] = HubdbUnpublishTableParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['cms/v3/hubdb/tables/%1$s/unpublish', $tableIDOrName],
            query: $parsed,
            options: $options,
            convert: CmsHubdbHubDBTableV3::class,
        );
    }

    /**
     * @api
     *
     * Update an existing table
     *
     * @param string $label
     * @param string $name
     * @param bool $archived
     * @param bool $includeForeignIDs
     * @param bool $isGetLocalizedSchema
     * @param bool $allowChildTables
     * @param bool $allowPublicAPIAccess
     * @param list<CmsHubdbColumnRequest> $columns
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
    ): CmsHubdbHubDBTableV3 {
        $params = [
            'label' => $label,
            'name' => $name,
            'archived' => $archived,
            'includeForeignIDs' => $includeForeignIDs,
            'isGetLocalizedSchema' => $isGetLocalizedSchema,
            'allowChildTables' => $allowChildTables,
            'allowPublicAPIAccess' => $allowPublicAPIAccess,
            'columns' => $columns,
            'dynamicMetaTags' => $dynamicMetaTags,
            'enableChildTablePages' => $enableChildTablePages,
            'useForPages' => $useForPages,
        ];

        return $this->updateDraftTableRaw($tableIDOrName, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): CmsHubdbHubDBTableV3 {
        [$parsed, $options] = HubdbUpdateDraftTableParams::parseRequest(
            $params,
            $requestOptions
        );
        $query_params = array_flip(
            ['archived', 'includeForeignIds', 'isGetLocalizedSchema']
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['cms/v3/hubdb/tables/%1$s/draft', $tableIDOrName],
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: CmsHubdbHubDBTableV3::class,
        );
    }

    /**
     * @api
     *
     * Updates an existing row
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
    ): CmsHubdbHubDBTableRowV3 {
        $params = [
            'tableIDOrName' => $tableIDOrName,
            'values' => $values,
            'childTableID' => $childTableID,
            'displayIndex' => $displayIndex,
            'name' => $name,
            'path' => $path,
        ];

        return $this->updateDraftTableRowRaw($rowID, $params, $requestOptions);
    }

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
    ): CmsHubdbHubDBTableRowV3 {
        [$parsed, $options] = HubdbUpdateDraftTableRowParams::parseRequest(
            $params,
            $requestOptions
        );
        $tableIDOrName = $parsed['tableIDOrName'];
        unset($parsed['tableIDOrName']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: [
                'cms/v3/hubdb/tables/%1$s/rows/%2$s/draft', $tableIDOrName, $rowID,
            ],
            body: (object) array_diff_key($parsed, ['tableIDOrName']),
            options: $options,
            convert: CmsHubdbHubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Update rows in batch in draft table
     *
     * @param list<CmsHubdbHubDBTableRowV3BatchUpdateRequest> $inputs
     *
     * @throws APIException
     */
    public function updateDraftTableRows(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): CmsHubdbBatchResponseHubDBTableRowV3 {
        $params = ['inputs' => $inputs];

        return $this->updateDraftTableRowsRaw(
            $tableIDOrName,
            $params,
            $requestOptions
        );
    }

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
        ?RequestOptions $requestOptions = null
    ): CmsHubdbBatchResponseHubDBTableRowV3 {
        [$parsed, $options] = HubdbUpdateDraftTableRowsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'cms/v3/hubdb/tables/%1$s/rows/draft/batch/update', $tableIDOrName,
            ],
            body: (object) $parsed,
            options: $options,
            convert: CmsHubdbBatchResponseHubDBTableRowV3::class,
        );
    }
}
