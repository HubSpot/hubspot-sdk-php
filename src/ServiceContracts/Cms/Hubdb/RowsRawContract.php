<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Hubdb;

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

interface RowsRawContract
{
    /**
     * @api
     *
     * @param string $tableIDOrName the ID or name of the target table
     * @param array<string,mixed>|RowCreateParams $params
     *
     * @return BaseResponse<HubDBTableRowV3>
     *
     * @throws APIException
     */
    public function create(
        string $tableIDOrName,
        array|RowCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $tableIDOrName the ID or name of the table to query
     * @param array<string,mixed>|RowListParams $params
     *
     * @return BaseResponse<Page<mixed>>
     *
     * @throws APIException
     */
    public function list(
        string $tableIDOrName,
        array|RowListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $rowID Path param: The ID of the row
     * @param array<string,mixed>|RowCloneDraftParams $params
     *
     * @return BaseResponse<HubDBTableRowV3>
     *
     * @throws APIException
     */
    public function cloneDraft(
        string $rowID,
        array|RowCloneDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $rowID The ID of the row
     * @param array<string,mixed>|RowDeleteDraftParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteDraft(
        string $rowID,
        array|RowDeleteDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $rowID Path param: The ID of the row
     * @param array<string,mixed>|RowGetParams $params
     *
     * @return BaseResponse<HubDBTableRowV3>
     *
     * @throws APIException
     */
    public function get(
        string $rowID,
        array|RowGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $rowID Path param: The ID of the row
     * @param array<string,mixed>|RowGetDraftParams $params
     *
     * @return BaseResponse<HubDBTableRowV3>
     *
     * @throws APIException
     */
    public function getDraft(
        string $rowID,
        array|RowGetDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $tableIDOrName the ID or name of the table to query
     * @param array<string,mixed>|RowListDraftParams $params
     *
     * @return BaseResponse<Page<mixed>>
     *
     * @throws APIException
     */
    public function listDraft(
        string $tableIDOrName,
        array|RowListDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $rowID Path param: The ID of the row
     * @param array<string,mixed>|RowReplaceDraftParams $params
     *
     * @return BaseResponse<HubDBTableRowV3>
     *
     * @throws APIException
     */
    public function replaceDraft(
        string $rowID,
        array|RowReplaceDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $rowID Path param: The ID of the row
     * @param array<string,mixed>|RowUpdateDraftParams $params
     *
     * @return BaseResponse<HubDBTableRowV3>
     *
     * @throws APIException
     */
    public function updateDraft(
        string $rowID,
        array|RowUpdateDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
