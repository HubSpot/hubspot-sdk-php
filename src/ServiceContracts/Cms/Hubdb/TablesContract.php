<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Hubdb;

use HubspotSDK\Cms\Hubdb\ColumnRequest;
use HubspotSDK\Cms\Hubdb\HubDBTableV3;
use HubspotSDK\Cms\Hubdb\ImportResult;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type ColumnRequestShape from \HubspotSDK\Cms\Hubdb\ColumnRequest
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface TablesContract
{
    /**
     * @api
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
    ): HubDBTableV3;

    /**
     * @api
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
    ): Page;

    /**
     * @api
     *
     * @param string $tableIDOrName the ID or name of the table to archive
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $tableIDOrName,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
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
    ): HubDBTableV3;

    /**
     * @api
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
    ): mixed;

    /**
     * @api
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
    ): string;

    /**
     * @api
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
    ): string;

    /**
     * @api
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
    ): HubDBTableV3;

    /**
     * @api
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
    ): HubDBTableV3;

    /**
     * @api
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
    ): ImportResult;

    /**
     * @api
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
    ): Page;

    /**
     * @api
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
    ): HubDBTableV3;

    /**
     * @api
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
    ): HubDBTableV3;

    /**
     * @api
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
    ): HubDBTableV3;

    /**
     * @api
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
    ): HubDBTableV3;
}
