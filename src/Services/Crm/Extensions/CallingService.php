<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Extensions;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Extensions\Calling\RecordingSettingsResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Extensions\CallingContract;
use HubspotSDK\Services\Crm\Extensions\Calling\TranscriptsService;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
