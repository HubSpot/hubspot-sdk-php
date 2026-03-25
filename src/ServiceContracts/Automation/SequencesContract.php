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
     * @param string $userID The unique identifier of the user whose sequences are to be retrieved. This parameter is required.
     * @param string $after The paging cursor token of the last successfully read resource. Use this for pagination to retrieve the next set of results.
     * @param int $limit the maximum number of results to display per page
     * @param string $name the name of the sequence to filter results by
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
     * @param string $userID Query param: The unique identifier of the user performing the enrollment. This parameter is required.
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
     * @param string $sequenceID the unique identifier of the sequence to retrieve
     * @param string $userID The unique identifier of the user requesting the sequence details. This parameter is required.
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
     * @param string $contactID the unique identifier of the contact whose sequence enrollment details are being retrieved
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEnrollmentByContactID(
        string $contactID,
        RequestOptions|array|null $requestOptions = null
    ): PublicSequenceEnrollmentResponse;
}
