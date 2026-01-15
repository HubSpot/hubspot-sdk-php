<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Hubdb;

use HubspotSDK\Client;
use HubspotSDK\Cms\Hubdb\ColumnRequest;
use HubspotSDK\Cms\Hubdb\HubDBTableV3;
use HubspotSDK\Cms\Hubdb\ImportResult;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Hubdb\TablesContract;

/**
 * @phpstan-import-type ColumnRequestShape from \HubspotSDK\Cms\Hubdb\ColumnRequest
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class TablesService implements TablesContract
{
    /**
     * @api
     */
    public TablesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TablesRawService($client);
    }

    /**
     * @api
     *
     * Creates a new draft HubDB table given a JSON schema. The table name and label should be unique for each account.
     *
     * @param bool $allowChildTables Specifies whether child tables can be created
     * @param bool $allowPublicAPIAccess Specifies whether the table can be read by public without authorization
     * @param list<ColumnRequest|ColumnRequestShape> $columns List of columns in the table
     * @param array<string,int> $dynamicMetaTags Specifies the key value pairs of the [metadata fields](https://developers.hubspot.com/docs/cms/guides/dynamic-pages/hubdb#dynamic-pages) with the associated column IDs.
     * @param bool $enableChildTablePages Specifies creation of multi-level dynamic pages using child tables
     * @param string $label Label of the table
     * @param string $name Name of the table
     * @param bool $useForPages Specifies whether the table can be used for creation of dynamic pages
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        bool $allowChildTables,
        bool $allowPublicAPIAccess,
        array $columns,
        array $dynamicMetaTags,
        bool $enableChildTablePages,
        string $label,
        string $name,
        bool $useForPages,
        RequestOptions|array|null $requestOptions = null,
    ): HubDBTableV3 {
        $params = Util::removeNulls(
            [
                'allowChildTables' => $allowChildTables,
                'allowPublicAPIAccess' => $allowPublicAPIAccess,
                'columns' => $columns,
                'dynamicMetaTags' => $dynamicMetaTags,
                'enableChildTablePages' => $enableChildTablePages,
                'label' => $label,
                'name' => $name,
                'useForPages' => $useForPages,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the details for the published version of each table defined in an account, including column definitions.
     *
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived Specifies whether to return archived tables. Defaults to `false`.
     * @param string $contentType specifies the content type for the response
     * @param \DateTimeInterface $createdAfter only return tables created after the specified time
     * @param \DateTimeInterface $createdAt only return tables created at exactly the specified time
     * @param \DateTimeInterface $createdBefore only return tables created before the specified time
     * @param bool $isGetLocalizedSchema indicates whether to retrieve the localized schema for the tables
     * @param int $limit The maximum number of results to return. Default is 1000.
     * @param list<string> $sort Specifies which fields to use for sorting results. Valid fields are `name`, `createdAt`, `updatedAt`, `createdBy`, `updatedBy`. `createdAt` will be used by default.
     * @param \DateTimeInterface $updatedAfter only return tables last updated after the specified time
     * @param \DateTimeInterface $updatedAt only return tables last updated at exactly the specified time
     * @param \DateTimeInterface $updatedBefore only return tables last updated before the specified time
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<HubDBTableV3>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?bool $archived = null,
        ?string $contentType = null,
        ?\DateTimeInterface $createdAfter = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $createdBefore = null,
        ?bool $isGetLocalizedSchema = null,
        ?int $limit = null,
        ?array $sort = null,
        ?\DateTimeInterface $updatedAfter = null,
        ?\DateTimeInterface $updatedAt = null,
        ?\DateTimeInterface $updatedBefore = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            [
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
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Archive (soft delete) an existing HubDB table. This archives both the published and draft versions.
     *
     * @param string $tableIDOrName the ID or name of the table to archive
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $tableIDOrName,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($tableIDOrName, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Clone an existing HubDB table. The `newName` and `newLabel` of the new table can be sent as JSON in the request body. This will create the cloned table as a draft.
     *
     * @param string $tableIDOrName the ID or name of the table to clone
     * @param bool $copyRows Specifies whether to copy the rows during clone
     * @param string $newLabel The new label for the cloned table
     * @param string $newName The new name for the cloned table
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function cloneDraft(
        string $tableIDOrName,
        bool $copyRows,
        bool $isHubspotDefined,
        ?string $newLabel = null,
        ?string $newName = null,
        RequestOptions|array|null $requestOptions = null,
    ): HubDBTableV3 {
        $params = Util::removeNulls(
            [
                'copyRows' => $copyRows,
                'isHubspotDefined' => $isHubspotDefined,
                'newLabel' => $newLabel,
                'newName' => $newName,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->cloneDraft($tableIDOrName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a specific version of a table
     *
     * @param int $versionID the ID of the specific version of the table to delete
     * @param string $tableIDOrName the ID or name of the table whose version is to be deleted
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteVersion(
        int $versionID,
        string $tableIDOrName,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['tableIDOrName' => $tableIDOrName]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteVersion($versionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Exports the published version of a table in a specified format.
     *
     * @param string $tableIDOrName the ID or name of the table to export
     * @param string $format The file format to export. Possible values include `CSV`, `XLSX`, and `XLS`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function export(
        string $tableIDOrName,
        ?string $format = null,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(['format' => $format]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->export($tableIDOrName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Exports the draft version of a table to CSV / EXCEL format.
     *
     * @param string $tableIDOrName the ID or name of the table to export
     * @param string $format The file format to export. Possible values include `CSV`, `XLSX`, and `XLS`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function exportDraft(
        string $tableIDOrName,
        ?string $format = null,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(['format' => $format]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->exportDraft($tableIDOrName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the details for the published version of the specified table. This will include the definitions for the columns in the table and the number of rows in the table.
     *
     * **Note:** This endpoint can be accessed without any authentication if the table is set to be allowed for public access. To do so, you'll need to include the HubSpot account ID in a `portalId` query parameter.
     *
     * @param string $tableIDOrName the ID or name of the table to return
     * @param bool $archived Set this to `true` to return details for an archived table. Defaults to `false`.
     * @param bool $includeForeignIDs set this to `true` to populate foreign ID values in the result
     * @param bool $isGetLocalizedSchema indicates whether to retrieve the localized schema for the tables
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $tableIDOrName,
        ?bool $archived = null,
        ?bool $includeForeignIDs = null,
        ?bool $isGetLocalizedSchema = null,
        RequestOptions|array|null $requestOptions = null,
    ): HubDBTableV3 {
        $params = Util::removeNulls(
            [
                'archived' => $archived,
                'includeForeignIDs' => $includeForeignIDs,
                'isGetLocalizedSchema' => $isGetLocalizedSchema,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($tableIDOrName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the details for the draft version of a specific HubDB table. This will include the definitions for the columns in the table and the number of rows in the table.
     *
     * @param string $tableIDOrName the ID or name of the table to return
     * @param bool $archived Set this to `true` to return an archived table. Defaults to `false`.
     * @param bool $includeForeignIDs set this to `true` to populate foreign ID values in the result
     * @param bool $isGetLocalizedSchema indicates whether to retrieve the localized schema for the table
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getDraft(
        string $tableIDOrName,
        ?bool $archived = null,
        ?bool $includeForeignIDs = null,
        ?bool $isGetLocalizedSchema = null,
        RequestOptions|array|null $requestOptions = null,
    ): HubDBTableV3 {
        $params = Util::removeNulls(
            [
                'archived' => $archived,
                'includeForeignIDs' => $includeForeignIDs,
                'isGetLocalizedSchema' => $isGetLocalizedSchema,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getDraft($tableIDOrName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Import the contents of a CSV file into an existing HubDB table. The data will always be imported into the draft version of the table. Use the `/publish` endpoint to push these changes to the published version.
     * This endpoint takes a multi-part POST request. The first part will be a set of JSON-formatted options for the import and you can specify this with the name as `config`.  The second part will be the CSV file you want to import and you can specify this with the name as `file`. Refer the [overview section](https://developers.hubspot.com/docs/api/cms/hubdb#importing-tables) to check the details and format of the JSON-formatted options for the import.
     *
     * @param string $tableIDOrName the ID of the destination table where data will be imported
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function importDraft(
        string $tableIDOrName,
        ?string $config = null,
        ?string $file = null,
        RequestOptions|array|null $requestOptions = null,
    ): ImportResult {
        $params = Util::removeNulls(['config' => $config, 'file' => $file]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->importDraft($tableIDOrName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the details for each draft table defined in the specified account, including column definitions.
     *
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived Specifies whether to return archived tables. Defaults to `false`.
     * @param string $contentType specifies the content type for the response
     * @param \DateTimeInterface $createdAfter only return tables created after the specified time
     * @param \DateTimeInterface $createdAt only return tables created at exactly the specified time
     * @param \DateTimeInterface $createdBefore only return tables created before the specified time
     * @param bool $isGetLocalizedSchema indicates whether to retrieve the localized schema
     * @param int $limit The maximum number of results to return. Default is 1000.
     * @param list<string> $sort Specifies which fields to use for sorting results. Valid fields are `name`, `createdAt`, `updatedAt`, `createdBy`, `updatedBy`. `createdAt` will be used by default.
     * @param \DateTimeInterface $updatedAfter only return tables last updated after the specified time
     * @param \DateTimeInterface $updatedAt only return tables last updated at exactly the specified time
     * @param \DateTimeInterface $updatedBefore only return tables last updated before the specified time
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<HubDBTableV3>
     *
     * @throws APIException
     */
    public function listDraft(
        ?string $after = null,
        ?bool $archived = null,
        ?string $contentType = null,
        ?\DateTimeInterface $createdAfter = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $createdBefore = null,
        ?bool $isGetLocalizedSchema = null,
        ?int $limit = null,
        ?array $sort = null,
        ?\DateTimeInterface $updatedAfter = null,
        ?\DateTimeInterface $updatedAt = null,
        ?\DateTimeInterface $updatedBefore = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            [
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
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listDraft(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Publishes the table by copying the data and table schema changes from draft version to the published version, meaning any website pages using data from the table will be updated.
     *
     * @param string $tableIDOrName the ID or name of the table to publish
     * @param bool $includeForeignIDs set this to `true` to populate foreign ID values in the response
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function publishDraft(
        string $tableIDOrName,
        ?bool $includeForeignIDs = null,
        RequestOptions|array|null $requestOptions = null,
    ): HubDBTableV3 {
        $params = Util::removeNulls(['includeForeignIDs' => $includeForeignIDs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->publishDraft($tableIDOrName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Replaces the data in the draft version of the table with values from the published version. Any unpublished changes in the draft will be lost after this call is made.
     *
     * @param string $tableIDOrName the ID or name of the table to reset
     * @param bool $includeForeignIDs set this to `true` to populate foreign ID values in the response
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function resetDraft(
        string $tableIDOrName,
        ?bool $includeForeignIDs = null,
        RequestOptions|array|null $requestOptions = null,
    ): HubDBTableV3 {
        $params = Util::removeNulls(['includeForeignIDs' => $includeForeignIDs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->resetDraft($tableIDOrName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Unpublishes the table, meaning any website pages using data from the table will not render any data.
     *
     * @param string $tableIDOrName the ID or name of the table to publish
     * @param bool $includeForeignIDs set this to `true` to populate foreign ID values in the response
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function unpublish(
        string $tableIDOrName,
        ?bool $includeForeignIDs = null,
        RequestOptions|array|null $requestOptions = null,
    ): HubDBTableV3 {
        $params = Util::removeNulls(['includeForeignIDs' => $includeForeignIDs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->unpublish($tableIDOrName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an existing HubDB table. You can use this endpoint to add or remove columns to the table as well as restore an archived table. Tables updated using the endpoint will only modify the draft verion of the table. Use the `/publish` endpoint to push all the changes to the published version. To restore a table, include the query parameter `archived=true` and `"archived": false` in the json body.
     * **Note:** You need to include all the columns in the input when you are adding/removing/updating a column. If you do not include an already existing column in the request, it will be deleted.
     *
     * @param string $tableIDOrName path param: The ID or name of the table to update
     * @param bool $allowChildTables Body param: Specifies whether child tables can be created
     * @param bool $allowPublicAPIAccess Body param: Specifies whether the table can be read by public without authorization
     * @param list<ColumnRequest|ColumnRequestShape> $columns Body param: List of columns in the table
     * @param array<string,int> $dynamicMetaTags Body param: Specifies the key value pairs of the [metadata fields](https://developers.hubspot.com/docs/cms/guides/dynamic-pages/hubdb#dynamic-pages) with the associated column IDs.
     * @param bool $enableChildTablePages Body param: Specifies creation of multi-level dynamic pages using child tables
     * @param string $label Body param: Label of the table
     * @param string $name Body param: Name of the table
     * @param bool $useForPages Body param: Specifies whether the table can be used for creation of dynamic pages
     * @param bool $archived Query param: Specifies whether to return archived tables. Defaults to `false`.
     * @param bool $includeForeignIDs query param: Set this to `true` to populate foreign ID values in the result
     * @param bool $isGetLocalizedSchema query param: Indicates whether to retrieve the localized schema for the table
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateDraft(
        string $tableIDOrName,
        bool $allowChildTables,
        bool $allowPublicAPIAccess,
        array $columns,
        array $dynamicMetaTags,
        bool $enableChildTablePages,
        string $label,
        string $name,
        bool $useForPages,
        ?bool $archived = null,
        ?bool $includeForeignIDs = null,
        ?bool $isGetLocalizedSchema = null,
        RequestOptions|array|null $requestOptions = null,
    ): HubDBTableV3 {
        $params = Util::removeNulls(
            [
                'allowChildTables' => $allowChildTables,
                'allowPublicAPIAccess' => $allowPublicAPIAccess,
                'columns' => $columns,
                'dynamicMetaTags' => $dynamicMetaTags,
                'enableChildTablePages' => $enableChildTablePages,
                'label' => $label,
                'name' => $name,
                'useForPages' => $useForPages,
                'archived' => $archived,
                'includeForeignIDs' => $includeForeignIDs,
                'isGetLocalizedSchema' => $isGetLocalizedSchema,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateDraft($tableIDOrName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
