<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Automation;

use HubSpotSDK\Automation\Sequences\PublicSequenceEnrollmentLiteResponse;
use HubSpotSDK\Automation\Sequences\PublicSequenceEnrollmentResponse;
use HubSpotSDK\Automation\Sequences\PublicSequenceLiteResponse;
use HubSpotSDK\Automation\Sequences\PublicSequenceResponse;
use HubSpotSDK\Automation\Sequences\SequenceCreateEnrollmentParams;
use HubSpotSDK\Automation\Sequences\SequenceGetParams;
use HubSpotSDK\Automation\Sequences\SequenceListParams;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
