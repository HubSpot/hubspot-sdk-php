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
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface SitePagesContract
{
    /**
     * @api
     *
     * @param array<mixed>|SitePageCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|SitePageCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|SitePageUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|SitePageUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|SitePageListParams $params
     *
     * @return \HubspotSDK\Page<Page>
     *
     * @throws APIException
     */
    public function list(
        array|SitePageListParams $params,
        ?RequestOptions $requestOptions = null
    ): \HubspotSDK\Page;

    /**
     * @api
     *
     * @param array<mixed>|SitePageDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        array|SitePageDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|SitePageAttachToLangGroupParams $params
     *
     * @throws APIException
     */
    public function attachToLangGroup(
        array|SitePageAttachToLangGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|SitePageCloneParams $params
     *
     * @throws APIException
     */
    public function clone(
        array|SitePageCloneParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|SitePageCreateAbTestVariationParams $params
     *
     * @throws APIException
     */
    public function createAbTestVariation(
        array|SitePageCreateAbTestVariationParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|SitePageCreateBatchParams $params
     *
     * @throws APIException
     */
    public function createBatch(
        array|SitePageCreateBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePage;

    /**
     * @api
     *
     * @param array<mixed>|SitePageCreateLanguageVariationParams $params
     *
     * @throws APIException
     */
    public function createLanguageVariation(
        array|SitePageCreateLanguageVariationParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|SitePageDeleteBatchParams $params
     *
     * @throws APIException
     */
    public function deleteBatch(
        array|SitePageDeleteBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|SitePageDetachFromLangGroupParams $params
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        array|SitePageDetachFromLangGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|SitePageEndAbTestParams $params
     *
     * @throws APIException
     */
    public function endAbTest(
        array|SitePageEndAbTestParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|SitePageGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        array|SitePageGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|SitePageGetBatchParams $params
     *
     * @throws APIException
     */
    public function getBatch(
        array|SitePageGetBatchParams $params,
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
     * @param array<mixed>|SitePageGetRevisionParams $params
     *
     * @throws APIException
     */
    public function getRevision(
        string $revisionID,
        array|SitePageGetRevisionParams $params,
        ?RequestOptions $requestOptions = null,
    ): VersionPage;

    /**
     * @api
     *
     * @param array<mixed>|SitePageListRevisionsParams $params
     *
     * @return \HubspotSDK\Page<VersionPage>
     *
     * @throws APIException
     */
    public function listRevisions(
        string $objectID,
        array|SitePageListRevisionsParams $params,
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
     * @param array<mixed>|SitePageRerunAbTestParams $params
     *
     * @throws APIException
     */
    public function rerunAbTest(
        array|SitePageRerunAbTestParams $params,
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
     * @param array<mixed>|SitePageRestoreRevisionParams $params
     *
     * @throws APIException
     */
    public function restoreRevision(
        string $revisionID,
        array|SitePageRestoreRevisionParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|SitePageRestoreRevisionToDraftParams $params
     *
     * @throws APIException
     */
    public function restoreRevisionToDraft(
        int $revisionID,
        array|SitePageRestoreRevisionToDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|SitePageScheduleParams $params
     *
     * @throws APIException
     */
    public function schedule(
        array|SitePageScheduleParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|SitePageSetNewLangPrimaryParams $params
     *
     * @throws APIException
     */
    public function setNewLangPrimary(
        array|SitePageSetNewLangPrimaryParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|SitePageUpdateBatchParams $params
     *
     * @throws APIException
     */
    public function updateBatch(
        array|SitePageUpdateBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePage;

    /**
     * @api
     *
     * @param array<mixed>|SitePageUpdateDraftParams $params
     *
     * @throws APIException
     */
    public function updateDraft(
        string $objectID,
        array|SitePageUpdateDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|SitePageUpdateLanguagesParams $params
     *
     * @throws APIException
     */
    public function updateLanguages(
        array|SitePageUpdateLanguagesParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
