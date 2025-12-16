<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Emails\EmailCloneParams;
use HubspotSDK\Marketing\Emails\EmailCreateAbTestVariationParams;
use HubspotSDK\Marketing\Emails\EmailCreateParams;
use HubspotSDK\Marketing\Emails\EmailDeleteParams;
use HubspotSDK\Marketing\Emails\EmailGetAbTestVariationParams;
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

interface EmailsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|EmailCreateParams $params
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function create(
        array|EmailCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $emailID Path param: The ID of the marketing email that should get updated
     * @param array<string,mixed>|EmailUpdateParams $params
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function update(
        string $emailID,
        array|EmailUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EmailListParams $params
     *
     * @return BaseResponse<Page<PublicEmail>>
     *
     * @throws APIException
     */
    public function list(
        array|EmailListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $emailID the ID of the marketing email to delete
     * @param array<string,mixed>|EmailDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $emailID,
        array|EmailDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EmailCloneParams $params
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function clone(
        array|EmailCloneParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EmailCreateAbTestVariationParams $params
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function createAbTestVariation(
        array|EmailCreateAbTestVariationParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $emailID the marketing email ID
     * @param array<string,mixed>|EmailGetParams $params
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function get(
        string $emailID,
        array|EmailGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $emailID the ID of an A/B marketing email
     * @param array<string,mixed>|EmailGetAbTestVariationParams $params
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function getAbTestVariation(
        string $emailID,
        array|EmailGetAbTestVariationParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $emailID the marketing email ID
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function getDraft(
        string $emailID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $revisionID the ID of a revision
     * @param array<string,mixed>|EmailGetRevisionParams $params
     *
     * @return BaseResponse<VersionPublicEmail>
     *
     * @throws APIException
     */
    public function getRevision(
        string $revisionID,
        array|EmailGetRevisionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $emailID the marketing email ID
     * @param array<string,mixed>|EmailListRevisionsParams $params
     *
     * @return BaseResponse<Page<VersionPublicEmail>>
     *
     * @throws APIException
     */
    public function listRevisions(
        string $emailID,
        array|EmailListRevisionsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $emailID the marketing email ID
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function publish(
        string $emailID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $emailID the marketing email ID
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function resetDraft(
        string $emailID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $revisionID the ID of a revision
     * @param array<string,mixed>|EmailRestoreRevisionParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function restoreRevision(
        string $revisionID,
        array|EmailRestoreRevisionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $revisionID the ID of a revision
     * @param array<string,mixed>|EmailRestoreRevisionToDraftParams $params
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function restoreRevisionToDraft(
        int $revisionID,
        array|EmailRestoreRevisionToDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $emailID the ID of the email to unpublish
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function unpublish(
        string $emailID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $emailID the marketing email ID
     * @param array<string,mixed>|EmailUpdateDraftParams $params
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function updateDraft(
        string $emailID,
        array|EmailUpdateDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
