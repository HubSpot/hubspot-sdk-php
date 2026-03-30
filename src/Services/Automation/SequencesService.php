<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Automation;

use HubspotSDK\Automation\Sequences\PublicSequenceEnrollmentLiteResponse;
use HubspotSDK\Automation\Sequences\PublicSequenceEnrollmentResponse;
use HubspotSDK\Automation\Sequences\PublicSequenceLiteResponse;
use HubspotSDK\Automation\Sequences\PublicSequenceResponse;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Automation\SequencesContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class SequencesService implements SequencesContract
{
    /**
     * @api
     */
    public SequencesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SequencesRawService($client);
    }

    /**
     * @api
     *
     * Retrieve a list of sequences available in your HubSpot account. This endpoint allows you to filter sequences by user ID and name, and supports pagination for large result sets. Use this endpoint to manage and review your sequences effectively.
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<PublicSequenceLiteResponse>
     *
     * @throws APIException
     */
    public function list(
        string $userID,
        ?string $after = null,
        ?int $limit = null,
        ?string $name = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            [
                'userID' => $userID,
                'after' => $after,
                'limit' => $limit,
                'name' => $name,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Enroll a contact into a sequence using the specified user ID and sequence details.
     *
     * @param string $userID Query param
     * @param string $contactID body param: The unique identifier of the contact to be enrolled in the sequence
     * @param string $senderEmail body param: The email address of the sender enrolling the contact in the sequence
     * @param string $sequenceID body param: The unique identifier of the sequence in which the contact will be enrolled
     * @param string $senderAliasAddress body param: The alias email address used by the sender when enrolling the contact
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createEnrollment(
        string $userID,
        string $contactID,
        string $senderEmail,
        string $sequenceID,
        ?string $senderAliasAddress = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicSequenceEnrollmentLiteResponse {
        $params = Util::removeNulls(
            [
                'userID' => $userID,
                'contactID' => $contactID,
                'senderEmail' => $senderEmail,
                'sequenceID' => $sequenceID,
                'senderAliasAddress' => $senderAliasAddress,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createEnrollment(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve details of a specific sequence by its ID.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $sequenceID,
        string $userID,
        RequestOptions|array|null $requestOptions = null,
    ): PublicSequenceResponse {
        $params = Util::removeNulls(['userID' => $userID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($sequenceID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the enrollment status of a contact in sequences by their contact ID.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEnrollmentByContactID(
        string $contactID,
        RequestOptions|array|null $requestOptions = null
    ): PublicSequenceEnrollmentResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getEnrollmentByContactID($contactID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
