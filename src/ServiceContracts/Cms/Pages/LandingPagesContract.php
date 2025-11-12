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
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface LandingPagesContract
{
    /**
     * @api
     *
     * @param array<mixed>|LandingPageCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|LandingPageCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|LandingPageUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageListParams $params
     *
     * @return \HubspotSDK\Page<Page>
     *
     * @throws APIException
     */
    public function list(
        array|LandingPageListParams $params,
        ?RequestOptions $requestOptions = null,
    ): \HubspotSDK\Page;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        array|LandingPageDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageAttachToLangGroupParams $params
     *
     * @throws APIException
     */
    public function attachToLangGroup(
        array|LandingPageAttachToLangGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageCloneParams $params
     *
     * @throws APIException
     */
    public function clone(
        array|LandingPageCloneParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageCreateAbTestVariationParams $params
     *
     * @throws APIException
     */
    public function createAbTestVariation(
        array|LandingPageCreateAbTestVariationParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageCreateBatchParams $params
     *
     * @throws APIException
     */
    public function createBatch(
        array|LandingPageCreateBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePage;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageCreateFolderParams $params
     *
     * @throws APIException
     */
    public function createFolder(
        array|LandingPageCreateFolderParams $params,
        ?RequestOptions $requestOptions = null,
    ): ContentFolder;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageCreateFoldersBatchParams $params
     *
     * @throws APIException
     */
    public function createFoldersBatch(
        array|LandingPageCreateFoldersBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseContentFolder;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageCreateLanguageVariationParams $params
     *
     * @throws APIException
     */
    public function createLanguageVariation(
        array|LandingPageCreateLanguageVariationParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageDeleteBatchParams $params
     *
     * @throws APIException
     */
    public function deleteBatch(
        array|LandingPageDeleteBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageDeleteFolderParams $params
     *
     * @throws APIException
     */
    public function deleteFolder(
        string $objectID,
        array|LandingPageDeleteFolderParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageDeleteFoldersBatchParams $params
     *
     * @throws APIException
     */
    public function deleteFoldersBatch(
        array|LandingPageDeleteFoldersBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageDetachFromLangGroupParams $params
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        array|LandingPageDetachFromLangGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageEndAbTestParams $params
     *
     * @throws APIException
     */
    public function endAbTest(
        array|LandingPageEndAbTestParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        array|LandingPageGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageGetBatchParams $params
     *
     * @throws APIException
     */
    public function getBatch(
        array|LandingPageGetBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePage;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getDraft(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageGetFolderParams $params
     *
     * @throws APIException
     */
    public function getFolder(
        string $objectID,
        array|LandingPageGetFolderParams $params,
        ?RequestOptions $requestOptions = null,
    ): ContentFolder;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageGetFolderRevisionParams $params
     *
     * @throws APIException
     */
    public function getFolderRevision(
        string $revisionID,
        array|LandingPageGetFolderRevisionParams $params,
        ?RequestOptions $requestOptions = null,
    ): VersionContentFolder;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageGetFoldersBatchParams $params
     *
     * @throws APIException
     */
    public function getFoldersBatch(
        array|LandingPageGetFoldersBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseContentFolder;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageGetRevisionParams $params
     *
     * @throws APIException
     */
    public function getRevision(
        string $revisionID,
        array|LandingPageGetRevisionParams $params,
        ?RequestOptions $requestOptions = null,
    ): VersionPage;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageListFolderRevisionsParams $params
     *
     * @return \HubspotSDK\Page<VersionContentFolder>
     *
     * @throws APIException
     */
    public function listFolderRevisions(
        string $objectID,
        array|LandingPageListFolderRevisionsParams $params,
        ?RequestOptions $requestOptions = null,
    ): \HubspotSDK\Page;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageListFoldersParams $params
     *
     * @return \HubspotSDK\Page<ContentFolder>
     *
     * @throws APIException
     */
    public function listFolders(
        array|LandingPageListFoldersParams $params,
        ?RequestOptions $requestOptions = null,
    ): \HubspotSDK\Page;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageListRevisionsParams $params
     *
     * @return \HubspotSDK\Page<VersionPage>
     *
     * @throws APIException
     */
    public function listRevisions(
        string $objectID,
        array|LandingPageListRevisionsParams $params,
        ?RequestOptions $requestOptions = null,
    ): \HubspotSDK\Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function publishDraft(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageRerunAbTestParams $params
     *
     * @throws APIException
     */
    public function rerunAbTest(
        array|LandingPageRerunAbTestParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function resetDraft(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageRestoreFolderRevisionParams $params
     *
     * @throws APIException
     */
    public function restoreFolderRevision(
        string $revisionID,
        array|LandingPageRestoreFolderRevisionParams $params,
        ?RequestOptions $requestOptions = null,
    ): ContentFolder;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageRestoreRevisionParams $params
     *
     * @throws APIException
     */
    public function restoreRevision(
        string $revisionID,
        array|LandingPageRestoreRevisionParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageRestoreRevisionToDraftParams $params
     *
     * @throws APIException
     */
    public function restoreRevisionToDraft(
        int $revisionID,
        array|LandingPageRestoreRevisionToDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageScheduleParams $params
     *
     * @throws APIException
     */
    public function schedule(
        array|LandingPageScheduleParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageSetNewLangPrimaryParams $params
     *
     * @throws APIException
     */
    public function setNewLangPrimary(
        array|LandingPageSetNewLangPrimaryParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageUpdateBatchParams $params
     *
     * @throws APIException
     */
    public function updateBatch(
        array|LandingPageUpdateBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePage;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageUpdateDraftParams $params
     *
     * @throws APIException
     */
    public function updateDraft(
        string $objectID,
        array|LandingPageUpdateDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageUpdateFolderParams $params
     *
     * @throws APIException
     */
    public function updateFolder(
        string $objectID,
        array|LandingPageUpdateFolderParams $params,
        ?RequestOptions $requestOptions = null,
    ): ContentFolder;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageUpdateFoldersBatchParams $params
     *
     * @throws APIException
     */
    public function updateFoldersBatch(
        array|LandingPageUpdateFoldersBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseContentFolder;

    /**
     * @api
     *
     * @param array<mixed>|LandingPageUpdateLanguagesParams $params
     *
     * @throws APIException
     */
    public function updateLanguages(
        array|LandingPageUpdateLanguagesParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
