<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\Objects\FeedbackSubmissions\FeedbackSubmissionGetParams;
use HubspotSDK\Crm\Objects\FeedbackSubmissions\FeedbackSubmissionListParams;
use HubspotSDK\Crm\Objects\FeedbackSubmissions\FeedbackSubmissionSearchParams;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface FeedbackSubmissionsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|FeedbackSubmissionListParams $params
     *
     * @return BaseResponse<Page<SimplePublicObjectWithAssociations>>
     *
     * @throws APIException
     */
    public function list(
        array|FeedbackSubmissionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FeedbackSubmissionGetParams $params
     *
     * @return BaseResponse<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function get(
        string $feedbackSubmissionID,
        array|FeedbackSubmissionGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FeedbackSubmissionSearchParams $params
     *
     * @return BaseResponse<CollectionResponseWithTotalSimplePublicObject>
     *
     * @throws APIException
     */
    public function search(
        array|FeedbackSubmissionSearchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
