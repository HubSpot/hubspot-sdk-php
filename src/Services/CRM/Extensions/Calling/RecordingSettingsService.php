<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Extensions\Calling;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Extensions\Calling\ExtensionsCallingRecordingSettingsResponse;
use HubspotSDK\CRM\Extensions\Calling\RecordingSettings\RecordingSettingMarkAsReadyParams;
use HubspotSDK\CRM\Extensions\Calling\RecordingSettings\RecordingSettingRegisterURLFormatParams;
use HubspotSDK\CRM\Extensions\Calling\RecordingSettings\RecordingSettingUpdateURLFormatParams;
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
     * Retrieve recording settings
     *
     * @throws APIException
     */
    public function getURLFormat(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): ExtensionsCallingRecordingSettingsResponse {
        $params = [];

        return $this->getURLFormatRaw($appID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function getURLFormatRaw(
        int $appID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): ExtensionsCallingRecordingSettingsResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/extensions/calling/%1$s/settings/recording', $appID],
            options: $requestOptions,
            convert: ExtensionsCallingRecordingSettingsResponse::class,
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
        [$parsed, $options] = RecordingSettingMarkAsReadyParams::parseRequest(
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
    ): ExtensionsCallingRecordingSettingsResponse {
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
    ): ExtensionsCallingRecordingSettingsResponse {
        [$parsed, $options] = RecordingSettingRegisterURLFormatParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['crm/v3/extensions/calling/%1$s/settings/recording', $appID],
            body: (object) $parsed,
            options: $options,
            convert: ExtensionsCallingRecordingSettingsResponse::class,
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
    ): ExtensionsCallingRecordingSettingsResponse {
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
    ): ExtensionsCallingRecordingSettingsResponse {
        [$parsed, $options] = RecordingSettingUpdateURLFormatParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['crm/v3/extensions/calling/%1$s/settings/recording', $appID],
            body: (object) $parsed,
            options: $options,
            convert: ExtensionsCallingRecordingSettingsResponse::class,
        );
    }
}
