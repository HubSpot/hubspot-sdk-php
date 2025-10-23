<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Extensions\Calling;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Extensions\Calling\RecordingSettings\RecordingSettingCreateParams;
use HubspotSDK\CRM\Extensions\Calling\RecordingSettings\RecordingSettingMarkReadyParams;
use HubspotSDK\CRM\Extensions\Calling\RecordingSettings\RecordingSettingUpdateParams;
use HubspotSDK\CRM\Extensions\Calling\RecordingSettingsResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\Extensions\Calling\RecordingSettingsContract;

use const HubspotSDK\Core\OMIT as omit;

final class RecordingSettingsService implements RecordingSettingsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Register an external URL that HubSpot will use to retrieve [call recordings](https://developers.hubspot.com/docs/guides/apps/extensions/calling-extensions/recordings-and-transcriptions#register-your-app-s-endpoint-with-hubspot-using-the-calling-settings-api).
     *
     * @param string $urlToRetrieveAuthedRecording
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        $urlToRetrieveAuthedRecording,
        ?RequestOptions $requestOptions = null,
    ): RecordingSettingsResponse {
        $params = ['urlToRetrieveAuthedRecording' => $urlToRetrieveAuthedRecording];

        return $this->createRaw($appID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        int $appID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): RecordingSettingsResponse {
        [$parsed, $options] = RecordingSettingCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['crm/v3/extensions/calling/%1$s/settings/recording', $appID],
            body: (object) $parsed,
            options: $options,
            convert: RecordingSettingsResponse::class,
        );
    }

    /**
     * @api
     *
     * Update the URL that HubSpot will use to retrieve [call recordings](https://developers.hubspot.com/docs/guides/apps/extensions/calling-extensions/recordings-and-transcriptions#register-your-app-s-endpoint-with-hubspot-using-the-calling-settings-api).
     *
     * @param string $urlToRetrieveAuthedRecording
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        $urlToRetrieveAuthedRecording = omit,
        ?RequestOptions $requestOptions = null,
    ): RecordingSettingsResponse {
        $params = ['urlToRetrieveAuthedRecording' => $urlToRetrieveAuthedRecording];

        return $this->updateRaw($appID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        int $appID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): RecordingSettingsResponse {
        [$parsed, $options] = RecordingSettingUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['crm/v3/extensions/calling/%1$s/settings/recording', $appID],
            body: (object) $parsed,
            options: $options,
            convert: RecordingSettingsResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the URL that is registered for [call recording](https://developers.hubspot.com/docs/guides/apps/extensions/calling-extensions/recordings-and-transcriptions#register-your-app-s-endpoint-with-hubspot-using-the-calling-settings-api).
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): RecordingSettingsResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/extensions/calling/%1$s/settings/recording', $appID],
            options: $requestOptions,
            convert: RecordingSettingsResponse::class,
        );
    }

    /**
     * @api
     *
     * Mark a call recording as ready for transcription, specifying the call by its ID (`engagementid`).
     *
     * @param int $engagementID
     *
     * @throws APIException
     */
    public function markReady(
        $engagementID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['engagementID' => $engagementID];

        return $this->markReadyRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function markReadyRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = RecordingSettingMarkReadyParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/extensions/calling/recordings/ready',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
