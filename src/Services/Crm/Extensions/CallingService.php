<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Extensions;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Extensions\Calling\CallingCreateInboundCallParams\FinalCallStatus;
use HubspotSDK\Crm\Extensions\Calling\ChannelConnectionSettingsResponse;
use HubspotSDK\Crm\Extensions\Calling\CompletedThirdPartyCallResponse;
use HubspotSDK\Crm\Extensions\Calling\FormattedPhoneNumber;
use HubspotSDK\Crm\Extensions\Calling\RecordingSettingsResponse;
use HubspotSDK\Crm\Extensions\Calling\SettingsResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Extensions\CallingContract;
use HubspotSDK\Services\Crm\Extensions\Calling\TranscriptsService;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 * @phpstan-import-type FormattedPhoneNumberShape from \HubspotSDK\Crm\Extensions\Calling\FormattedPhoneNumber
 */
final class CallingService implements CallingContract
{
    /**
     * @api
     */
    public CallingRawService $raw;

    /**
     * @api
     */
    public TranscriptsService $transcripts;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CallingRawService($client);
        $this->transcripts = new TranscriptsService($client);
    }

    /**
     * @api
     *
     * Establish new channel connection settings for the specified app.
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
    ): ChannelConnectionSettingsResponse {
        $params = Util::removeNulls(['isReady' => $isReady, 'url' => $url]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createChannelConnectionSettings($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): CompletedThirdPartyCallResponse {
        $params = Util::removeNulls(
            [
                'createEngagement' => $createEngagement,
                'engagementProperties' => $engagementProperties,
                'externalCallID' => $externalCallID,
                'finalCallStatus' => $finalCallStatus,
                'fromNumber' => $fromNumber,
                'potentialRecipientUserIDs' => $potentialRecipientUserIDs,
                'toNumber' => $toNumber,
                'callStartedTimestamp' => $callStartedTimestamp,
                'durationSeconds' => $durationSeconds,
                'userID' => $userID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createInboundCall(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This endpoint is used to mark a call recording as ready. It requires the engagementId to identify the specific recording.
     *
     * @param int $engagementID the unique identifier for the engagement associated with the call recording
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createRecordingReady(
        int $engagementID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(['engagementID' => $engagementID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createRecordingReady(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create new recording settings for a specific app using the provided app ID.
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
    ): RecordingSettingsResponse {
        $params = Util::removeNulls(
            ['urlToRetrieveAuthedRecording' => $urlToRetrieveAuthedRecording]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createRecordingSettings($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create new settings for the calling extension associated with the specified appId.
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
    ): SettingsResponse {
        $params = Util::removeNulls(
            [
                'height' => $height,
                'isReady' => $isReady,
                'name' => $name,
                'supportsCustomObjects' => $supportsCustomObjects,
                'supportsInboundCalling' => $supportsInboundCalling,
                'url' => $url,
                'usesCallingWindow' => $usesCallingWindow,
                'usesRemote' => $usesRemote,
                'width' => $width,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createSettings($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete the channel connection settings associated with the specified app.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteChannelConnectionSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteChannelConnectionSettings($appID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Remove the calling extension settings associated with the specified appId. This action cannot be undone.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteSettings($appID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Access the current channel connection settings for the specified app.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getChannelConnectionSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): ChannelConnectionSettingsResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getChannelConnectionSettings($appID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the current recording settings for a specific app using the provided app ID.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getRecordingSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): RecordingSettingsResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getRecordingSettings($appID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the current settings of the calling extension for the specified appId.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): SettingsResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getSettings($appID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Modify the existing channel connection settings for the specified app.
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
    ): ChannelConnectionSettingsResponse {
        $params = Util::removeNulls(['isReady' => $isReady, 'url' => $url]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateChannelConnectionSettings($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the recording settings for a specific app using the provided app ID.
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
    ): RecordingSettingsResponse {
        $params = Util::removeNulls(
            ['urlToRetrieveAuthedRecording' => $urlToRetrieveAuthedRecording]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateRecordingSettings($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Modify existing calling extension settings for the specified appId. Only the fields provided in the request will be updated.
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
    ): SettingsResponse {
        $params = Util::removeNulls(
            [
                'height' => $height,
                'isReady' => $isReady,
                'name' => $name,
                'supportsCustomObjects' => $supportsCustomObjects,
                'supportsInboundCalling' => $supportsInboundCalling,
                'url' => $url,
                'usesCallingWindow' => $usesCallingWindow,
                'usesRemote' => $usesRemote,
                'width' => $width,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateSettings($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
