<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Automation;

use HubspotSDK\Automation\Sequences\PublicSequenceEnrollmentLiteResponse;
use HubspotSDK\Automation\Sequences\PublicSequenceEnrollmentResponse;
use HubspotSDK\Automation\Sequences\PublicSequenceLiteResponse;
use HubspotSDK\Automation\Sequences\PublicSequenceResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface SequencesContract
{
    /**
     * @api
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
    ): Page;

    /**
     * @api
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
    ): PublicSequenceEnrollmentLiteResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $sequenceID,
        string $userID,
        RequestOptions|array|null $requestOptions = null,
    ): PublicSequenceResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEnrollmentByContactID(
        string $contactID,
        RequestOptions|array|null $requestOptions = null
    ): PublicSequenceEnrollmentResponse;
}
