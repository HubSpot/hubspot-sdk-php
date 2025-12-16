<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Hubdb\Rows;

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

interface BatchRawContract
{
    /**
     * @api
     *
     * @param string $tableIDOrName The ID or name of the table
     * @param array<string,mixed>|BatchCloneBatchParams $params
     *
     * @return BaseResponse<BatchResponseHubDBTableRowV3>
     *
     * @throws APIException
     */
    public function cloneBatch(
        string $tableIDOrName,
        array|BatchCloneBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $tableIDOrName The ID or name of the table
     * @param array<string,mixed>|BatchCreateBatchParams $params
     *
     * @return BaseResponse<BatchResponseHubDBTableRowV3>
     *
     * @throws APIException
     */
    public function createBatch(
        string $tableIDOrName,
        array|BatchCreateBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $tableIDOrName the ID or name of the table to query
     * @param array<string,mixed>|BatchGetBatchParams $params
     *
     * @return BaseResponse<BatchResponseHubDBTableRowV3>
     *
     * @throws APIException
     */
    public function getBatch(
        string $tableIDOrName,
        array|BatchGetBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $tableIDOrName The ID or name of the table
     * @param array<string,mixed>|BatchGetDraftBatchParams $params
     *
     * @return BaseResponse<BatchResponseHubDBTableRowV3>
     *
     * @throws APIException
     */
    public function getDraftBatch(
        string $tableIDOrName,
        array|BatchGetDraftBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $tableIDOrName The ID or name of the table
     * @param array<string,mixed>|BatchPurgeBatchParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function purgeBatch(
        string $tableIDOrName,
        array|BatchPurgeBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $tableIDOrName The ID or name of the table
     * @param array<string,mixed>|BatchReplaceBatchParams $params
     *
     * @return BaseResponse<BatchResponseHubDBTableRowV3>
     *
     * @throws APIException
     */
    public function replaceBatch(
        string $tableIDOrName,
        array|BatchReplaceBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $tableIDOrName The ID or name of the table
     * @param array<string,mixed>|BatchUpdateBatchParams $params
     *
     * @return BaseResponse<BatchResponseHubDBTableRowV3>
     *
     * @throws APIException
     */
    public function updateBatch(
        string $tableIDOrName,
        array|BatchUpdateBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
