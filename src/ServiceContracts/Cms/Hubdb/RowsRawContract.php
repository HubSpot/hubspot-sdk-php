<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Hubdb;

use HubspotSDK\Cms\Hubdb\BatchResponseHubDBTableRowV3;
use HubspotSDK\Cms\Hubdb\HubDBTableRowV3;
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

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface RowsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|RowCreateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RowListParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RowCloneBatchParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $rowID Path param
     * @param array<string,mixed>|RowCloneDraftParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RowCreateBatchParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RowDeleteDraftParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $rowID Path param
     * @param array<string,mixed>|RowGetParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RowGetBatchParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $rowID Path param
     * @param array<string,mixed>|RowGetDraftParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RowGetDraftBatchParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RowPurgeBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseHubDBTableRowV3>
     *
     * @throws APIException
     */
    public function purgeBatch(
        string $tableIDOrName,
        array|RowPurgeBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RowReplaceBatchParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $rowID Path param
     * @param array<string,mixed>|RowReplaceDraftParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RowUpdateBatchParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $rowID Path param
     * @param array<string,mixed>|RowUpdateDraftParams $params
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
    ): BaseResponse;
}
