<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\Objects\FeedbackSubmissions\FeedbackSubmissionGetParams;
use HubspotSDK\Crm\Objects\FeedbackSubmissions\FeedbackSubmissionListParams;
use HubspotSDK\Crm\Objects\FeedbackSubmissions\FeedbackSubmissionSearchParams;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface FeedbackSubmissionsContract
{
    /**
     * @api
     *
     * @param array<mixed>|FeedbackSubmissionListParams $params
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        array|FeedbackSubmissionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|FeedbackSubmissionGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $feedbackSubmissionID,
        array|FeedbackSubmissionGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param array<mixed>|FeedbackSubmissionSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        array|FeedbackSubmissionSearchParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalSimplePublicObject;
}
