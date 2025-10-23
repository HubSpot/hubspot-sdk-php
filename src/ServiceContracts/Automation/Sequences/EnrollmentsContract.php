<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Automation\Sequences;

use HubspotSDK\Automation\Sequences\PublicSequenceEnrollmentLiteResponse;
use HubspotSDK\Automation\Sequences\PublicSequenceEnrollmentResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface EnrollmentsContract
{
    /**
     * @api
     *
     * @param string $contactID
     * @param string $senderEmail
     * @param string $sequenceID
     * @param string $senderAliasAddress
     *
     * @throws APIException
     */
    public function enroll(
        $contactID,
        $senderEmail,
        $sequenceID,
        $senderAliasAddress = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicSequenceEnrollmentLiteResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function enrollRaw(
        array $params,
        ?RequestOptions $requestOptions = null
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
