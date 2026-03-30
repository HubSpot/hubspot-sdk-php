<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Automation;

use HubspotSDK\Automation\Sequences\PublicSequenceEnrollmentLiteResponse;
use HubspotSDK\Automation\Sequences\PublicSequenceEnrollmentResponse;
use HubspotSDK\Automation\Sequences\PublicSequenceLiteResponse;
use HubspotSDK\Automation\Sequences\PublicSequenceResponse;
use HubspotSDK\Automation\Sequences\SequenceCreateEnrollmentParams;
use HubspotSDK\Automation\Sequences\SequenceGetParams;
use HubspotSDK\Automation\Sequences\SequenceListParams;
use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Automation\SequencesRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class SequencesRawService implements SequencesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a list of sequences available in your HubSpot account. This endpoint allows you to filter sequences by user ID and name, and supports pagination for large result sets. Use this endpoint to manage and review your sequences effectively.
     *
     * @param array{
     *   userID: string, after?: string, limit?: int, name?: string
     * }|SequenceListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PublicSequenceLiteResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|SequenceListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SequenceListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'automation/sequences/2026-03',
            query: Util::array_transform_keys($parsed, ['userID' => 'userId']),
            options: $options,
            convert: PublicSequenceLiteResponse::class,
            page: Page::class,
        );
    }

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
     * }|SequenceCreateEnrollmentParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicSequenceEnrollmentLiteResponse>
     *
     * @throws APIException
     */
    public function createEnrollment(
        array|SequenceCreateEnrollmentParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SequenceCreateEnrollmentParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['userID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'automation/sequences/2026-03/enrollments',
            query: Util::array_transform_keys(
                array_intersect_key($parsed, $query_params),
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
     * Retrieve details of a specific sequence by its ID.
     *
     * @param array{userID: string}|SequenceGetParams $params
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
    ): BaseResponse {
        [$parsed, $options] = SequenceGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['automation/sequences/2026-03/%1$s', $sequenceID],
            query: Util::array_transform_keys($parsed, ['userID' => 'userId']),
            options: $options,
            convert: PublicSequenceResponse::class,
        );
    }

    /**
     * @api
     *
     * Get the enrollment status of a contact in sequences by their contact ID.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'automation/sequences/2026-03/enrollments/contact/%1$s', $contactID,
            ],
            options: $requestOptions,
            convert: PublicSequenceEnrollmentResponse::class,
        );
    }
}
