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

interface TablesRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|TableCreateParams $params
     *
     * @return BaseResponse<HubDBTableV3>
     *
     * @throws APIException
     */
    public function create(
        array|TableCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|TableListParams $params
     *
     * @return BaseResponse<Page<HubDBTableV3>>
     *
     * @throws APIException
     */
    public function list(
        array|TableListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $tableIDOrName the ID or name of the table to archive
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $tableIDOrName,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $tableIDOrName the ID or name of the table to clone
     * @param array<mixed>|TableCloneDraftParams $params
     *
     * @return BaseResponse<HubDBTableV3>
     *
     * @throws APIException
     */
    public function cloneDraft(
        string $tableIDOrName,
        array|TableCloneDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $versionID the ID of the specific version of the table to delete
     * @param array<mixed>|TableDeleteVersionParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteVersion(
        int $versionID,
        array|TableDeleteVersionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $tableIDOrName the ID or name of the table to export
     * @param array<mixed>|TableExportParams $params
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function export(
        string $tableIDOrName,
        array|TableExportParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $tableIDOrName the ID or name of the table to export
     * @param array<mixed>|TableExportDraftParams $params
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function exportDraft(
        string $tableIDOrName,
        array|TableExportDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $tableIDOrName the ID or name of the table to return
     * @param array<mixed>|TableGetParams $params
     *
     * @return BaseResponse<HubDBTableV3>
     *
     * @throws APIException
     */
    public function get(
        string $tableIDOrName,
        array|TableGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $tableIDOrName the ID or name of the table to return
     * @param array<mixed>|TableGetDraftParams $params
     *
     * @return BaseResponse<HubDBTableV3>
     *
     * @throws APIException
     */
    public function getDraft(
        string $tableIDOrName,
        array|TableGetDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $tableIDOrName the ID of the destination table where data will be imported
     * @param array<mixed>|TableImportDraftParams $params
     *
     * @return BaseResponse<ImportResult>
     *
     * @throws APIException
     */
    public function importDraft(
        string $tableIDOrName,
        array|TableImportDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|TableListDraftParams $params
     *
     * @return BaseResponse<Page<HubDBTableV3>>
     *
     * @throws APIException
     */
    public function listDraft(
        array|TableListDraftParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $tableIDOrName the ID or name of the table to publish
     * @param array<mixed>|TablePublishDraftParams $params
     *
     * @return BaseResponse<HubDBTableV3>
     *
     * @throws APIException
     */
    public function publishDraft(
        string $tableIDOrName,
        array|TablePublishDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $tableIDOrName the ID or name of the table to reset
     * @param array<mixed>|TableResetDraftParams $params
     *
     * @return BaseResponse<HubDBTableV3>
     *
     * @throws APIException
     */
    public function resetDraft(
        string $tableIDOrName,
        array|TableResetDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $tableIDOrName the ID or name of the table to publish
     * @param array<mixed>|TableUnpublishParams $params
     *
     * @return BaseResponse<HubDBTableV3>
     *
     * @throws APIException
     */
    public function unpublish(
        string $tableIDOrName,
        array|TableUnpublishParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $tableIDOrName path param: The ID or name of the table to update
     * @param array<mixed>|TableUpdateDraftParams $params
     *
     * @return BaseResponse<HubDBTableV3>
     *
     * @throws APIException
     */
    public function updateDraft(
        string $tableIDOrName,
        array|TableUpdateDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
