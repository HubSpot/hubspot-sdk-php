<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Hubdb;

use HubspotSDK\Cms\Hubdb\HubDBTableRowV3;
use HubspotSDK\Cms\Hubdb\Variant;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type VariantShape from \HubspotSDK\Cms\Hubdb\Variant
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface RowsContract
{
    /**
     * @api
     *
     * @param string $tableIDOrName the ID or name of the target table
     * @param int $childTableID Specifies the value for the column child table id
     * @param array<string,Variant|VariantShape> $values List of key value pairs with the column name and column value
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
     * @param string $tableIDOrName the ID or name of the table to query
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived specifies whether to include archived rows in the response
     * @param int $limit The maximum number of results to return. Default is `1000`.
     * @param int $offset the number of rows to skip before starting to return results
     * @param list<string> $properties specify the column names to get results containing only the required columns instead of all column details
     * @param list<string> $sort Specifies the column names to sort the results by. See the above description for more details.
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
     * @param string $rowID Path param: The ID of the row
     * @param string $tableIDOrName Path param: The ID or name of the table
     * @param string $name query param: The name for the cloned row
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
     * @param string $rowID The ID of the row
     * @param string $tableIDOrName The ID or name of the table
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
     * @param string $rowID Path param: The ID of the row
     * @param string $tableIDOrName Path param: The ID or name of the table
     * @param bool $archived Query param: Specifies whether to return an archived row. Defaults to `false`.
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
     * @param string $rowID Path param: The ID of the row
     * @param string $tableIDOrName Path param: The ID or name of the table
     * @param bool $archived Query param: Set this to `true` to return an archived row. Defaults to `false`.
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
     * @param string $tableIDOrName the ID or name of the table to query
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived Specifies whether to return archived rows. Defaults to `false`.
     * @param int $limit The maximum number of results to return. Default is `1000`.
     * @param int $offset the number of rows to skip before starting to return results
     * @param list<string> $properties Specify the column names to get results containing only the required columns instead of all column details. If you want to include multiple columns in the result, use this query param as many times.
     * @param list<string> $sort specifies the column names to sort the results by
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<mixed>
     *
     * @throws APIException
     */
    public function listDraft(
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
     * @param string $rowID Path param: The ID of the row
     * @param string $tableIDOrName Path param: The ID or name of the table
     * @param int $childTableID Body param: Specifies the value for the column child table id
     * @param int $displayIndex Body param
     * @param array<string,Variant|VariantShape> $values Body param: List of key value pairs with the column name and column value
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
     * @param string $rowID Path param: The ID of the row
     * @param string $tableIDOrName Path param: The ID or name of the table
     * @param int $childTableID Body param: Specifies the value for the column child table id
     * @param int $displayIndex Body param
     * @param array<string,Variant|VariantShape> $values Body param: List of key value pairs with the column name and column value
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
