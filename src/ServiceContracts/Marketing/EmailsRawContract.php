<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Emails\AggregateEmailStatistics;
use HubspotSDK\Marketing\Emails\CollectionResponseWithTotalEmailStatisticInterval;
use HubspotSDK\Marketing\Emails\EmailCloneParams;
use HubspotSDK\Marketing\Emails\EmailCreateAbTestVariationParams;
use HubspotSDK\Marketing\Emails\EmailCreateParams;
use HubspotSDK\Marketing\Emails\EmailDeleteParams;
use HubspotSDK\Marketing\Emails\EmailGetAbTestVariationParams;
use HubspotSDK\Marketing\Emails\EmailGetHistogramParams;
use HubspotSDK\Marketing\Emails\EmailGetParams;
use HubspotSDK\Marketing\Emails\EmailGetRevisionParams;
use HubspotSDK\Marketing\Emails\EmailListParams;
use HubspotSDK\Marketing\Emails\EmailListRevisionsParams;
use HubspotSDK\Marketing\Emails\EmailRestoreRevisionParams;
use HubspotSDK\Marketing\Emails\EmailRestoreRevisionToDraftParams;
use HubspotSDK\Marketing\Emails\EmailUpdateDraftParams;
use HubspotSDK\Marketing\Emails\EmailUpdateParams;
use HubspotSDK\Marketing\Emails\PublicEmail;
use HubspotSDK\Marketing\Emails\PublicEmailVersion;
use HubspotSDK\Marketing\Emails\VersionPublicEmail;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface EmailsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|EmailCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function create(
        array|EmailCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $emailID Path param
     * @param array<string,mixed>|EmailUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function update(
        string $emailID,
        array|EmailUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EmailListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PublicEmail>>
     *
     * @throws APIException
     */
    public function list(
        array|EmailListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EmailDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $emailID,
        array|EmailDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EmailCloneParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function clone(
        array|EmailCloneParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EmailCreateAbTestVariationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function createAbTestVariation(
        array|EmailCreateAbTestVariationParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EmailGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AggregateEmailStatistics>
     *
     * @throws APIException
     */
    public function get(
        array|EmailGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EmailGetAbTestVariationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function getAbTestVariation(
        string $emailID,
        array|EmailGetAbTestVariationParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function getDraft(
        string $emailID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EmailGetHistogramParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseWithTotalEmailStatisticInterval>
     *
     * @throws APIException
     */
    public function getHistogram(
        array|EmailGetHistogramParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EmailGetRevisionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicEmailVersion>
     *
     * @throws APIException
     */
    public function getRevision(
        string $revisionID,
        array|EmailGetRevisionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EmailListRevisionsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<VersionPublicEmail>>
     *
     * @throws APIException
     */
    public function listRevisions(
        string $emailID,
        array|EmailListRevisionsParams $params,
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
    public function publish(
        string $emailID,
        RequestOptions|array|null $requestOptions = null
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
    public function resetDraft(
        string $emailID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EmailRestoreRevisionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function restoreRevision(
        string $revisionID,
        array|EmailRestoreRevisionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EmailRestoreRevisionToDraftParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function restoreRevisionToDraft(
        int $revisionID,
        array|EmailRestoreRevisionToDraftParams $params,
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
    public function unpublish(
        string $emailID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EmailUpdateDraftParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function updateDraft(
        string $emailID,
        array|EmailUpdateDraftParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
