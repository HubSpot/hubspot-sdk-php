<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Hubdb;

use HubspotSDK\Client;
use HubspotSDK\Cms\Hubdb\HubDBTableRowV3;
use HubspotSDK\Cms\Hubdb\Rows\RowCloneDraftParams;
use HubspotSDK\Cms\Hubdb\Rows\RowCreateParams;
use HubspotSDK\Cms\Hubdb\Rows\RowDeleteDraftParams;
use HubspotSDK\Cms\Hubdb\Rows\RowGetDraftParams;
use HubspotSDK\Cms\Hubdb\Rows\RowGetParams;
use HubspotSDK\Cms\Hubdb\Rows\RowListDraftParams;
use HubspotSDK\Cms\Hubdb\Rows\RowListParams;
use HubspotSDK\Cms\Hubdb\Rows\RowReplaceDraftParams;
use HubspotSDK\Cms\Hubdb\Rows\RowUpdateDraftParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Hubdb\RowsRawContract;

final class RowsRawService implements RowsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Add a new row to a HubDB table. New rows will be added to the draft version of the table. Use the `/publish` endpoint to push these changes to published version.
     *
     * @param string $tableIDOrName the ID or name of the target table
     * @param array{
     *   childTableID: int,
     *   displayIndex: int,
     *   values: array<string,array<string,mixed>>,
     *   name?: string,
     *   path?: string,
     * }|RowCreateParams $params
     *
     * @return BaseResponse<HubDBTableRowV3>
     *
     * @throws APIException
     */
    public function create(
        string $tableIDOrName,
        array|RowCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RowCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * Returns a set of rows in the published version of the specified table. Row results can be filtered and sorted. Filtering and sorting options will be sent as query parameters to the API request. For example, by adding the query parameters `column1__gt=5&sort=-column1`, API returns the rows with values for column `column1` greater than 5 and in the descending order of `column1` values. Refer to the [overview section](https://developers.hubspot.com/docs/api/cms/hubdb#filtering-and-sorting-table-rows) for detailed filtering and sorting options.
     * **Note:** This endpoint can be accessed without any authentication, if the table is set to be allowed for public access.
     *
     * @param string $tableIDOrName the ID or name of the table to query
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   limit?: int,
     *   offset?: int,
     *   properties?: list<string>,
     *   sort?: list<string>,
     * }|RowListParams $params
     *
     * @return BaseResponse<Page<mixed>>
     *
     * @throws APIException
     */
    public function list(
        string $tableIDOrName,
        array|RowListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RowListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * Clones a single row in the draft version of a table.
     *
     * @param string $rowID Path param: The ID of the row
     * @param array{tableIDOrName: string, name?: string}|RowCloneDraftParams $params
     *
     * @return BaseResponse<HubDBTableRowV3>
     *
     * @throws APIException
     */
    public function cloneDraft(
        string $rowID,
        array|RowCloneDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RowCloneDraftParams::parseRequest(
            $params,
            $requestOptions,
        );
        $tableIDOrName = $parsed['tableIDOrName'];
        unset($parsed['tableIDOrName']);

        // @phpstan-ignore-next-line return.type
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
     * Permanently deletes a row from a table's draft version.
     *
     * @param string $rowID The ID of the row
     * @param array{tableIDOrName: string}|RowDeleteDraftParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteDraft(
        string $rowID,
        array|RowDeleteDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RowDeleteDraftParams::parseRequest(
            $params,
            $requestOptions,
        );
        $tableIDOrName = $parsed['tableIDOrName'];
        unset($parsed['tableIDOrName']);

        // @phpstan-ignore-next-line return.type
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
     * Get a single row by ID from the published version of a table.
     * **Note:** This endpoint can be accessed without any authentication, if the table is set to be allowed for public access.
     *
     * @param string $rowID Path param: The ID of the row
     * @param array{tableIDOrName: string, archived?: bool}|RowGetParams $params
     *
     * @return BaseResponse<HubDBTableRowV3>
     *
     * @throws APIException
     */
    public function get(
        string $rowID,
        array|RowGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RowGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $tableIDOrName = $parsed['tableIDOrName'];
        unset($parsed['tableIDOrName']);

        // @phpstan-ignore-next-line return.type
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
     * Get a single row by ID from a table's draft version.
     *
     * @param string $rowID Path param: The ID of the row
     * @param array{tableIDOrName: string, archived?: bool}|RowGetDraftParams $params
     *
     * @return BaseResponse<HubDBTableRowV3>
     *
     * @throws APIException
     */
    public function getDraft(
        string $rowID,
        array|RowGetDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RowGetDraftParams::parseRequest(
            $params,
            $requestOptions,
        );
        $tableIDOrName = $parsed['tableIDOrName'];
        unset($parsed['tableIDOrName']);

        // @phpstan-ignore-next-line return.type
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
     * Returns rows in the draft version of the specified table. Row results can be filtered and sorted. Filtering and sorting options will be sent as query parameters to the API request. For example, by adding the query parameters `column1__gt=5&sort=-column1`, API returns the rows with values for column `column1` greater than 5 and in the descending order of `column1` values. Refer to the [overview section](https://developers.hubspot.com/docs/api/cms/hubdb#filtering-and-sorting-table-rows) for detailed filtering and sorting options.
     *
     * @param string $tableIDOrName the ID or name of the table to query
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   limit?: int,
     *   offset?: int,
     *   properties?: list<string>,
     *   sort?: list<string>,
     * }|RowListDraftParams $params
     *
     * @return BaseResponse<Page<mixed>>
     *
     * @throws APIException
     */
    public function listDraft(
        string $tableIDOrName,
        array|RowListDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RowListDraftParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/hubdb/tables/%1$s/rows/draft', $tableIDOrName],
            query: $parsed,
            options: $options,
            convert: 'mixed',
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Replace a single row in the draft version of a table. All column values must be specified. If a column has a value in the target table and this request doesn't define that value, it will be deleted.
     * See the "Create a row" endpoint for instructions on how to format the JSON row definitions.
     *
     * @param string $rowID Path param: The ID of the row
     * @param array{
     *   tableIDOrName: string,
     *   childTableID: int,
     *   displayIndex: int,
     *   values: array<string,array<string,mixed>>,
     *   name?: string,
     *   path?: string,
     * }|RowReplaceDraftParams $params
     *
     * @return BaseResponse<HubDBTableRowV3>
     *
     * @throws APIException
     */
    public function replaceDraft(
        string $rowID,
        array|RowReplaceDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RowReplaceDraftParams::parseRequest(
            $params,
            $requestOptions,
        );
        $tableIDOrName = $parsed['tableIDOrName'];
        unset($parsed['tableIDOrName']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: [
                'cms/v3/hubdb/tables/%1$s/rows/%2$s/draft', $tableIDOrName, $rowID,
            ],
            body: (object) array_diff_key($parsed, array_flip(['tableIDOrName'])),
            options: $options,
            convert: HubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Sparse updates a single row in the table's draft version.
     * All the column values need not be specified. Only the columns or fields that needs to be modified can be specified.
     * See the "Create a row" endpoint for instructions on how to format the JSON row definitions.
     *
     * @param string $rowID Path param: The ID of the row
     * @param array{
     *   tableIDOrName: string,
     *   childTableID: int,
     *   displayIndex: int,
     *   values: array<string,array<string,mixed>>,
     *   name?: string,
     *   path?: string,
     * }|RowUpdateDraftParams $params
     *
     * @return BaseResponse<HubDBTableRowV3>
     *
     * @throws APIException
     */
    public function updateDraft(
        string $rowID,
        array|RowUpdateDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RowUpdateDraftParams::parseRequest(
            $params,
            $requestOptions,
        );
        $tableIDOrName = $parsed['tableIDOrName'];
        unset($parsed['tableIDOrName']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: [
                'cms/v3/hubdb/tables/%1$s/rows/%2$s/draft', $tableIDOrName, $rowID,
            ],
            body: (object) array_diff_key($parsed, array_flip(['tableIDOrName'])),
            options: $options,
            convert: HubDBTableRowV3::class,
        );
    }
}
