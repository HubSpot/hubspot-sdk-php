<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Cms\Hubdb;

use HubSpotSDK\Cms\Hubdb\ColumnRequest;
use HubSpotSDK\Cms\Hubdb\HubDBTableV3;
use HubSpotSDK\Cms\Hubdb\ImportResult;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\FileParam;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type ColumnRequestShape from \HubSpotSDK\Cms\Hubdb\ColumnRequest
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $sort
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
     * @param bool $copyRows Specifies whether to copy the rows during clone
     * @param bool $isHubSpotDefined indicates whether the table is defined by HubSpot
     * @param string $newLabel The new label for the cloned table
     * @param string $newName The new name for the cloned table
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function cloneDraft(
        string $tableIDOrName,
        bool $copyRows,
        bool $isHubSpotDefined,
        ?string $newLabel = null,
        ?string $newName = null,
        RequestOptions|array|null $requestOptions = null,
    ): HubDBTableV3;

    /**
     * @api
     *
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
     * @param bool $archived whether to return only results that have been archived
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
     * @param bool $archived whether to return only results that have been archived
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function importDraft(
        string $tableIDOrName,
        ?string $config = null,
        string|FileParam|null $file = null,
        RequestOptions|array|null $requestOptions = null,
    ): ImportResult;

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $sort
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
     * @param string $tableIDOrName Path param
     * @param bool $allowChildTables Body param: Specifies whether child tables can be created
     * @param bool $allowPublicAPIAccess Body param: Specifies whether the table can be read by public without authorization
     * @param list<ColumnRequest|ColumnRequestShape> $columns Body param: List of columns in the table
     * @param array<string,int> $dynamicMetaTags Body param: Specifies the key value pairs of the [metadata fields](https://developers.hubspot.com/docs/cms/guides/dynamic-pages/hubdb#dynamic-pages) with the associated column IDs.
     * @param bool $enableChildTablePages Body param: Specifies creation of multi-level dynamic pages using child tables
     * @param string $label Body param: Label of the table
     * @param string $name Body param: Name of the table
     * @param bool $useForPages Body param: Specifies whether the table can be used for creation of dynamic pages
     * @param bool $archived query param: Whether to return only results that have been archived
     * @param bool $includeForeignIDs Query param
     * @param bool $isGetLocalizedSchema Query param
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
