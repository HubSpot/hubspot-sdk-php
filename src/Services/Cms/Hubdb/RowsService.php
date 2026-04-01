<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Hubdb;

use HubspotSDK\Client;
use HubspotSDK\Cms\Hubdb\BatchResponseHubDBTableRowV3;
use HubspotSDK\Cms\Hubdb\HubDBTableRowBatchCloneRequest;
use HubspotSDK\Cms\Hubdb\HubDBTableRowV3;
use HubspotSDK\Cms\Hubdb\HubDBTableRowV3BatchUpdateRequest;
use HubspotSDK\Cms\Hubdb\HubDBTableRowV3Request;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Hubdb\RowsContract;

/**
 * @phpstan-import-type HubDBTableRowBatchCloneRequestShape from \HubspotSDK\Cms\Hubdb\HubDBTableRowBatchCloneRequest
 * @phpstan-import-type HubDBTableRowV3RequestShape from \HubspotSDK\Cms\Hubdb\HubDBTableRowV3Request
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 * @phpstan-import-type HubDBTableRowV3BatchUpdateRequestShape from \HubspotSDK\Cms\Hubdb\HubDBTableRowV3BatchUpdateRequest
 */
final class RowsService implements RowsContract
{
    /**
     * @api
     */
    public RowsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RowsRawService($client);
    }

    /**
     * @api
     *
     * Add a new row to a HubDB table. New rows will be added to the draft version of the table. Use the `/publish` endpoint to push these changes to published version.
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
    ): HubDBTableRowV3 {
        $params = Util::removeNulls(
            [
                'childTableID' => $childTableID,
                'displayIndex' => $displayIndex,
                'values' => $values,
                'name' => $name,
                'path' => $path,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($tableIDOrName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a set of rows in the published version of the specified table. Row results can be filtered and sorted. Filtering and sorting options will be sent as query parameters to the API request. For example, by adding the query parameters `column1__gt=5&sort=-column1`, API returns the rows with values for column `column1` greater than 5 and in the descending order of `column1` values. Refer to the [overview section](https://developers.hubspot.com/docs/api/cms/hubdb#filtering-and-sorting-table-rows) for detailed filtering and sorting options.
     * **Note:** This endpoint can be accessed without any authentication, if the table is set to be allowed for public access.
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
    ): Page {
        $params = Util::removeNulls(
            [
                'after' => $after,
                'archived' => $archived,
                'limit' => $limit,
                'offset' => $offset,
                'properties' => $properties,
                'sort' => $sort,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($tableIDOrName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Clones rows in the draft version of the specified table, given a set of row ids. Maximum of 100 row ids per call.
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
    ): BatchResponseHubDBTableRowV3 {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->cloneBatch($tableIDOrName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Clones a single row in the draft version of a table.
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
    ): HubDBTableRowV3 {
        $params = Util::removeNulls(
            ['tableIDOrName' => $tableIDOrName, 'name' => $name]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->cloneDraft($rowID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Creates rows in the draft version of the specified table, given an array of row objects. Maximum of 100 row object per call. See the overview section for more details with an example.
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
    ): BatchResponseHubDBTableRowV3 {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createBatch($tableIDOrName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Permanently deletes a row from a table's draft version.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteDraft(
        string $rowID,
        string $tableIDOrName,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['tableIDOrName' => $tableIDOrName]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteDraft($rowID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a single row by ID from the published version of a table.
     * **Note:** This endpoint can be accessed without any authentication, if the table is set to be allowed for public access.
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
    ): HubDBTableRowV3 {
        $params = Util::removeNulls(
            ['tableIDOrName' => $tableIDOrName, 'archived' => $archived]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($rowID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns rows in the published version of the specified table, given a set of row IDs.
     * **Note:** This endpoint can be accessed without any authentication if the table is set to be allowed for public access.
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
    ): BatchResponseHubDBTableRowV3 {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getBatch($tableIDOrName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a single row by ID from a table's draft version.
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
    ): HubDBTableRowV3 {
        $params = Util::removeNulls(
            ['tableIDOrName' => $tableIDOrName, 'archived' => $archived]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getDraft($rowID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns rows in the draft version of the specified table, given a set of row IDs.
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
    ): BatchResponseHubDBTableRowV3 {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getDraftBatch($tableIDOrName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Permanently delete rows from the draft version of a table, given a set of row IDs. Maximum of 100 row IDs per call.
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
    ): mixed {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->purgeBatch($tableIDOrName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Replaces multiple rows as a batch in the draft version of the table, with a maximum of 100 rows per call. See the endpoint `PUT /tables/{tableIdOrName}/rows/{rowId}/draft` for details on updating a single row.
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
    ): BatchResponseHubDBTableRowV3 {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->replaceBatch($tableIDOrName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Replace a single row in the draft version of a table. All column values must be specified. If a column has a value in the target table and this request doesn't define that value, it will be deleted.
     * See the "Create a row" endpoint for instructions on how to format the JSON row definitions.
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
    ): HubDBTableRowV3 {
        $params = Util::removeNulls(
            [
                'tableIDOrName' => $tableIDOrName,
                'childTableID' => $childTableID,
                'displayIndex' => $displayIndex,
                'values' => $values,
                'name' => $name,
                'path' => $path,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->replaceDraft($rowID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates multiple rows as a batch in the draft version of the table, with a maximum of 100 rows per call. See the endpoint `PATCH /tables/{tableIdOrName}/rows/{rowId}/draft` for details on updating a single row.
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
    ): BatchResponseHubDBTableRowV3 {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateBatch($tableIDOrName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Partially update a single row in the table's draft version.
     * All the column values need not be specified. Only the columns or fields that needs to be modified can be specified.
     * See the "Create a row" endpoint for instructions on how to format the JSON row definitions.
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
    ): HubDBTableRowV3 {
        $params = Util::removeNulls(
            [
                'tableIDOrName' => $tableIDOrName,
                'childTableID' => $childTableID,
                'displayIndex' => $displayIndex,
                'values' => $values,
                'name' => $name,
                'path' => $path,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateDraft($rowID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
