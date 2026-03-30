<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Hubdb;

use HubspotSDK\Cms\Hubdb\HubDBTableV3;
use HubspotSDK\Cms\Hubdb\ImportResult;
use HubspotSDK\Cms\Hubdb\Tables\TableCloneDraftParams;
use HubspotSDK\Cms\Hubdb\Tables\TableCreateParams;
use HubspotSDK\Cms\Hubdb\Tables\TableDeleteVersionParams;
use HubspotSDK\Cms\Hubdb\Tables\TableExportDraftParams;
use HubspotSDK\Cms\Hubdb\Tables\TableExportParams;
use HubspotSDK\Cms\Hubdb\Tables\TableGetDraftParams;
use HubspotSDK\Cms\Hubdb\Tables\TableGetParams;
use HubspotSDK\Cms\Hubdb\Tables\TableImportDraftParams;
use HubspotSDK\Cms\Hubdb\Tables\TableListDraftParams;
use HubspotSDK\Cms\Hubdb\Tables\TableListParams;
use HubspotSDK\Cms\Hubdb\Tables\TablePublishDraftParams;
use HubspotSDK\Cms\Hubdb\Tables\TableResetDraftParams;
use HubspotSDK\Cms\Hubdb\Tables\TableUnpublishParams;
use HubspotSDK\Cms\Hubdb\Tables\TableUpdateDraftParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface TablesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|TableCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<HubDBTableV3>
     *
     * @throws APIException
     */
    public function create(
        array|TableCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TableListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<HubDBTableV3>>
     *
     * @throws APIException
     */
    public function list(
        array|TableListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $tableIDOrName,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TableCloneDraftParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<HubDBTableV3>
     *
     * @throws APIException
     */
    public function cloneDraft(
        string $tableIDOrName,
        array|TableCloneDraftParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TableDeleteVersionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteVersion(
        int $versionID,
        array|TableDeleteVersionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TableExportParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function export(
        string $tableIDOrName,
        array|TableExportParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TableExportDraftParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function exportDraft(
        string $tableIDOrName,
        array|TableExportDraftParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TableGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<HubDBTableV3>
     *
     * @throws APIException
     */
    public function get(
        string $tableIDOrName,
        array|TableGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TableGetDraftParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<HubDBTableV3>
     *
     * @throws APIException
     */
    public function getDraft(
        string $tableIDOrName,
        array|TableGetDraftParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TableImportDraftParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ImportResult>
     *
     * @throws APIException
     */
    public function importDraft(
        string $tableIDOrName,
        array|TableImportDraftParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TableListDraftParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<HubDBTableV3>>
     *
     * @throws APIException
     */
    public function listDraft(
        array|TableListDraftParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TablePublishDraftParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<HubDBTableV3>
     *
     * @throws APIException
     */
    public function publishDraft(
        string $tableIDOrName,
        array|TablePublishDraftParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TableResetDraftParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<HubDBTableV3>
     *
     * @throws APIException
     */
    public function resetDraft(
        string $tableIDOrName,
        array|TableResetDraftParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TableUnpublishParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<HubDBTableV3>
     *
     * @throws APIException
     */
    public function unpublish(
        string $tableIDOrName,
        array|TableUnpublishParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $tableIDOrName Path param
     * @param array<string,mixed>|TableUpdateDraftParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<HubDBTableV3>
     *
     * @throws APIException
     */
    public function updateDraft(
        string $tableIDOrName,
        array|TableUpdateDraftParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
