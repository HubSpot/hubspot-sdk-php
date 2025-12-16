<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Automation\Sequences;

use HubspotSDK\Automation\Sequences\Enrollments\EnrollmentEnrollParams;
use HubspotSDK\Automation\Sequences\PublicSequenceEnrollmentLiteResponse;
use HubspotSDK\Automation\Sequences\PublicSequenceEnrollmentResponse;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface EnrollmentsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|EnrollmentEnrollParams $params
     *
     * @return BaseResponse<PublicSequenceEnrollmentLiteResponse>
     *
     * @throws APIException
     */
    public function enroll(
        array|EnrollmentEnrollParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<PublicSequenceEnrollmentResponse>
     *
     * @throws APIException
     */
    public function getByContactID(
        string $contactID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
