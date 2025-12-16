<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Pages;

use HubspotSDK\Cms\Pages\BatchResponsePage;
use HubspotSDK\Cms\Pages\Page;
use HubspotSDK\Cms\Pages\SitePages\SitePageAttachToLangGroupParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageCloneParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageCreateAbTestVariationParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageCreateBatchParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageCreateLanguageVariationParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageCreateParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageDeleteBatchParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageDeleteParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageDetachFromLangGroupParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageEndAbTestParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageGetBatchParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageGetParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageGetRevisionParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageListParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageListRevisionsParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageRerunAbTestParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageRestoreRevisionParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageRestoreRevisionToDraftParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageScheduleParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageSetNewLangPrimaryParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageUpdateBatchParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageUpdateDraftParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageUpdateLanguagesParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageUpdateParams;
use HubspotSDK\Cms\Pages\VersionPage;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface SitePagesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SitePageCreateParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function create(
        array|SitePageCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID path param: The Site Page id
     * @param array<string,mixed>|SitePageUpdateParams $params
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|SitePageUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SitePageListParams $params
     *
     * @return BaseResponse<\HubspotSDK\Page<Page>>
     *
     * @throws APIException
     */
    public function list(
        array|SitePageListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID the Site Page id
     * @param array<string,mixed>|SitePageDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        array|SitePageDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SitePageAttachToLangGroupParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function attachToLangGroup(
        array|SitePageAttachToLangGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SitePageCloneParams $params
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function clone(
        array|SitePageCloneParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SitePageCreateAbTestVariationParams $params
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function createAbTestVariation(
        array|SitePageCreateAbTestVariationParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SitePageCreateBatchParams $params
     *
     * @return BaseResponse<BatchResponsePage>
     *
     * @throws APIException
     */
    public function createBatch(
        array|SitePageCreateBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SitePageCreateLanguageVariationParams $params
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function createLanguageVariation(
        array|SitePageCreateLanguageVariationParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SitePageDeleteBatchParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteBatch(
        array|SitePageDeleteBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SitePageDetachFromLangGroupParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        array|SitePageDetachFromLangGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SitePageEndAbTestParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function endAbTest(
        array|SitePageEndAbTestParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID the Site Page id
     * @param array<string,mixed>|SitePageGetParams $params
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        array|SitePageGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SitePageGetBatchParams $params
     *
     * @return BaseResponse<BatchResponsePage>
     *
     * @throws APIException
     */
    public function getBatch(
        array|SitePageGetBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID the Site Page id
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function getDraft(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $revisionID the Site Page version id
     * @param array<string,mixed>|SitePageGetRevisionParams $params
     *
     * @return BaseResponse<VersionPage>
     *
     * @throws APIException
     */
    public function getRevision(
        string $revisionID,
        array|SitePageGetRevisionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID the Site Page id
     * @param array<string,mixed>|SitePageListRevisionsParams $params
     *
     * @return BaseResponse<\HubspotSDK\Page<VersionPage>>
     *
     * @throws APIException
     */
    public function listRevisions(
        string $objectID,
        array|SitePageListRevisionsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID the id of the Site Page for which it's draft will be pushed live
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function publishDraft(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SitePageRerunAbTestParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function rerunAbTest(
        array|SitePageRerunAbTestParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID the id of the Site Page for which it's draft will be reset
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function resetDraft(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $revisionID the Site Page version id to restore
     * @param array<string,mixed>|SitePageRestoreRevisionParams $params
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function restoreRevision(
        string $revisionID,
        array|SitePageRestoreRevisionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $revisionID the Site Page version id to restore
     * @param array<string,mixed>|SitePageRestoreRevisionToDraftParams $params
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function restoreRevisionToDraft(
        int $revisionID,
        array|SitePageRestoreRevisionToDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SitePageScheduleParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function schedule(
        array|SitePageScheduleParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SitePageSetNewLangPrimaryParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function setNewLangPrimary(
        array|SitePageSetNewLangPrimaryParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SitePageUpdateBatchParams $params
     *
     * @return BaseResponse<BatchResponsePage>
     *
     * @throws APIException
     */
    public function updateBatch(
        array|SitePageUpdateBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID the Site Page id
     * @param array<string,mixed>|SitePageUpdateDraftParams $params
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function updateDraft(
        string $objectID,
        array|SitePageUpdateDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SitePageUpdateLanguagesParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function updateLanguages(
        array|SitePageUpdateLanguagesParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
