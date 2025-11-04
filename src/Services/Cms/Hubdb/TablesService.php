<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Hubdb;

use HubspotSDK\Client;
use HubspotSDK\Cms\Hubdb\ColumnRequest;
use HubspotSDK\Cms\Hubdb\HubDBTableV3;
use HubspotSDK\Cms\Hubdb\ImportResult;
use HubspotSDK\Cms\Hubdb\Tables\TableCloneDraftParams;
use HubspotSDK\Cms\Hubdb\Tables\TableCreateParams;
use HubspotSDK\Cms\Hubdb\Tables\TableDeleteVersionParams;
use HubspotSDK\Cms\Hubdb\Tables\TableExportDraftParams;
use HubspotSDK\Cms\Hubdb\Tables\TableExportParams;
use HubspotSDK\Cms\Hubdb\Tables\TableGetDraftParams;
use HubspotSDK\Cms\Hubdb\Tables\TableGetParams;
use HubspotSDK\Cms\Hubdb\Tables\TableImportDraftParams;
use HubspotSDK\Cms\Hubdb\Tables\TableListDraftParams;
use HubspotSDK\Cms\Hubdb\Tables\TableListParams;
use HubspotSDK\Cms\Hubdb\Tables\TablePublishDraftParams;
use HubspotSDK\Cms\Hubdb\Tables\TableResetDraftParams;
use HubspotSDK\Cms\Hubdb\Tables\TableUnpublishParams;
use HubspotSDK\Cms\Hubdb\Tables\TableUpdateDraftParams;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Hubdb\TablesContract;

use const HubspotSDK\Core\OMIT as omit;

final class TablesService implements TablesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
    public function create(
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

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): HubDBTableV3 {
        [$parsed, $options] = TableCreateParams::parseRequest(
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
    public function list(
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

        return $this->listRaw($params, $requestOptions);
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
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = TableListParams::parseRequest(
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
     * Archive (soft delete) an existing HubDB table. This archives both the published and draft versions.
     *
     * @throws APIException
     */
    public function delete(
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
    public function cloneDraft(
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

        return $this->cloneDraftRaw($tableIDOrName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function cloneDraftRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): HubDBTableV3 {
        [$parsed, $options] = TableCloneDraftParams::parseRequest(
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
     * Delete a specific version of a table
     *
     * @param string $tableIDOrName
     *
     * @throws APIException
     */
    public function deleteVersion(
        int $versionID,
        $tableIDOrName,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['tableIDOrName' => $tableIDOrName];

        return $this->deleteVersionRaw($versionID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteVersionRaw(
        int $versionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = TableDeleteVersionParams::parseRequest(
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
     * Exports the published version of a table in a specified format.
     *
     * @param string $format The file format to export. Possible values include `CSV`, `XLSX`, and `XLS`.
     *
     * @throws APIException
     */
    public function export(
        string $tableIDOrName,
        $format = omit,
        ?RequestOptions $requestOptions = null,
    ): string {
        $params = ['format' => $format];

        return $this->exportRaw($tableIDOrName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function exportRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): string {
        [$parsed, $options] = TableExportParams::parseRequest(
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
     * Exports the draft version of a table to CSV / EXCEL format.
     *
     * @param string $format The file format to export. Possible values include `CSV`, `XLSX`, and `XLS`.
     *
     * @throws APIException
     */
    public function exportDraft(
        string $tableIDOrName,
        $format = omit,
        ?RequestOptions $requestOptions = null,
    ): string {
        $params = ['format' => $format];

        return $this->exportDraftRaw($tableIDOrName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function exportDraftRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): string {
        [$parsed, $options] = TableExportDraftParams::parseRequest(
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
    public function get(
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

        return $this->getRaw($tableIDOrName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): HubDBTableV3 {
        [$parsed, $options] = TableGetParams::parseRequest(
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
     * Get the details for the draft version of a specific HubDB table. This will include the definitions for the columns in the table and the number of rows in the table.
     *
     * @param bool $archived Set this to `true` to return an archived table. Defaults to `false`.
     * @param bool $includeForeignIDs set this to `true` to populate foreign ID values in the result
     * @param bool $isGetLocalizedSchema
     *
     * @throws APIException
     */
    public function getDraft(
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

        return $this->getDraftRaw($tableIDOrName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getDraftRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): HubDBTableV3 {
        [$parsed, $options] = TableGetDraftParams::parseRequest(
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
     * Import the contents of a CSV file into an existing HubDB table. The data will always be imported into the draft version of the table. Use the `/publish` endpoint to push these changes to the published version.
     * This endpoint takes a multi-part POST request. The first part will be a set of JSON-formatted options for the import and you can specify this with the name as `config`.  The second part will be the CSV file you want to import and you can specify this with the name as `file`. Refer the [overview section](https://developers.hubspot.com/docs/api/cms/hubdb#importing-tables) to check the details and format of the JSON-formatted options for the import.
     *
     * @param string $config
     * @param string $file
     *
     * @throws APIException
     */
    public function importDraft(
        string $tableIDOrName,
        $config = omit,
        $file = omit,
        ?RequestOptions $requestOptions = null,
    ): ImportResult {
        $params = ['config' => $config, 'file' => $file];

        return $this->importDraftRaw($tableIDOrName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function importDraftRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ImportResult {
        [$parsed, $options] = TableImportDraftParams::parseRequest(
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
    public function listDraft(
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

        return $this->listDraftRaw($params, $requestOptions);
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
    public function listDraftRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = TableListDraftParams::parseRequest(
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
     * Publishes the table by copying the data and table schema changes from draft version to the published version, meaning any website pages using data from the table will be updated.
     *
     * @param bool $includeForeignIDs set this to `true` to populate foreign ID values in the response
     *
     * @throws APIException
     */
    public function publishDraft(
        string $tableIDOrName,
        $includeForeignIDs = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3 {
        $params = ['includeForeignIDs' => $includeForeignIDs];

        return $this->publishDraftRaw($tableIDOrName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function publishDraftRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): HubDBTableV3 {
        [$parsed, $options] = TablePublishDraftParams::parseRequest(
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
     * Replaces the data in the draft version of the table with values from the published version. Any unpublished changes in the draft will be lost after this call is made.
     *
     * @param bool $includeForeignIDs set this to `true` to populate foreign ID values in the response
     *
     * @throws APIException
     */
    public function resetDraft(
        string $tableIDOrName,
        $includeForeignIDs = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3 {
        $params = ['includeForeignIDs' => $includeForeignIDs];

        return $this->resetDraftRaw($tableIDOrName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function resetDraftRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): HubDBTableV3 {
        [$parsed, $options] = TableResetDraftParams::parseRequest(
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
    public function unpublish(
        string $tableIDOrName,
        $includeForeignIDs = omit,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3 {
        $params = ['includeForeignIDs' => $includeForeignIDs];

        return $this->unpublishRaw($tableIDOrName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function unpublishRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): HubDBTableV3 {
        [$parsed, $options] = TableUnpublishParams::parseRequest(
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
    public function updateDraft(
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

        return $this->updateDraftRaw($tableIDOrName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateDraftRaw(
        string $tableIDOrName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): HubDBTableV3 {
        [$parsed, $options] = TableUpdateDraftParams::parseRequest(
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
}
