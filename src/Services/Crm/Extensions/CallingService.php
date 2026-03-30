<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Extensions;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Extensions\Calling\CallingCreateInboundCallParams\FinalCallStatus;
use HubspotSDK\Crm\Extensions\Calling\CompletedThirdPartyCallResponse;
use HubspotSDK\Crm\Extensions\Calling\FormattedPhoneNumber;
use HubspotSDK\Crm\Extensions\Calling\RecordingSettingsResponse;
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
     * Create new recording settings for a specific app using the provided app ID.
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
    ): RecordingSettingsResponse {
        $params = Util::removeNulls(
            ['urlToRetrieveAuthedRecording' => $urlToRetrieveAuthedRecording]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($appID, params: $params, requestOptions: $requestOptions);

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
    public function update(
        int $appID,
        ?string $urlToRetrieveAuthedRecording = null,
        RequestOptions|array|null $requestOptions = null,
    ): RecordingSettingsResponse {
        $params = Util::removeNulls(
            ['urlToRetrieveAuthedRecording' => $urlToRetrieveAuthedRecording]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($appID, params: $params, requestOptions: $requestOptions);

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
    public function delete(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($appID, requestOptions: $requestOptions);

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
     * Retrieve the current recording settings for a specific app using the provided app ID.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): RecordingSettingsResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($appID, requestOptions: $requestOptions);

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
    public function markReady(
        int $engagementID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(['engagementID' => $engagementID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->markReady(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
