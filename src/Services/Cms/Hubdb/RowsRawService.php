<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Hubdb;

use HubspotSDK\Client;
use HubspotSDK\Cms\Hubdb\BatchResponseHubDBTableRowV3;
use HubspotSDK\Cms\Hubdb\HubDBTableRowBatchCloneRequest;
use HubspotSDK\Cms\Hubdb\HubDBTableRowV3;
use HubspotSDK\Cms\Hubdb\HubDBTableRowV3BatchUpdateRequest;
use HubspotSDK\Cms\Hubdb\HubDBTableRowV3Request;
use HubspotSDK\Cms\Hubdb\Rows\RowCloneBatchParams;
use HubspotSDK\Cms\Hubdb\Rows\RowCloneDraftParams;
use HubspotSDK\Cms\Hubdb\Rows\RowCreateBatchParams;
use HubspotSDK\Cms\Hubdb\Rows\RowCreateParams;
use HubspotSDK\Cms\Hubdb\Rows\RowDeleteDraftParams;
use HubspotSDK\Cms\Hubdb\Rows\RowGetBatchParams;
use HubspotSDK\Cms\Hubdb\Rows\RowGetDraftBatchParams;
use HubspotSDK\Cms\Hubdb\Rows\RowGetDraftParams;
use HubspotSDK\Cms\Hubdb\Rows\RowGetParams;
use HubspotSDK\Cms\Hubdb\Rows\RowListParams;
use HubspotSDK\Cms\Hubdb\Rows\RowPurgeBatchParams;
use HubspotSDK\Cms\Hubdb\Rows\RowReplaceBatchParams;
use HubspotSDK\Cms\Hubdb\Rows\RowReplaceDraftParams;
use HubspotSDK\Cms\Hubdb\Rows\RowUpdateBatchParams;
use HubspotSDK\Cms\Hubdb\Rows\RowUpdateDraftParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Hubdb\RowsRawContract;

/**
 * @phpstan-import-type HubDBTableRowBatchCloneRequestShape from \HubspotSDK\Cms\Hubdb\HubDBTableRowBatchCloneRequest
 * @phpstan-import-type HubDBTableRowV3RequestShape from \HubspotSDK\Cms\Hubdb\HubDBTableRowV3Request
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 * @phpstan-import-type HubDBTableRowV3BatchUpdateRequestShape from \HubspotSDK\Cms\Hubdb\HubDBTableRowV3BatchUpdateRequest
 */
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
     * @param array{
     *   childTableID: int,
     *   displayIndex: int,
     *   values: array<string,mixed>,
     *   name?: string,
     *   path?: string,
     * }|RowCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<HubDBTableRowV3>
     *
     * @throws APIException
     */
    public function create(
        string $tableIDOrName,
        array|RowCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RowCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['cms/hubdb/2026-03/tables/%1$s/rows', $tableIDOrName],
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
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   limit?: int,
     *   offset?: int,
     *   properties?: list<string>,
     *   sort?: list<string>,
     * }|RowListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<mixed>>
     *
     * @throws APIException
     */
    public function list(
        string $tableIDOrName,
        array|RowListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RowListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['cms/hubdb/2026-03/tables/%1$s/rows', $tableIDOrName],
            query: $parsed,
            options: $options,
            convert: 'mixed',
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Clones rows in the draft version of the specified table, given a set of row ids. Maximum of 100 row ids per call.
     *
     * @param array{
     *   inputs: list<HubDBTableRowBatchCloneRequest|HubDBTableRowBatchCloneRequestShape>,
     * }|RowCloneBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseHubDBTableRowV3>
     *
     * @throws APIException
     */
    public function cloneBatch(
        string $tableIDOrName,
        array|RowCloneBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RowCloneBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'cms/hubdb/2026-03/tables/%1$s/rows/draft/batch/clone', $tableIDOrName,
            ],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseHubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Clones a single row in the draft version of a table.
     *
     * @param string $rowID Path param
     * @param array{tableIDOrName: string, name?: string}|RowCloneDraftParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<HubDBTableRowV3>
     *
     * @throws APIException
     */
    public function cloneDraft(
        string $rowID,
        array|RowCloneDraftParams $params,
        RequestOptions|array|null $requestOptions = null,
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
                'cms/hubdb/2026-03/tables/%1$s/rows/%2$s/draft/clone',
                $tableIDOrName,
                $rowID,
            ],
            query: $parsed,
            options: $options,
            convert: HubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Creates rows in the draft version of the specified table, given an array of row objects. Maximum of 100 row object per call. See the overview section for more details with an example.
     *
     * @param array{
     *   inputs: list<HubDBTableRowV3Request|HubDBTableRowV3RequestShape>
     * }|RowCreateBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseHubDBTableRowV3>
     *
     * @throws APIException
     */
    public function createBatch(
        string $tableIDOrName,
        array|RowCreateBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RowCreateBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'cms/hubdb/2026-03/tables/%1$s/rows/draft/batch/create', $tableIDOrName,
            ],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseHubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Permanently deletes a row from a table's draft version.
     *
     * @param array{tableIDOrName: string}|RowDeleteDraftParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteDraft(
        string $rowID,
        array|RowDeleteDraftParams $params,
        RequestOptions|array|null $requestOptions = null,
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
                'cms/hubdb/2026-03/tables/%1$s/rows/%2$s/draft', $tableIDOrName, $rowID,
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
     * @param string $rowID Path param
     * @param array{tableIDOrName: string, archived?: bool}|RowGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<HubDBTableRowV3>
     *
     * @throws APIException
     */
    public function get(
        string $rowID,
        array|RowGetParams $params,
        RequestOptions|array|null $requestOptions = null,
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
            path: ['cms/hubdb/2026-03/tables/%1$s/rows/%2$s', $tableIDOrName, $rowID],
            query: $parsed,
            options: $options,
            convert: HubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Returns rows in the published version of the specified table, given a set of row IDs.
     * **Note:** This endpoint can be accessed without any authentication if the table is set to be allowed for public access.
     *
     * @param array{inputs: list<string>}|RowGetBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseHubDBTableRowV3>
     *
     * @throws APIException
     */
    public function getBatch(
        string $tableIDOrName,
        array|RowGetBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RowGetBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['cms/hubdb/2026-03/tables/%1$s/rows/batch/read', $tableIDOrName],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseHubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Get a single row by ID from a table's draft version.
     *
     * @param string $rowID Path param
     * @param array{tableIDOrName: string, archived?: bool}|RowGetDraftParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<HubDBTableRowV3>
     *
     * @throws APIException
     */
    public function getDraft(
        string $rowID,
        array|RowGetDraftParams $params,
        RequestOptions|array|null $requestOptions = null,
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
                'cms/hubdb/2026-03/tables/%1$s/rows/%2$s/draft', $tableIDOrName, $rowID,
            ],
            query: $parsed,
            options: $options,
            convert: HubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Returns rows in the draft version of the specified table, given a set of row IDs.
     *
     * @param array{inputs: list<string>}|RowGetDraftBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseHubDBTableRowV3>
     *
     * @throws APIException
     */
    public function getDraftBatch(
        string $tableIDOrName,
        array|RowGetDraftBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RowGetDraftBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'cms/hubdb/2026-03/tables/%1$s/rows/draft/batch/read', $tableIDOrName,
            ],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseHubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Permanently delete rows from the draft version of a table, given a set of row IDs. Maximum of 100 row IDs per call.
     *
     * @param array{inputs: list<string>}|RowPurgeBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function purgeBatch(
        string $tableIDOrName,
        array|RowPurgeBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RowPurgeBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'cms/hubdb/2026-03/tables/%1$s/rows/draft/batch/purge', $tableIDOrName,
            ],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Replaces multiple rows as a batch in the draft version of the table, with a maximum of 100 rows per call. See the endpoint `PUT /tables/{tableIdOrName}/rows/{rowId}/draft` for details on updating a single row.
     *
     * @param array{
     *   inputs: list<HubDBTableRowV3BatchUpdateRequest|HubDBTableRowV3BatchUpdateRequestShape>,
     * }|RowReplaceBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseHubDBTableRowV3>
     *
     * @throws APIException
     */
    public function replaceBatch(
        string $tableIDOrName,
        array|RowReplaceBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RowReplaceBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'cms/hubdb/2026-03/tables/%1$s/rows/draft/batch/replace', $tableIDOrName,
            ],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseHubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Replace a single row in the draft version of a table. All column values must be specified. If a column has a value in the target table and this request doesn't define that value, it will be deleted.
     * See the "Create a row" endpoint for instructions on how to format the JSON row definitions.
     *
     * @param string $rowID Path param
     * @param array{
     *   tableIDOrName: string,
     *   childTableID: int,
     *   displayIndex: int,
     *   values: array<string,mixed>,
     *   name?: string,
     *   path?: string,
     * }|RowReplaceDraftParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<HubDBTableRowV3>
     *
     * @throws APIException
     */
    public function replaceDraft(
        string $rowID,
        array|RowReplaceDraftParams $params,
        RequestOptions|array|null $requestOptions = null,
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
                'cms/hubdb/2026-03/tables/%1$s/rows/%2$s/draft', $tableIDOrName, $rowID,
            ],
            body: (object) array_diff_key($parsed, array_flip(['tableIDOrName'])),
            options: $options,
            convert: HubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Updates multiple rows as a batch in the draft version of the table, with a maximum of 100 rows per call. See the endpoint `PATCH /tables/{tableIdOrName}/rows/{rowId}/draft` for details on updating a single row.
     *
     * @param array{
     *   inputs: list<HubDBTableRowV3BatchUpdateRequest|HubDBTableRowV3BatchUpdateRequestShape>,
     * }|RowUpdateBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseHubDBTableRowV3>
     *
     * @throws APIException
     */
    public function updateBatch(
        string $tableIDOrName,
        array|RowUpdateBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RowUpdateBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'cms/hubdb/2026-03/tables/%1$s/rows/draft/batch/update', $tableIDOrName,
            ],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseHubDBTableRowV3::class,
        );
    }

    /**
     * @api
     *
     * Partially update a single row in the table's draft version.
     * All the column values need not be specified. Only the columns or fields that needs to be modified can be specified.
     * See the "Create a row" endpoint for instructions on how to format the JSON row definitions.
     *
     * @param string $rowID Path param
     * @param array{
     *   tableIDOrName: string,
     *   childTableID: int,
     *   displayIndex: int,
     *   values: array<string,mixed>,
     *   name?: string,
     *   path?: string,
     * }|RowUpdateDraftParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<HubDBTableRowV3>
     *
     * @throws APIException
     */
    public function updateDraft(
        string $rowID,
        array|RowUpdateDraftParams $params,
        RequestOptions|array|null $requestOptions = null,
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
                'cms/hubdb/2026-03/tables/%1$s/rows/%2$s/draft', $tableIDOrName, $rowID,
            ],
            body: (object) array_diff_key($parsed, array_flip(['tableIDOrName'])),
            options: $options,
            convert: HubDBTableRowV3::class,
        );
    }
}
