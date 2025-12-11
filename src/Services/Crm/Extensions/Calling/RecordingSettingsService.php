<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Extensions\Calling;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Extensions\Calling\RecordingSettingsResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Extensions\Calling\RecordingSettingsContract;

final class RecordingSettingsService implements RecordingSettingsContract
{
    /**
     * @api
     */
    public RecordingSettingsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RecordingSettingsRawService($client);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        string $urlToRetrieveAuthedRecording,
        ?RequestOptions $requestOptions = null,
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
     * @throws APIException
     */
    public function update(
        int $appID,
        ?string $urlToRetrieveAuthedRecording = null,
        ?RequestOptions $requestOptions = null,
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
     * @throws APIException
     */
    public function get(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): RecordingSettingsResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($appID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function markReady(
        int $engagementID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(['engagementID' => $engagementID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->markReady(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
