<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Extensions;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\Calling\CallingCreateInboundCallParams\FinalCallStatus;
use HubspotSDK\Crm\Extensions\Calling\CompletedThirdPartyCallResponse;
use HubspotSDK\Crm\Extensions\Calling\FormattedPhoneNumber;
use HubspotSDK\Crm\Extensions\Calling\RecordingSettingsResponse;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 * @phpstan-import-type FormattedPhoneNumberShape from \HubspotSDK\Crm\Extensions\Calling\FormattedPhoneNumber
 */
interface CallingContract
{
    /**
     * @api
     *
     * @param string $urlToRetrieveAuthedRecording the URL used to access authenticated call recordings
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        string $urlToRetrieveAuthedRecording,
        RequestOptions|array|null $requestOptions = null,
    ): RecordingSettingsResponse;

    /**
     * @api
     *
     * @param string $urlToRetrieveAuthedRecording the URL used to access authenticated call recordings
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        ?string $urlToRetrieveAuthedRecording = null,
        RequestOptions|array|null $requestOptions = null,
    ): RecordingSettingsResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param bool $createEngagement indicates whether an engagement should be created for the call
     * @param array<string,string> $engagementProperties contains additional properties related to the engagement
     * @param string $externalCallID the unique identifier for the call from an external system
     * @param FinalCallStatus|value-of<FinalCallStatus> $finalCallStatus the final status of the call, with accepted values including: BUSY, CALLING_CRM_USER, CANCELED, COMPLETED, CONNECTING, FAILED, HOLD, IN_PROGRESS, MISSED, NO_ANSWER, QUEUED, RINGING, UNKNOWN
     * @param FormattedPhoneNumber|FormattedPhoneNumberShape $fromNumber
     * @param list<int> $potentialRecipientUserIDs
     * @param FormattedPhoneNumber|FormattedPhoneNumberShape $toNumber
     * @param \DateTimeInterface $callStartedTimestamp the timestamp indicating when the call started, formatted as a date-time string
     * @param int $durationSeconds the duration of the call in seconds
     * @param int $userID the ID of the user associated with the call
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createInboundCall(
        bool $createEngagement,
        array $engagementProperties,
        string $externalCallID,
        FinalCallStatus|string $finalCallStatus,
        FormattedPhoneNumber|array $fromNumber,
        array $potentialRecipientUserIDs,
        FormattedPhoneNumber|array $toNumber,
        ?\DateTimeInterface $callStartedTimestamp = null,
        ?int $durationSeconds = null,
        ?int $userID = null,
        RequestOptions|array|null $requestOptions = null,
    ): CompletedThirdPartyCallResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): RecordingSettingsResponse;

    /**
     * @api
     *
     * @param int $engagementID the unique identifier for the engagement associated with the call recording
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function markReady(
        int $engagementID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
