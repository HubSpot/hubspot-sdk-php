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
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface BatchContract
{
    /**
     * @api
     *
     * @param array<mixed>|BatchCloneBatchParams $params
     *
     * @throws APIException
     */
    public function cloneBatch(
        string $tableIDOrName,
        array|BatchCloneBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param array<mixed>|BatchCreateBatchParams $params
     *
     * @throws APIException
     */
    public function createBatch(
        string $tableIDOrName,
        array|BatchCreateBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param array<mixed>|BatchGetBatchParams $params
     *
     * @throws APIException
     */
    public function getBatch(
        string $tableIDOrName,
        array|BatchGetBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param array<mixed>|BatchGetDraftBatchParams $params
     *
     * @throws APIException
     */
    public function getDraftBatch(
        string $tableIDOrName,
        array|BatchGetDraftBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param array<mixed>|BatchPurgeBatchParams $params
     *
     * @throws APIException
     */
    public function purgeBatch(
        string $tableIDOrName,
        array|BatchPurgeBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|BatchReplaceBatchParams $params
     *
     * @throws APIException
     */
    public function replaceBatch(
        string $tableIDOrName,
        array|BatchReplaceBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;

    /**
     * @api
     *
     * @param array<mixed>|BatchUpdateBatchParams $params
     *
     * @throws APIException
     */
    public function updateBatch(
        string $tableIDOrName,
        array|BatchUpdateBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseHubDBTableRowV3;
}
