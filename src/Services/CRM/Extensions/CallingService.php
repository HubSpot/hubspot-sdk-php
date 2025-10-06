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
     * Configure channel connection settings
     *
     * @param bool $isReady
     * @param string $url
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
     * Update channel connection settings
     *
     * @param bool $isReady
     * @param string $url
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
     * Delete channel connection settings
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
     * Retrieve recording settings
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
     * Mark recording as ready for transcription
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
     * Retrieve channel connection settings
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
     * Enable the app for call recording
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
     * Update recording settings
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
