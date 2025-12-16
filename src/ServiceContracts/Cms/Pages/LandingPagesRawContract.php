<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Pages;

use HubspotSDK\Cms\Pages\BatchResponseContentFolder;
use HubspotSDK\Cms\Pages\BatchResponsePage;
use HubspotSDK\Cms\Pages\ContentFolder;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageAttachToLangGroupParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCloneParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateAbTestVariationParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateBatchParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateFolderParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateFoldersBatchParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateLanguageVariationParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageDeleteBatchParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageDeleteFolderParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageDeleteFoldersBatchParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageDeleteParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageDetachFromLangGroupParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageEndAbTestParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageGetBatchParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageGetFolderParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageGetFolderRevisionParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageGetFoldersBatchParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageGetParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageGetRevisionParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageListFolderRevisionsParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageListFoldersParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageListParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageListRevisionsParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageRerunAbTestParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageRestoreFolderRevisionParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageRestoreRevisionParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageRestoreRevisionToDraftParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageScheduleParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageSetNewLangPrimaryParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateBatchParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateDraftParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateFolderParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateFoldersBatchParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateLanguagesParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateParams;
use HubspotSDK\Cms\Pages\Page;
use HubspotSDK\Cms\Pages\VersionContentFolder;
use HubspotSDK\Cms\Pages\VersionPage;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface LandingPagesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|LandingPageCreateParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function create(
        array|LandingPageCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID path param: The Landing Page id
     * @param array<string,mixed>|LandingPageUpdateParams $params
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|LandingPageUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|LandingPageListParams $params
     *
     * @return BaseResponse<\HubspotSDK\Page<Page>>
     *
     * @throws APIException
     */
    public function list(
        array|LandingPageListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID the Landing Page id
     * @param array<string,mixed>|LandingPageDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        array|LandingPageDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|LandingPageAttachToLangGroupParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function attachToLangGroup(
        array|LandingPageAttachToLangGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|LandingPageCloneParams $params
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function clone(
        array|LandingPageCloneParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|LandingPageCreateAbTestVariationParams $params
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function createAbTestVariation(
        array|LandingPageCreateAbTestVariationParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|LandingPageCreateBatchParams $params
     *
     * @return BaseResponse<BatchResponsePage>
     *
     * @throws APIException
     */
    public function createBatch(
        array|LandingPageCreateBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|LandingPageCreateFolderParams $params
     *
     * @return BaseResponse<ContentFolder>
     *
     * @throws APIException
     */
    public function createFolder(
        array|LandingPageCreateFolderParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|LandingPageCreateFoldersBatchParams $params
     *
     * @return BaseResponse<BatchResponseContentFolder>
     *
     * @throws APIException
     */
    public function createFoldersBatch(
        array|LandingPageCreateFoldersBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|LandingPageCreateLanguageVariationParams $params
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function createLanguageVariation(
        array|LandingPageCreateLanguageVariationParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|LandingPageDeleteBatchParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteBatch(
        array|LandingPageDeleteBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID the Folder id
     * @param array<string,mixed>|LandingPageDeleteFolderParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteFolder(
        string $objectID,
        array|LandingPageDeleteFolderParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|LandingPageDeleteFoldersBatchParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteFoldersBatch(
        array|LandingPageDeleteFoldersBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|LandingPageDetachFromLangGroupParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        array|LandingPageDetachFromLangGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|LandingPageEndAbTestParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function endAbTest(
        array|LandingPageEndAbTestParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID the Landing Page id
     * @param array<string,mixed>|LandingPageGetParams $params
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        array|LandingPageGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|LandingPageGetBatchParams $params
     *
     * @return BaseResponse<BatchResponsePage>
     *
     * @throws APIException
     */
    public function getBatch(
        array|LandingPageGetBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID the Landing Page id
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
     * @param string $objectID the Folder id
     * @param array<string,mixed>|LandingPageGetFolderParams $params
     *
     * @return BaseResponse<ContentFolder>
     *
     * @throws APIException
     */
    public function getFolder(
        string $objectID,
        array|LandingPageGetFolderParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $revisionID the Folder version id
     * @param array<string,mixed>|LandingPageGetFolderRevisionParams $params
     *
     * @return BaseResponse<VersionContentFolder>
     *
     * @throws APIException
     */
    public function getFolderRevision(
        string $revisionID,
        array|LandingPageGetFolderRevisionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|LandingPageGetFoldersBatchParams $params
     *
     * @return BaseResponse<BatchResponseContentFolder>
     *
     * @throws APIException
     */
    public function getFoldersBatch(
        array|LandingPageGetFoldersBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $revisionID the Landing Page version id
     * @param array<string,mixed>|LandingPageGetRevisionParams $params
     *
     * @return BaseResponse<VersionPage>
     *
     * @throws APIException
     */
    public function getRevision(
        string $revisionID,
        array|LandingPageGetRevisionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID the Folder id
     * @param array<string,mixed>|LandingPageListFolderRevisionsParams $params
     *
     * @return BaseResponse<\HubspotSDK\Page<VersionContentFolder>>
     *
     * @throws APIException
     */
    public function listFolderRevisions(
        string $objectID,
        array|LandingPageListFolderRevisionsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|LandingPageListFoldersParams $params
     *
     * @return BaseResponse<\HubspotSDK\Page<ContentFolder>>
     *
     * @throws APIException
     */
    public function listFolders(
        array|LandingPageListFoldersParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID the Landing Page id
     * @param array<string,mixed>|LandingPageListRevisionsParams $params
     *
     * @return BaseResponse<\HubspotSDK\Page<VersionPage>>
     *
     * @throws APIException
     */
    public function listRevisions(
        string $objectID,
        array|LandingPageListRevisionsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID the id of the Landing Page for which it's draft will be pushed live
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
     * @param array<string,mixed>|LandingPageRerunAbTestParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function rerunAbTest(
        array|LandingPageRerunAbTestParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID the id of the Landing Page for which it's draft will be reset
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
     * @param string $revisionID the Folder version id to restore
     * @param array<string,mixed>|LandingPageRestoreFolderRevisionParams $params
     *
     * @return BaseResponse<ContentFolder>
     *
     * @throws APIException
     */
    public function restoreFolderRevision(
        string $revisionID,
        array|LandingPageRestoreFolderRevisionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $revisionID the Landing Page version id to restore
     * @param array<string,mixed>|LandingPageRestoreRevisionParams $params
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function restoreRevision(
        string $revisionID,
        array|LandingPageRestoreRevisionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $revisionID the Landing Page version id to restore
     * @param array<string,mixed>|LandingPageRestoreRevisionToDraftParams $params
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function restoreRevisionToDraft(
        int $revisionID,
        array|LandingPageRestoreRevisionToDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|LandingPageScheduleParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function schedule(
        array|LandingPageScheduleParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|LandingPageSetNewLangPrimaryParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function setNewLangPrimary(
        array|LandingPageSetNewLangPrimaryParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|LandingPageUpdateBatchParams $params
     *
     * @return BaseResponse<BatchResponsePage>
     *
     * @throws APIException
     */
    public function updateBatch(
        array|LandingPageUpdateBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID the Landing Page id
     * @param array<string,mixed>|LandingPageUpdateDraftParams $params
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function updateDraft(
        string $objectID,
        array|LandingPageUpdateDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID path param: The Folder id
     * @param array<string,mixed>|LandingPageUpdateFolderParams $params
     *
     * @return BaseResponse<ContentFolder>
     *
     * @throws APIException
     */
    public function updateFolder(
        string $objectID,
        array|LandingPageUpdateFolderParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|LandingPageUpdateFoldersBatchParams $params
     *
     * @return BaseResponse<BatchResponseContentFolder>
     *
     * @throws APIException
     */
    public function updateFoldersBatch(
        array|LandingPageUpdateFoldersBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|LandingPageUpdateLanguagesParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function updateLanguages(
        array|LandingPageUpdateLanguagesParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
