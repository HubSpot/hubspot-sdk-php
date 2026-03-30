<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Automation;

use HubspotSDK\Automation\Sequences\PublicSequenceEnrollmentLiteResponse;
use HubspotSDK\Automation\Sequences\PublicSequenceEnrollmentResponse;
use HubspotSDK\Automation\Sequences\PublicSequenceLiteResponse;
use HubspotSDK\Automation\Sequences\PublicSequenceResponse;
use HubspotSDK\Automation\Sequences\SequenceCreateEnrollmentParams;
use HubspotSDK\Automation\Sequences\SequenceGetParams;
use HubspotSDK\Automation\Sequences\SequenceListParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface SequencesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SequenceListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PublicSequenceLiteResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|SequenceListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SequenceCreateEnrollmentParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicSequenceEnrollmentLiteResponse>
     *
     * @throws APIException
     */
    public function createEnrollment(
        array|SequenceCreateEnrollmentParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SequenceGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicSequenceResponse>
     *
     * @throws APIException
     */
    public function get(
        string $sequenceID,
        array|SequenceGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicSequenceEnrollmentResponse>
     *
     * @throws APIException
     */
    public function getEnrollmentByContactID(
        string $contactID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
