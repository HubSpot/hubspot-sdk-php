<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Automation\Sequences;

use HubspotSDK\Automation\Sequences\Enrollments\EnrollmentEnrollParams;
use HubspotSDK\Automation\Sequences\PublicSequenceEnrollmentLiteResponse;
use HubspotSDK\Automation\Sequences\PublicSequenceEnrollmentResponse;
use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Automation\Sequences\EnrollmentsRawContract;

final class EnrollmentsRawService implements EnrollmentsRawContract
{
    // @phpstan-ignore-next-line
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
     *   userID: string,
     *   contactID: string,
     *   senderEmail: string,
     *   sequenceID: string,
     *   senderAliasAddress?: string,
     * }|EnrollmentEnrollParams $params
     *
     * @return BaseResponse<PublicSequenceEnrollmentLiteResponse>
     *
     * @throws APIException
     */
    public function enroll(
        array|EnrollmentEnrollParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = EnrollmentEnrollParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['userId']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'automation/v4/sequences/enrollments',
            query: Util::array_transform_keys(
                array_diff_key($parsed, $query_params),
                ['userID' => 'userId']
            ),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: PublicSequenceEnrollmentLiteResponse::class,
        );
    }

    /**
     * @api
     *
     * Get the enrollment status of a contact in sequences by their contact ID.
     *
     * @return BaseResponse<PublicSequenceEnrollmentResponse>
     *
     * @throws APIException
     */
    public function getByContactID(
        string $contactID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['automation/v4/sequences/enrollments/contact/%1$s', $contactID],
            options: $requestOptions,
            convert: PublicSequenceEnrollmentResponse::class,
        );
    }
}
