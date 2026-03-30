<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Hubdb;

use HubspotSDK\Cms\Hubdb\BatchResponseHubDBTableRowV3;
use HubspotSDK\Cms\Hubdb\HubDBTableRowBatchCloneRequest;
use HubspotSDK\Cms\Hubdb\HubDBTableRowV3;
use HubspotSDK\Cms\Hubdb\HubDBTableRowV3BatchUpdateRequest;
use HubspotSDK\Cms\Hubdb\HubDBTableRowV3Request;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type HubDBTableRowBatchCloneRequestShape from \HubspotSDK\Cms\Hubdb\HubDBTableRowBatchCloneRequest
 * @phpstan-import-type HubDBTableRowV3RequestShape from \HubspotSDK\Cms\Hubdb\HubDBTableRowV3Request
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 * @phpstan-import-type HubDBTableRowV3BatchUpdateRequestShape from \HubspotSDK\Cms\Hubdb\HubDBTableRowV3BatchUpdateRequest
 */
interface RowsContract
{
    /**
     * @api
     *
     * @param int $childTableID Specifies the value for the column child table id
     * @param int $displayIndex the index position for displaying the row within the table
     * @param array<string,mixed> $values List of key value pairs with the column name and column value
     * @param string $name Specifies the value for `hs_name` column, which will be used as title in the dynamic pages
     * @param string $path Specifies the value for `hs_path` column, which will be used as slug in the dynamic pages
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $tableIDOrName,
        int $childTableID,
        int $displayIndex,
        array $values,
        ?string $name = null,
        ?string $path = null,
        RequestOptions|array|null $requestOptions = null,
    ): HubDBTableRowV3;

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $properties
     * @param list<string> $sort
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<mixed>
     *
     * @throws APIException
     */
    public function list(
        string $tableIDOrName,
        ?string $after = null,
        ?bool $archived = null,
        ?int $limit = null,
        ?int $offset = null,
        ?array $properties = null,
        ?array $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param list<HubDBTableRowBatchCloneRequest|HubDBTableRowBatchCloneRequestShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function cloneBatch(
        string $tableIDOrName,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param string $rowID Path param
     * @param string $tableIDOrName Path param
     * @param string $name Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function cloneDraft(
        string $rowID,
        string $tableIDOrName,
        ?string $name = null,
        RequestOptions|array|null $requestOptions = null,
    ): HubDBTableRowV3;

    /**
     * @api
     *
     * @param list<HubDBTableRowV3Request|HubDBTableRowV3RequestShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createBatch(
        string $tableIDOrName,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteDraft(
        string $rowID,
        string $tableIDOrName,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $rowID Path param
     * @param string $tableIDOrName Path param
     * @param bool $archived query param: Whether to return only results that have been archived
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $rowID,
        string $tableIDOrName,
        ?bool $archived = null,
        RequestOptions|array|null $requestOptions = null,
    ): HubDBTableRowV3;

    /**
     * @api
     *
     * @param list<string> $inputs strings to input
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getBatch(
        string $tableIDOrName,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param string $rowID Path param
     * @param string $tableIDOrName Path param
     * @param bool $archived query param: Whether to return only results that have been archived
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getDraft(
        string $rowID,
        string $tableIDOrName,
        ?bool $archived = null,
        RequestOptions|array|null $requestOptions = null,
    ): HubDBTableRowV3;

    /**
     * @api
     *
     * @param list<string> $inputs strings to input
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getDraftBatch(
        string $tableIDOrName,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param list<string> $inputs strings to input
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function purgeBatch(
        string $tableIDOrName,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param list<HubDBTableRowV3BatchUpdateRequest|HubDBTableRowV3BatchUpdateRequestShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function replaceBatch(
        string $tableIDOrName,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param string $rowID Path param
     * @param string $tableIDOrName Path param
     * @param int $childTableID Body param: Specifies the value for the column child table id
     * @param int $displayIndex body param: The index position for displaying the row within the table
     * @param array<string,mixed> $values Body param: List of key value pairs with the column name and column value
     * @param string $name Body param: Specifies the value for `hs_name` column, which will be used as title in the dynamic pages
     * @param string $path Body param: Specifies the value for `hs_path` column, which will be used as slug in the dynamic pages
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function replaceDraft(
        string $rowID,
        string $tableIDOrName,
        int $childTableID,
        int $displayIndex,
        array $values,
        ?string $name = null,
        ?string $path = null,
        RequestOptions|array|null $requestOptions = null,
    ): HubDBTableRowV3;

    /**
     * @api
     *
     * @param list<HubDBTableRowV3BatchUpdateRequest|HubDBTableRowV3BatchUpdateRequestShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateBatch(
        string $tableIDOrName,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param string $rowID Path param
     * @param string $tableIDOrName Path param
     * @param int $childTableID Body param: Specifies the value for the column child table id
     * @param int $displayIndex body param: The index position for displaying the row within the table
     * @param array<string,mixed> $values Body param: List of key value pairs with the column name and column value
     * @param string $name Body param: Specifies the value for `hs_name` column, which will be used as title in the dynamic pages
     * @param string $path Body param: Specifies the value for `hs_path` column, which will be used as slug in the dynamic pages
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateDraft(
        string $rowID,
        string $tableIDOrName,
        int $childTableID,
        int $displayIndex,
        array $values,
        ?string $name = null,
        ?string $path = null,
        RequestOptions|array|null $requestOptions = null,
    ): HubDBTableRowV3;
}
