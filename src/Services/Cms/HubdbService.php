<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms;

use HubspotSDK\Client;
use HubspotSDK\Cms\Hubdb\BatchResponseHubDBTableRowV3;
use HubspotSDK\Cms\Hubdb\ColumnRequest;
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
use HubspotSDK\Cms\Hubdb\HubDBTableRowBatchCloneRequest;
use HubspotSDK\Cms\Hubdb\HubDBTableRowV3;
use HubspotSDK\Cms\Hubdb\HubDBTableRowV3BatchUpdateRequest;
use HubspotSDK\Cms\Hubdb\HubDBTableRowV3Request;
use HubspotSDK\Cms\Hubdb\HubDBTableV3;
use HubspotSDK\Cms\Hubdb\HubdbUnpublishTableParams;
use HubspotSDK\Cms\Hubdb\HubdbUpdateDraftTableParams;
use HubspotSDK\Cms\Hubdb\HubdbUpdateDraftTableRowParams;
use HubspotSDK\Cms\Hubdb\HubdbUpdateDraftTableRowsParams;
use HubspotSDK\Cms\Hubdb\ImportResult;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\HubdbContract;
use HubspotSDK\Services\Cms\Hubdb\RowsService;
use HubspotSDK\Services\Cms\Hubdb\TablesService;

use const HubspotSDK\Core\OMIT as omit;

final class HubdbService implements HubdbContract
{
    /**
     * @@api
     */
    public RowsService $rows;

    /**
     * @@api
     */
    public TablesService $tables;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->rows = new RowsService($client);
        $this->tables = new TablesService($client);
    }

    /**
     * @api
     *
     * Archive (soft delete) an existing HubDB table. This archives both the published and draft versions.
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
     * Clone an existing HubDB table. The `newName` and `newLabel` of the new table can be sent as JSON in the request body. This will create the cloned table as a draft.
     *
     * @param bool $copyRows Specifies whether to copy the rows during clone
     * @param bool $isHubspotDefined
     * @param string $newLabel The new label for the cloned table
     * @param string $newName The new name for the cloned table
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
    ): HubDBTableV3 {
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
    ): HubDBTableV3 {
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
            convert: HubDBTableV3::class,
        );
    }

    /**
     * @api
     *
     * Clones a single row in the draft version of a table.
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
    ): HubDBTableRowV3 {
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
    ): HubDBTableRowV3 {
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
            convert: HubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Clones rows in the draft version of the specified table, given a set of row ids. Maximum of 100 row ids per call.
     *
     * @param list<HubDBTableRowBatchCloneRequest> $inputs
     *
     * @throws APIException
     */
    public function cloneDraftTableRows(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3 {
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
    ): BatchResponseHubDBTableRowV3 {
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
            convert: BatchResponseHubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Creates rows in the draft version of the specified table, given an array of row objects. Maximum of 100 row object per call. See the overview section for more details with an example.
     *
     * @param list<HubDBTableRowV3Request> $inputs
     *
     * @throws APIException
     */
    public function createDraftTableRows(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3 {
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
    ): BatchResponseHubDBTableRowV3 {
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
            convert: BatchResponseHubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Creates a new draft HubDB table given a JSON schema. The table name and label should be unique for each account.
     *
     * @param string $label Label of the table
     * @param string $name Name of the table
     * @param bool $allowChildTables Specifies whether child tables can be created
     * @param bool $allowPublicAPIAccess Specifies whether the table can be read by public without authorization
     * @param list<ColumnRequest> $columns List of columns in the table
     * @param array<string,
     * int,> $dynamicMetaTags Specifies the key value pairs of the [metadata fields](https://developers.hubspot.com/docs/cms/guides/dynamic-pages/hubdb#dynamic-pages) with the associated column IDs.
     * @param bool $enableChildTablePages Specifies creation of multi-level dynamic pages using child tables
     * @param bool $useForPages Specifies whether the table can be used for creation of dynamic pages
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
    ): HubDBTableV3 {
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
    ): HubDBTableV3 {
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
            convert: HubDBTableV3::class,
        );
    }

    /**
     * @api
     *
     * Add a new row to a HubDB table. New rows will be added to the draft version of the table. Use the `/publish` endpoint to push these changes to published version.
     *
     * @param array<string,
     * mixed,> $values List of key value pairs with the column name and column value
     * @param int $childTableID Specifies the value for the column child table id
     * @param int $displayIndex
     * @param string $name Specifies the value for `hs_name` column, which will be used as title in the dynamic pages
     * @param string $path Specifies the value for `hs_path` column, which will be used as slug in the dynamic pages
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
    ): HubDBTableRowV3 {
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
    ): HubDBTableRowV3 {
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
            convert: HubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Exports the draft version of a table to CSV / EXCEL format.
     *
     * @param string $format The file format to export. Possible values include `CSV`, `XLSX`, and `XLS`.
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
     * Exports the published version of a table in a specified format.
     *
     * @param string $format The file format to export. Possible values include `CSV`, `XLSX`, and `XLS`.
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
     * Returns the details for each draft table defined in the specified account, including column definitions.
     *
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived Specifies whether to return archived tables. Defaults to `false`.
     * @param string $contentType
     * @param \DateTimeInterface $createdAfter only return tables created after the specified time
     * @param \DateTimeInterface $createdAt only return tables created at exactly the specified time
     * @param \DateTimeInterface $createdBefore only return tables created before the specified time
     * @param bool $isGetLocalizedSchema
     * @param int $limit The maximum number of results to return. Default is 1000.
     * @param list<string> $sort Specifies which fields to use for sorting results. Valid fields are `name`, `createdAt`, `updatedAt`, `createdBy`, `updatedBy`. `createdAt` will be used by default.
     * @param \DateTimeInterface $updatedAfter only return tables last updated after the specified time
     * @param \DateTimeInterface $updatedAt only return tables last updated at exactly the specified time
     * @param \DateTimeInterface $updatedBefore only return tables last updated before the specified time
     *
     * @return Page<HubDBTableV3>
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
    ): Page {
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
     * @return Page<HubDBTableV3>
     *
     * @throws APIException
     */
    public function getAllDraftTablesRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
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
            convert: HubDBTableV3::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Returns the details for the published version of each table defined in an account, including column definitions.
     *
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived Specifies whether to return archived tables. Defaults to `false`.
     * @param string $contentType
     * @param \DateTimeInterface $createdAfter only return tables created after the specified time
     * @param \DateTimeInterface $createdAt only return tables created at exactly the specified time
     * @param \DateTimeInterface $createdBefore only return tables created before the specified time
     * @param bool $isGetLocalizedSchema
     * @param int $limit The maximum number of results to return. Default is 1000.
     * @param list<string> $sort Specifies which fields to use for sorting results. Valid fields are `name`, `createdAt`, `updatedAt`, `createdBy`, `updatedBy`. `createdAt` will be used by default.
     * @param \DateTimeInterface $updatedAfter only return tables last updated after the specified time
     * @param \DateTimeInterface $updatedAt only return tables last updated at exactly the specified time
     * @param \DateTimeInterface $updatedBefore only return tables last updated before the specified time
     *
     * @return Page<HubDBTableV3>
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
    ): Page {
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
     * @return Page<HubDBTableV3>
     *
     * @throws APIException
     */
    public function getAllTablesRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
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
            convert: HubDBTableV3::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Get the details for the draft version of a specific HubDB table. This will include the definitions for the columns in the table and the number of rows in the table.
     *
     * @param bool $archived Set this to `true` to return an archived table. Defaults to `false`.
     * @param bool $includeForeignIDs set this to `true` to populate foreign ID values in the result
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
    ): HubDBTableV3 {
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
    ): HubDBTableV3 {
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
            convert: HubDBTableV3::class,
        );
    }

    /**
     * @api
     *
     * Get a single row by ID from a table's draft version.
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
    ): HubDBTableRowV3 {
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
    ): HubDBTableRowV3 {
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
            convert: HubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Returns the details for the published version of the specified table. This will include the definitions for the columns in the table and the number of rows in the table.
     *
     * **Note:** This endpoint can be accessed without any authentication if the table is set to be allowed for public access. To do so, you'll need to include the HubSpot account ID in a `portalId` query parameter.
     *
     * @param bool $archived Set this to `true` to return details for an archived table. Defaults to `false`.
     * @param bool $includeForeignIDs set this to `true` to populate foreign ID values in the result
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
    ): HubDBTableV3 {
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
    ): HubDBTableV3 {
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
            convert: HubDBTableV3::class,
        );
    }

    /**
     * @api
     *
     * Get a single row by ID from the published version of a table.
     * **Note:** This endpoint can be accessed without any authentication, if the table is set to be allowed for public access.
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
    ): HubDBTableRowV3 {
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
    ): HubDBTableRowV3 {
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
            convert: HubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Returns a set of rows in the published version of the specified table. Row results can be filtered and sorted. Filtering and sorting options will be sent as query parameters to the API request. For example, by adding the query parameters `column1__gt=5&sort=-column1`, API returns the rows with values for column `column1` greater than 5 and in the descending order of `column1` values. Refer to the [overview section](https://developers.hubspot.com/docs/api/cms/hubdb#filtering-and-sorting-table-rows) for detailed filtering and sorting options.
     * **Note:** This endpoint can be accessed without any authentication, if the table is set to be allowed for public access.
     *
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived
     * @param int $limit The maximum number of results to return. Default is `1000`.
     * @param int $offset
     * @param list<string> $properties specify the column names to get results containing only the required columns instead of all column details
     * @param list<string> $sort Specifies the column names to sort the results by. See the above description for more details.
     *
     * @return Page<mixed>
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
    ): Page {
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
     * @return Page<mixed>
     *
     * @throws APIException
     */
    public function getTableRowsRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
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
            convert: 'mixed',
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Import the contents of a CSV file into an existing HubDB table. The data will always be imported into the draft version of the table. Use the `/publish` endpoint to push these changes to the published version.
     * This endpoint takes a multi-part POST request. The first part will be a set of JSON-formatted options for the import and you can specify this with the name as `config`.  The second part will be the CSV file you want to import and you can specify this with the name as `file`. Refer the [overview section](https://developers.hubspot.com/docs/api/cms/hubdb#importing-tables) to check the details and format of the JSON-formatted options for the import.
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
    ): ImportResult {
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
    ): ImportResult {
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
            convert: ImportResult::class,
        );
    }

    /**
     * @api
     *
     * Publishes the table by copying the data and table schema changes from draft version to the published version, meaning any website pages using data from the table will be updated.
     *
     * @param bool $includeForeignIDs set this to `true` to populate foreign ID values in the response
     *
     * @throws APIException
     */
    public function publishDraftTable(
        string $tableIDOrName,
        $includeForeignIDs = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3 {
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
    ): HubDBTableV3 {
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
            convert: HubDBTableV3::class,
        );
    }

    /**
     * @api
     *
     * Permanently deletes a row from a table's draft version.
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
     * Permanently deletes rows from the draft version of the table, given a set of row IDs. Maximum of 100 row IDs per call.
     *
     * @param list<string> $inputs strings to input
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
     * Returns rows in the draft version of the specified table, given a set of row IDs.
     *
     * @param list<string> $inputs strings to input
     *
     * @throws APIException
     */
    public function readDraftTableRows(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3 {
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
    ): BatchResponseHubDBTableRowV3 {
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
            convert: BatchResponseHubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Returns rows in the published version of the specified table, given a set of row IDs.
     * **Note:** This endpoint can be accessed without any authentication if the table is set to be allowed for public access.
     *
     * @param list<string> $inputs strings to input
     *
     * @throws APIException
     */
    public function readTableRows(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3 {
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
    ): BatchResponseHubDBTableRowV3 {
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
            convert: BatchResponseHubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Delete a specific version of a table
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
     * Replace a single row in the draft version of a table. All column values must be specified. If a column has a value in the target table and this request doesn't define that value, it will be deleted.
     * See the "Create a row" endpoint for instructions on how to format the JSON row definitions.
     *
     * @param string $tableIDOrName
     * @param array<string,
     * mixed,> $values List of key value pairs with the column name and column value
     * @param int $childTableID Specifies the value for the column child table id
     * @param int $displayIndex
     * @param string $name Specifies the value for `hs_name` column, which will be used as title in the dynamic pages
     * @param string $path Specifies the value for `hs_path` column, which will be used as slug in the dynamic pages
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
    ): HubDBTableRowV3 {
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
    ): HubDBTableRowV3 {
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
            convert: HubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Replaces multiple rows as a batch in the draft version of the table, with a maximum of 100 rows per call. See the endpoint `PUT /tables/{tableIdOrName}/rows/{rowId}/draft` for details on updating a single row.
     *
     * @param list<HubDBTableRowV3BatchUpdateRequest> $inputs
     *
     * @throws APIException
     */
    public function replaceDraftTableRows(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3 {
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
    ): BatchResponseHubDBTableRowV3 {
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
            convert: BatchResponseHubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Replaces the data in the draft version of the table with values from the published version. Any unpublished changes in the draft will be lost after this call is made.
     *
     * @param bool $includeForeignIDs set this to `true` to populate foreign ID values in the response
     *
     * @throws APIException
     */
    public function resetDraftTable(
        string $tableIDOrName,
        $includeForeignIDs = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3 {
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
    ): HubDBTableV3 {
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
            convert: HubDBTableV3::class,
        );
    }

    /**
     * @api
     *
     * Unpublishes the table, meaning any website pages using data from the table will not render any data.
     *
     * @param bool $includeForeignIDs set this to `true` to populate foreign ID values in the response
     *
     * @throws APIException
     */
    public function unpublishTable(
        string $tableIDOrName,
        $includeForeignIDs = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3 {
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
    ): HubDBTableV3 {
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
            convert: HubDBTableV3::class,
        );
    }

    /**
     * @api
     *
     * Update an existing HubDB table. You can use this endpoint to add or remove columns to the table as well as restore an archived table. Tables updated using the endpoint will only modify the draft verion of the table. Use the `/publish` endpoint to push all the changes to the published version. To restore a table, include the query parameter `archived=true` and `"archived": false` in the json body.
     * **Note:** You need to include all the columns in the input when you are adding/removing/updating a column. If you do not include an already existing column in the request, it will be deleted.
     *
     * @param string $label Label of the table
     * @param string $name Name of the table
     * @param bool $archived Specifies whether to return archived tables. Defaults to `false`.
     * @param bool $includeForeignIDs set this to `true` to populate foreign ID values in the result
     * @param bool $isGetLocalizedSchema
     * @param bool $allowChildTables Specifies whether child tables can be created
     * @param bool $allowPublicAPIAccess Specifies whether the table can be read by public without authorization
     * @param list<ColumnRequest> $columns List of columns in the table
     * @param array<string,
     * int,> $dynamicMetaTags Specifies the key value pairs of the [metadata fields](https://developers.hubspot.com/docs/cms/guides/dynamic-pages/hubdb#dynamic-pages) with the associated column IDs.
     * @param bool $enableChildTablePages Specifies creation of multi-level dynamic pages using child tables
     * @param bool $useForPages Specifies whether the table can be used for creation of dynamic pages
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
    ): HubDBTableV3 {
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
    ): HubDBTableV3 {
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
            convert: HubDBTableV3::class,
        );
    }

    /**
     * @api
     *
     * Sparse updates a single row in the table's draft version.
     * All the column values need not be specified. Only the columns or fields that needs to be modified can be specified.
     * See the "Create a row" endpoint for instructions on how to format the JSON row definitions.
     *
     * @param string $tableIDOrName
     * @param array<string,
     * mixed,> $values List of key value pairs with the column name and column value
     * @param int $childTableID Specifies the value for the column child table id
     * @param int $displayIndex
     * @param string $name Specifies the value for `hs_name` column, which will be used as title in the dynamic pages
     * @param string $path Specifies the value for `hs_path` column, which will be used as slug in the dynamic pages
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
    ): HubDBTableRowV3 {
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
    ): HubDBTableRowV3 {
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
            convert: HubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Updates multiple rows as a batch in the draft version of the table, with a maximum of 100 rows per call. See the endpoint `PATCH /tables/{tableIdOrName}/rows/{rowId}/draft` for details on updating a single row.
     *
     * @param list<HubDBTableRowV3BatchUpdateRequest> $inputs
     *
     * @throws APIException
     */
    public function updateDraftTableRows(
        string $tableIDOrName,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseHubDBTableRowV3 {
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
    ): BatchResponseHubDBTableRowV3 {
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
            convert: BatchResponseHubDBTableRowV3::class,
        );
    }
}
