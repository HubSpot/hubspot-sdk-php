<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Hubdb;

use HubspotSDK\Client;
use HubspotSDK\Cms\Hubdb\HubDBTableRowV3;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Hubdb\RowsContract;
use HubspotSDK\Services\Cms\Hubdb\Rows\BatchService;

final class RowsService implements RowsContract
{
    /**
     * @api
     */
    public RowsRawService $raw;

    /**
     * @api
     */
    public BatchService $batch;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RowsRawService($client);
        $this->batch = new BatchService($client);
    }

    /**
     * @api
     *
     * Add a new row to a HubDB table. New rows will be added to the draft version of the table. Use the `/publish` endpoint to push these changes to published version.
     *
     * @param string $tableIDOrName the ID or name of the target table
     * @param int $childTableID Specifies the value for the column child table id
     * @param array<string,array<string,mixed>> $values List of key value pairs with the column name and column value
     * @param string $name Specifies the value for `hs_name` column, which will be used as title in the dynamic pages
     * @param string $path Specifies the value for `hs_path` column, which will be used as slug in the dynamic pages
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
        ?RequestOptions $requestOptions = null,
    ): HubDBTableRowV3 {
        $params = [
            'childTableID' => $childTableID,
            'displayIndex' => $displayIndex,
            'values' => $values,
            'name' => $name,
            'path' => $path,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     * @param string $tableIDOrName the ID or name of the table to query
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived specifies whether to include archived rows in the response
     * @param int $limit The maximum number of results to return. Default is `1000`.
     * @param int $offset the number of rows to skip before starting to return results
     * @param list<string> $properties specify the column names to get results containing only the required columns instead of all column details
     * @param list<string> $sort Specifies the column names to sort the results by. See the above description for more details.
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
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($tableIDOrName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Clones a single row in the draft version of a table.
     *
     * @param string $rowID Path param: The ID of the row
     * @param string $tableIDOrName Path param: The ID or name of the table
     * @param string $name query param: The name for the cloned row
     *
     * @throws APIException
     */
    public function cloneDraft(
        string $rowID,
        string $tableIDOrName,
        ?string $name = null,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableRowV3 {
        $params = ['tableIDOrName' => $tableIDOrName, 'name' => $name];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->cloneDraft($rowID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Permanently deletes a row from a table's draft version.
     *
     * @param string $rowID The ID of the row
     * @param string $tableIDOrName The ID or name of the table
     *
     * @throws APIException
     */
    public function deleteDraft(
        string $rowID,
        string $tableIDOrName,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['tableIDOrName' => $tableIDOrName];

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
     * @param string $rowID Path param: The ID of the row
     * @param string $tableIDOrName Path param: The ID or name of the table
     * @param bool $archived Query param: Specifies whether to return an archived row. Defaults to `false`.
     *
     * @throws APIException
     */
    public function get(
        string $rowID,
        string $tableIDOrName,
        ?bool $archived = null,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableRowV3 {
        $params = ['tableIDOrName' => $tableIDOrName, 'archived' => $archived];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($rowID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a single row by ID from a table's draft version.
     *
     * @param string $rowID Path param: The ID of the row
     * @param string $tableIDOrName Path param: The ID or name of the table
     * @param bool $archived Query param: Set this to `true` to return an archived row. Defaults to `false`.
     *
     * @throws APIException
     */
    public function getDraft(
        string $rowID,
        string $tableIDOrName,
        ?bool $archived = null,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableRowV3 {
        $params = ['tableIDOrName' => $tableIDOrName, 'archived' => $archived];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getDraft($rowID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns rows in the draft version of the specified table. Row results can be filtered and sorted. Filtering and sorting options will be sent as query parameters to the API request. For example, by adding the query parameters `column1__gt=5&sort=-column1`, API returns the rows with values for column `column1` greater than 5 and in the descending order of `column1` values. Refer to the [overview section](https://developers.hubspot.com/docs/api/cms/hubdb#filtering-and-sorting-table-rows) for detailed filtering and sorting options.
     *
     * @param string $tableIDOrName the ID or name of the table to query
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived Specifies whether to return archived rows. Defaults to `false`.
     * @param int $limit The maximum number of results to return. Default is `1000`.
     * @param int $offset the number of rows to skip before starting to return results
     * @param list<string> $properties Specify the column names to get results containing only the required columns instead of all column details. If you want to include multiple columns in the result, use this query param as many times.
     * @param list<string> $sort specifies the column names to sort the results by
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
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listDraft($tableIDOrName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Replace a single row in the draft version of a table. All column values must be specified. If a column has a value in the target table and this request doesn't define that value, it will be deleted.
     * See the "Create a row" endpoint for instructions on how to format the JSON row definitions.
     *
     * @param string $rowID Path param: The ID of the row
     * @param string $tableIDOrName Path param: The ID or name of the table
     * @param int $childTableID Body param: Specifies the value for the column child table id
     * @param int $displayIndex Body param:
     * @param array<string,array<string,mixed>> $values Body param: List of key value pairs with the column name and column value
     * @param string $name Body param: Specifies the value for `hs_name` column, which will be used as title in the dynamic pages
     * @param string $path Body param: Specifies the value for `hs_path` column, which will be used as slug in the dynamic pages
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
        ?RequestOptions $requestOptions = null,
    ): HubDBTableRowV3 {
        $params = [
            'tableIDOrName' => $tableIDOrName,
            'childTableID' => $childTableID,
            'displayIndex' => $displayIndex,
            'values' => $values,
            'name' => $name,
            'path' => $path,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->replaceDraft($rowID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Sparse updates a single row in the table's draft version.
     * All the column values need not be specified. Only the columns or fields that needs to be modified can be specified.
     * See the "Create a row" endpoint for instructions on how to format the JSON row definitions.
     *
     * @param string $rowID Path param: The ID of the row
     * @param string $tableIDOrName Path param: The ID or name of the table
     * @param int $childTableID Body param: Specifies the value for the column child table id
     * @param int $displayIndex Body param:
     * @param array<string,array<string,mixed>> $values Body param: List of key value pairs with the column name and column value
     * @param string $name Body param: Specifies the value for `hs_name` column, which will be used as title in the dynamic pages
     * @param string $path Body param: Specifies the value for `hs_path` column, which will be used as slug in the dynamic pages
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
        ?RequestOptions $requestOptions = null,
    ): HubDBTableRowV3 {
        $params = [
            'tableIDOrName' => $tableIDOrName,
            'childTableID' => $childTableID,
            'displayIndex' => $displayIndex,
            'values' => $values,
            'name' => $name,
            'path' => $path,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateDraft($rowID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
