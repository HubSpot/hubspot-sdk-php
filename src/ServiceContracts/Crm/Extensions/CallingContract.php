<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm\Extensions;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Extensions\Calling\CallingCreateInboundCallParams\FinalCallStatus;
use HubSpotSDK\Crm\Extensions\Calling\ChannelConnectionSettingsResponse;
use HubSpotSDK\Crm\Extensions\Calling\CompletedThirdPartyCallResponse;
use HubSpotSDK\Crm\Extensions\Calling\FormattedPhoneNumber;
use HubSpotSDK\Crm\Extensions\Calling\RecordingSettingsResponse;
use HubSpotSDK\Crm\Extensions\Calling\SettingsResponse;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 * @phpstan-import-type FormattedPhoneNumberShape from \HubSpotSDK\Crm\Extensions\Calling\FormattedPhoneNumber
 */
interface CallingContract
{
    /**
     * @api
     *
     * @param bool $isReady indicates whether the channel connection settings are ready
     * @param string $url the URL associated with the channel connection settings
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createChannelConnectionSettings(
        int $appID,
        bool $isReady,
        string $url,
        RequestOptions|array|null $requestOptions = null,
    ): ChannelConnectionSettingsResponse;

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
     * @param int $engagementID the unique identifier for the engagement associated with the call recording
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createRecordingReady(
        int $engagementID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $urlToRetrieveAuthedRecording the URL used to access authenticated call recordings
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createRecordingSettings(
        int $appID,
        string $urlToRetrieveAuthedRecording,
        RequestOptions|array|null $requestOptions = null,
    ): RecordingSettingsResponse;

    /**
     * @api
     *
     * @param int $height specifies the height of the calling extension interface
     * @param bool $isReady indicates if the calling extension is ready for use
     * @param string $name the name of the calling extension
     * @param bool $supportsCustomObjects indicates if the calling extension supports custom objects
     * @param bool $supportsInboundCalling indicates if the calling extension supports inbound calling
     * @param string $url the URL associated with the calling extension
     * @param bool $usesCallingWindow indicates if the calling extension uses a separate calling window
     * @param bool $usesRemote indicates if the calling extension uses remote services
     * @param int $width specifies the width of the calling extension interface
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createSettings(
        int $appID,
        int $height,
        bool $isReady,
        string $name,
        bool $supportsCustomObjects,
        bool $supportsInboundCalling,
        string $url,
        bool $usesCallingWindow,
        bool $usesRemote,
        int $width,
        RequestOptions|array|null $requestOptions = null,
    ): SettingsResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteChannelConnectionSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getChannelConnectionSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): ChannelConnectionSettingsResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getRecordingSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): RecordingSettingsResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): SettingsResponse;

    /**
     * @api
     *
     * @param bool $isReady indicates whether the channel connection settings are ready
     * @param string $url the URL for the channel connection settings
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateChannelConnectionSettings(
        int $appID,
        ?bool $isReady = null,
        ?string $url = null,
        RequestOptions|array|null $requestOptions = null,
    ): ChannelConnectionSettingsResponse;

    /**
     * @api
     *
     * @param string $urlToRetrieveAuthedRecording the URL used to access authenticated call recordings
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateRecordingSettings(
        int $appID,
        ?string $urlToRetrieveAuthedRecording = null,
        RequestOptions|array|null $requestOptions = null,
    ): RecordingSettingsResponse;

    /**
     * @api
     *
     * @param int $height the height setting for the calling extension interface
     * @param bool $isReady specifies whether the calling extension is ready for use
     * @param string $name the name of the calling extension
     * @param bool $supportsCustomObjects indicates if the calling extension supports custom objects
     * @param bool $supportsInboundCalling indicates if the calling extension supports inbound calling
     * @param string $url the URL associated with the calling extension settings
     * @param bool $usesCallingWindow indicates if the calling extension uses a calling window
     * @param bool $usesRemote indicates if the calling extension uses a remote connection
     * @param int $width the width setting for the calling extension interface
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateSettings(
        int $appID,
        ?int $height = null,
        ?bool $isReady = null,
        ?string $name = null,
        ?bool $supportsCustomObjects = null,
        ?bool $supportsInboundCalling = null,
        ?string $url = null,
        ?bool $usesCallingWindow = null,
        ?bool $usesRemote = null,
        ?int $width = null,
        RequestOptions|array|null $requestOptions = null,
    ): SettingsResponse;
}
