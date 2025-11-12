<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Automation\Sequences;

use HubspotSDK\Automation\Sequences\Enrollments\EnrollmentEnrollParams;
use HubspotSDK\Automation\Sequences\PublicSequenceEnrollmentLiteResponse;
use HubspotSDK\Automation\Sequences\PublicSequenceEnrollmentResponse;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Automation\Sequences\EnrollmentsContract;

final class EnrollmentsService implements EnrollmentsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Enroll a contact into a sequence using the specified user ID and sequence details.
     *
     * @param array{
     *   contactId: string,
     *   senderEmail: string,
     *   sequenceId: string,
     *   senderAliasAddress?: string,
     * }|EnrollmentEnrollParams $params
     *
     * @throws APIException
     */
    public function enroll(
        array|EnrollmentEnrollParams $params,
        ?RequestOptions $requestOptions = null
    ): PublicSequenceEnrollmentLiteResponse {
        [$parsed, $options] = EnrollmentEnrollParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'automation/v4/sequences/enrollments',
            body: (object) $parsed,
            options: $options,
            convert: PublicSequenceEnrollmentLiteResponse::class,
        );
    }

    /**
     * @api
     *
     * Get the enrollment status of a contact in sequences by their contact ID.
     *
     * @throws APIException
     */
    public function getByContactID(
        string $contactID,
        ?RequestOptions $requestOptions = null
    ): PublicSequenceEnrollmentResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['automation/v4/sequences/enrollments/contact/%1$s', $contactID],
            options: $requestOptions,
            convert: PublicSequenceEnrollmentResponse::class,
        );
    }
}
