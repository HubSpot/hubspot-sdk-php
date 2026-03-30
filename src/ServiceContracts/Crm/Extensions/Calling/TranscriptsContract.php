<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Extensions\Calling;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\Calling\CompletedThirdPartyCallResponse;
use HubspotSDK\Crm\Extensions\Calling\FormattedPhoneNumber;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateInboundCallParams\FinalCallStatus;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateResponse;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateUtterance;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptResponse;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type TranscriptCreateUtteranceShape from \HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateUtterance
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 * @phpstan-import-type FormattedPhoneNumberShape from \HubspotSDK\Crm\Extensions\Calling\FormattedPhoneNumber
 */
interface TranscriptsContract
{
    /**
     * @api
     *
     * @param list<TranscriptCreateUtterance|TranscriptCreateUtteranceShape> $transcriptCreateUtterances
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        int $engagementID,
        array $transcriptCreateUtterances,
        RequestOptions|array|null $requestOptions = null,
    ): TranscriptCreateResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $transcriptID,
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
        string $transcriptID,
        RequestOptions|array|null $requestOptions = null
    ): TranscriptResponse;
}
