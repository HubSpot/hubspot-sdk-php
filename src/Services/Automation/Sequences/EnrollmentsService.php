<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Automation\Sequences;

use HubspotSDK\Automation\Sequences\PublicSequenceEnrollmentLiteResponse;
use HubspotSDK\Automation\Sequences\PublicSequenceEnrollmentResponse;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Automation\Sequences\EnrollmentsContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class EnrollmentsService implements EnrollmentsContract
{
    /**
     * @api
     */
    public EnrollmentsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new EnrollmentsRawService($client);
    }

    /**
     * @api
     *
     * Enroll a contact into a sequence using the specified user ID and sequence details.
     *
     * @param string $userID Query param
     * @param string $contactID Body param
     * @param string $senderEmail Body param
     * @param string $sequenceID Body param
     * @param string $senderAliasAddress Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function enroll(
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
        $response = $this->raw->enroll(params: $params, requestOptions: $requestOptions);

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
    public function getByContactID(
        string $contactID,
        RequestOptions|array|null $requestOptions = null
    ): PublicSequenceEnrollmentResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getByContactID($contactID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
