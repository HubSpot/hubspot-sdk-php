<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Automation\Sequences;

use HubspotSDK\Automation\Sequences\PublicSequenceEnrollmentLiteResponse;
use HubspotSDK\Automation\Sequences\PublicSequenceEnrollmentResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface EnrollmentsContract
{
    /**
     * @api
     *
     * @param string $userID Query param:
     * @param string $contactID Body param:
     * @param string $senderEmail Body param:
     * @param string $sequenceID Body param:
     * @param string $senderAliasAddress Body param:
     *
     * @throws APIException
     */
    public function enroll(
        string $userID,
        string $contactID,
        string $senderEmail,
        string $sequenceID,
        ?string $senderAliasAddress = null,
        ?RequestOptions $requestOptions = null,
    ): PublicSequenceEnrollmentLiteResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getByContactID(
        string $contactID,
        ?RequestOptions $requestOptions = null
    ): PublicSequenceEnrollmentResponse;
}
