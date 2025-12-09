<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Hubdb\Rows;

use HubspotSDK\Client;
use HubspotSDK\Cms\Hubdb\BatchResponseHubDBTableRowV3;
use HubspotSDK\Cms\Hubdb\Rows\Batch\BatchCloneBatchParams;
use HubspotSDK\Cms\Hubdb\Rows\Batch\BatchCreateBatchParams;
use HubspotSDK\Cms\Hubdb\Rows\Batch\BatchGetBatchParams;
use HubspotSDK\Cms\Hubdb\Rows\Batch\BatchGetDraftBatchParams;
use HubspotSDK\Cms\Hubdb\Rows\Batch\BatchPurgeBatchParams;
use HubspotSDK\Cms\Hubdb\Rows\Batch\BatchReplaceBatchParams;
use HubspotSDK\Cms\Hubdb\Rows\Batch\BatchUpdateBatchParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Hubdb\Rows\BatchContract;

final class BatchService implements BatchContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Clones rows in the draft version of the specified table, given a set of row ids. Maximum of 100 row ids per call.
     *
     * @param array{
     *   inputs: list<array{id: string, name?: string}>
     * }|BatchCloneBatchParams $params
     *
     * @throws APIException
     */
    public function cloneBatch(
        string $tableIDOrName,
        array|BatchCloneBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseHubDBTableRowV3 {
        [$parsed, $options] = BatchCloneBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<BatchResponseHubDBTableRowV3> */
        $response = $this->client->request(
            method: 'post',
            path: ['cms/v3/hubdb/tables/%1$s/rows/draft/batch/clone', $tableIDOrName],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseHubDBTableRowV3::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Creates rows in the draft version of the specified table, given an array of row objects. Maximum of 100 row object per call. See the overview section for more details with an example.
     *
     * @param array{
     *   inputs: list<array{
     *     childTableId: int,
     *     displayIndex: int,
     *     values: array<string,array<string,mixed>>,
     *     name?: string,
     *     path?: string,
     *   }>,
     * }|BatchCreateBatchParams $params
     *
     * @throws APIException
     */
    public function createBatch(
        string $tableIDOrName,
        array|BatchCreateBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseHubDBTableRowV3 {
        [$parsed, $options] = BatchCreateBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<BatchResponseHubDBTableRowV3> */
        $response = $this->client->request(
            method: 'post',
            path: [
                'cms/v3/hubdb/tables/%1$s/rows/draft/batch/create', $tableIDOrName,
            ],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseHubDBTableRowV3::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns rows in the published version of the specified table, given a set of row IDs.
     * **Note:** This endpoint can be accessed without any authentication if the table is set to be allowed for public access.
     *
     * @param array{inputs: list<string>}|BatchGetBatchParams $params
     *
     * @throws APIException
     */
    public function getBatch(
        string $tableIDOrName,
        array|BatchGetBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseHubDBTableRowV3 {
        [$parsed, $options] = BatchGetBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<BatchResponseHubDBTableRowV3> */
        $response = $this->client->request(
            method: 'post',
            path: ['cms/v3/hubdb/tables/%1$s/rows/batch/read', $tableIDOrName],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseHubDBTableRowV3::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns rows in the draft version of the specified table, given a set of row IDs.
     *
     * @param array{inputs: list<string>}|BatchGetDraftBatchParams $params
     *
     * @throws APIException
     */
    public function getDraftBatch(
        string $tableIDOrName,
        array|BatchGetDraftBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseHubDBTableRowV3 {
        [$parsed, $options] = BatchGetDraftBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<BatchResponseHubDBTableRowV3> */
        $response = $this->client->request(
            method: 'post',
            path: ['cms/v3/hubdb/tables/%1$s/rows/draft/batch/read', $tableIDOrName],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseHubDBTableRowV3::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Permanently deletes rows from the draft version of the table, given a set of row IDs. Maximum of 100 row IDs per call.
     *
     * @param array{inputs: list<string>}|BatchPurgeBatchParams $params
     *
     * @throws APIException
     */
    public function purgeBatch(
        string $tableIDOrName,
        array|BatchPurgeBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = BatchPurgeBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'post',
            path: ['cms/v3/hubdb/tables/%1$s/rows/draft/batch/purge', $tableIDOrName],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Replaces multiple rows as a batch in the draft version of the table, with a maximum of 100 rows per call. See the endpoint `PUT /tables/{tableIdOrName}/rows/{rowId}/draft` for details on updating a single row.
     *
     * @param array{
     *   inputs: list<array{
     *     childTableId: int,
     *     displayIndex: int,
     *     values: array<string,array<string,mixed>>,
     *     id?: string,
     *     name?: string,
     *     path?: string,
     *   }>,
     * }|BatchReplaceBatchParams $params
     *
     * @throws APIException
     */
    public function replaceBatch(
        string $tableIDOrName,
        array|BatchReplaceBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseHubDBTableRowV3 {
        [$parsed, $options] = BatchReplaceBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<BatchResponseHubDBTableRowV3> */
        $response = $this->client->request(
            method: 'post',
            path: [
                'cms/v3/hubdb/tables/%1$s/rows/draft/batch/replace', $tableIDOrName,
            ],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseHubDBTableRowV3::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates multiple rows as a batch in the draft version of the table, with a maximum of 100 rows per call. See the endpoint `PATCH /tables/{tableIdOrName}/rows/{rowId}/draft` for details on updating a single row.
     *
     * @param array{
     *   inputs: list<array{
     *     childTableId: int,
     *     displayIndex: int,
     *     values: array<string,array<string,mixed>>,
     *     id?: string,
     *     name?: string,
     *     path?: string,
     *   }>,
     * }|BatchUpdateBatchParams $params
     *
     * @throws APIException
     */
    public function updateBatch(
        string $tableIDOrName,
        array|BatchUpdateBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseHubDBTableRowV3 {
        [$parsed, $options] = BatchUpdateBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<BatchResponseHubDBTableRowV3> */
        $response = $this->client->request(
            method: 'post',
            path: [
                'cms/v3/hubdb/tables/%1$s/rows/draft/batch/update', $tableIDOrName,
            ],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseHubDBTableRowV3::class,
        );

        return $response->parse();
    }
}
