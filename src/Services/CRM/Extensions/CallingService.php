<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Extensions;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Extensions\Calling\CallingCreateParams;
use HubspotSDK\CRM\Extensions\Calling\CallingMarkAsReadyParams;
use HubspotSDK\CRM\Extensions\Calling\CallingRegisterURLFormatParams;
use HubspotSDK\CRM\Extensions\Calling\CallingUpdateParams;
use HubspotSDK\CRM\Extensions\Calling\CallingUpdateURLFormatParams;
use HubspotSDK\CRM\Extensions\Calling\ChannelConnectionSettingsResponse;
use HubspotSDK\CRM\Extensions\Calling\RecordingSettingsResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\Extensions\CallingContract;

use const HubspotSDK\Core\OMIT as omit;

final class CallingService implements CallingContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Configure [channel connection settings](https://developers.hubspot.com/docs/guides/api/crm/extensions/third-party-calling#create-channel-connection-settings) for the app.
     *
     * @param bool $isReady If true, this app will be considered to support channel connection
     * @param string $url The URL to fetch phone numbers available for channel connection
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        $isReady,
        $url,
        ?RequestOptions $requestOptions = null
    ): ChannelConnectionSettingsResponse {
        $params = ['isReady' => $isReady, 'url' => $url];

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
    ): ChannelConnectionSettingsResponse {
        [$parsed, $options] = CallingCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'crm/v3/extensions/calling/%1$s/settings/channel-connection', $appID,
            ],
            body: (object) $parsed,
            options: $options,
            convert: ChannelConnectionSettingsResponse::class,
        );
    }

    /**
     * @api
     *
     * Update existing [channel connection settings](https://developers.hubspot.com/docs/guides/api/crm/extensions/third-party-calling#manage-the-webhook-settings-for-channel-connection) for your app.
     *
     * @param bool $isReady If true, this app will be considered to support channel connection
     * @param string $url The URL to fetch phone numbers available for channel connection
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        $isReady = omit,
        $url = omit,
        ?RequestOptions $requestOptions = null,
    ): ChannelConnectionSettingsResponse {
        $params = ['isReady' => $isReady, 'url' => $url];

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
    ): ChannelConnectionSettingsResponse {
        [$parsed, $options] = CallingUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: [
                'crm/v3/extensions/calling/%1$s/settings/channel-connection', $appID,
            ],
            body: (object) $parsed,
            options: $options,
            convert: ChannelConnectionSettingsResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete the [channel connection settings](https://developers.hubspot.com/docs/guides/api/crm/extensions/third-party-calling#delete-existing-channel-connection-settings) for the app.
     *
     * @throws APIException
     */
    public function delete(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: [
                'crm/v3/extensions/calling/%1$s/settings/channel-connection', $appID,
            ],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve the URL that is registered for [call recording](https://developers.hubspot.com/docs/guides/apps/extensions/calling-extensions/recordings-and-transcriptions#register-your-app-s-endpoint-with-hubspot-using-the-calling-settings-api).
     *
     * @throws APIException
     */
    public function getURLFormat(
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
    public function markAsReady(
        $engagementID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['engagementID' => $engagementID];

        return $this->markAsReadyRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function markAsReadyRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = CallingMarkAsReadyParams::parseRequest(
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

    /**
     * @api
     *
     * Retrieve the settings related to the app's [channel connection](https://developers.hubspot.com/docs/guides/api/crm/extensions/third-party-calling#fetch-existing-channel-connection-settings).
     *
     * @throws APIException
     */
    public function read(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): ChannelConnectionSettingsResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'crm/v3/extensions/calling/%1$s/settings/channel-connection', $appID,
            ],
            options: $requestOptions,
            convert: ChannelConnectionSettingsResponse::class,
        );
    }

    /**
     * @api
     *
     * Register an external URL that HubSpot will use to retrieve [call recordings](https://developers.hubspot.com/docs/guides/apps/extensions/calling-extensions/recordings-and-transcriptions#register-your-app-s-endpoint-with-hubspot-using-the-calling-settings-api).
     *
     * @param string $urlToRetrieveAuthedRecording
     *
     * @throws APIException
     */
    public function registerURLFormat(
        int $appID,
        $urlToRetrieveAuthedRecording,
        ?RequestOptions $requestOptions = null,
    ): RecordingSettingsResponse {
        $params = ['urlToRetrieveAuthedRecording' => $urlToRetrieveAuthedRecording];

        return $this->registerURLFormatRaw($appID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function registerURLFormatRaw(
        int $appID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): RecordingSettingsResponse {
        [$parsed, $options] = CallingRegisterURLFormatParams::parseRequest(
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
    public function updateURLFormat(
        int $appID,
        $urlToRetrieveAuthedRecording = omit,
        ?RequestOptions $requestOptions = null,
    ): RecordingSettingsResponse {
        $params = ['urlToRetrieveAuthedRecording' => $urlToRetrieveAuthedRecording];

        return $this->updateURLFormatRaw($appID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateURLFormatRaw(
        int $appID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): RecordingSettingsResponse {
        [$parsed, $options] = CallingUpdateURLFormatParams::parseRequest(
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
}
