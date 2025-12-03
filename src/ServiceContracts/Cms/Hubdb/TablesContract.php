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
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface TablesContract
{
    /**
     * @api
     *
     * @param array<mixed>|TableCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|TableCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): HubDBTableV3;

    /**
     * @api
     *
     * @param array<mixed>|TableListParams $params
     *
     * @return Page<HubDBTableV3>
     *
     * @throws APIException
     */
    public function list(
        array|TableListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $tableIDOrName,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|TableCloneDraftParams $params
     *
     * @throws APIException
     */
    public function cloneDraft(
        string $tableIDOrName,
        array|TableCloneDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3;

    /**
     * @api
     *
     * @param array<mixed>|TableDeleteVersionParams $params
     *
     * @throws APIException
     */
    public function deleteVersion(
        int $versionID,
        array|TableDeleteVersionParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|TableExportParams $params
     *
     * @throws APIException
     */
    public function export(
        string $tableIDOrName,
        array|TableExportParams $params,
        ?RequestOptions $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param array<mixed>|TableExportDraftParams $params
     *
     * @throws APIException
     */
    public function exportDraft(
        string $tableIDOrName,
        array|TableExportDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param array<mixed>|TableGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $tableIDOrName,
        array|TableGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3;

    /**
     * @api
     *
     * @param array<mixed>|TableGetDraftParams $params
     *
     * @throws APIException
     */
    public function getDraft(
        string $tableIDOrName,
        array|TableGetDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3;

    /**
     * @api
     *
     * @param array<mixed>|TableImportDraftParams $params
     *
     * @throws APIException
     */
    public function importDraft(
        string $tableIDOrName,
        array|TableImportDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): ImportResult;

    /**
     * @api
     *
     * @param array<mixed>|TableListDraftParams $params
     *
     * @return Page<HubDBTableV3>
     *
     * @throws APIException
     */
    public function listDraft(
        array|TableListDraftParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|TablePublishDraftParams $params
     *
     * @throws APIException
     */
    public function publishDraft(
        string $tableIDOrName,
        array|TablePublishDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3;

    /**
     * @api
     *
     * @param array<mixed>|TableResetDraftParams $params
     *
     * @throws APIException
     */
    public function resetDraft(
        string $tableIDOrName,
        array|TableResetDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3;

    /**
     * @api
     *
     * @param array<mixed>|TableUnpublishParams $params
     *
     * @throws APIException
     */
    public function unpublish(
        string $tableIDOrName,
        array|TableUnpublishParams $params,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3;

    /**
     * @api
     *
     * @param array<mixed>|TableUpdateDraftParams $params
     *
     * @throws APIException
     */
    public function updateDraft(
        string $tableIDOrName,
        array|TableUpdateDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): HubDBTableV3;
}
