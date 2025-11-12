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
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface RowsContract
{
    /**
     * @api
     *
     * @param array<mixed>|RowCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $tableIDOrName,
        array|RowCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableRowV3;

    /**
     * @api
     *
     * @param array<mixed>|RowListParams $params
     *
     * @return Page<mixed>
     *
     * @throws APIException
     */
    public function list(
        string $tableIDOrName,
        array|RowListParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|RowCloneDraftParams $params
     *
     * @throws APIException
     */
    public function cloneDraft(
        string $rowID,
        array|RowCloneDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableRowV3;

    /**
     * @api
     *
     * @param array<mixed>|RowDeleteDraftParams $params
     *
     * @throws APIException
     */
    public function deleteDraft(
        string $rowID,
        array|RowDeleteDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|RowGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $rowID,
        array|RowGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableRowV3;

    /**
     * @api
     *
     * @param array<mixed>|RowGetDraftParams $params
     *
     * @throws APIException
     */
    public function getDraft(
        string $rowID,
        array|RowGetDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableRowV3;

    /**
     * @api
     *
     * @param array<mixed>|RowListDraftParams $params
     *
     * @return Page<mixed>
     *
     * @throws APIException
     */
    public function listDraft(
        string $tableIDOrName,
        array|RowListDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|RowReplaceDraftParams $params
     *
     * @throws APIException
     */
    public function replaceDraft(
        string $rowID,
        array|RowReplaceDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableRowV3;

    /**
     * @api
     *
     * @param array<mixed>|RowUpdateDraftParams $params
     *
     * @throws APIException
     */
    public function updateDraft(
        string $rowID,
        array|RowUpdateDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableRowV3;
}
