<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Emails\EmailCloneParams;
use HubspotSDK\Marketing\Emails\EmailCreateAbTestVariationParams;
use HubspotSDK\Marketing\Emails\EmailCreateParams;
use HubspotSDK\Marketing\Emails\EmailDeleteParams;
use HubspotSDK\Marketing\Emails\EmailGetParams;
use HubspotSDK\Marketing\Emails\EmailGetRevisionParams;
use HubspotSDK\Marketing\Emails\EmailListParams;
use HubspotSDK\Marketing\Emails\EmailListRevisionsParams;
use HubspotSDK\Marketing\Emails\EmailRestoreRevisionParams;
use HubspotSDK\Marketing\Emails\EmailRestoreRevisionToDraftParams;
use HubspotSDK\Marketing\Emails\EmailUpdateDraftParams;
use HubspotSDK\Marketing\Emails\EmailUpdateParams;
use HubspotSDK\Marketing\Emails\PublicEmail;
use HubspotSDK\Marketing\Emails\VersionPublicEmail;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface EmailsContract
{
    /**
     * @api
     *
     * @param array<mixed>|EmailCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|EmailCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): PublicEmail;

    /**
     * @api
     *
     * @param array<mixed>|EmailUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $emailID,
        array|EmailUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicEmail;

    /**
     * @api
     *
     * @param array<mixed>|EmailListParams $params
     *
     * @return Page<PublicEmail>
     *
     * @throws APIException
     */
    public function list(
        array|EmailListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|EmailDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $emailID,
        array|EmailDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|EmailCloneParams $params
     *
     * @throws APIException
     */
    public function clone(
        array|EmailCloneParams $params,
        ?RequestOptions $requestOptions = null
    ): PublicEmail;

    /**
     * @api
     *
     * @param array<mixed>|EmailCreateAbTestVariationParams $params
     *
     * @throws APIException
     */
    public function createAbTestVariation(
        array|EmailCreateAbTestVariationParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicEmail;

    /**
     * @api
     *
     * @param array<mixed>|EmailGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $emailID,
        array|EmailGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicEmail;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getAbTestVariation(
        string $emailID,
        ?RequestOptions $requestOptions = null
    ): PublicEmail;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getDraft(
        string $emailID,
        ?RequestOptions $requestOptions = null
    ): PublicEmail;

    /**
     * @api
     *
     * @param array<mixed>|EmailGetRevisionParams $params
     *
     * @throws APIException
     */
    public function getRevision(
        string $revisionID,
        array|EmailGetRevisionParams $params,
        ?RequestOptions $requestOptions = null,
    ): VersionPublicEmail;

    /**
     * @api
     *
     * @param array<mixed>|EmailListRevisionsParams $params
     *
     * @return Page<VersionPublicEmail>
     *
     * @throws APIException
     */
    public function listRevisions(
        string $emailID,
        array|EmailListRevisionsParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function publish(
        string $emailID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function resetDraft(
        string $emailID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|EmailRestoreRevisionParams $params
     *
     * @throws APIException
     */
    public function restoreRevision(
        string $revisionID,
        array|EmailRestoreRevisionParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|EmailRestoreRevisionToDraftParams $params
     *
     * @throws APIException
     */
    public function restoreRevisionToDraft(
        int $revisionID,
        array|EmailRestoreRevisionToDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicEmail;

    /**
     * @api
     *
     * @throws APIException
     */
    public function unpublish(
        string $emailID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|EmailUpdateDraftParams $params
     *
     * @throws APIException
     */
    public function updateDraft(
        string $emailID,
        array|EmailUpdateDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicEmail;
}
