<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Extensions\Calling;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\Calling\RecordingSettings\RecordingSettingCreateParams;
use HubspotSDK\Crm\Extensions\Calling\RecordingSettings\RecordingSettingMarkReadyParams;
use HubspotSDK\Crm\Extensions\Calling\RecordingSettings\RecordingSettingUpdateParams;
use HubspotSDK\Crm\Extensions\Calling\RecordingSettingsResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Extensions\Calling\RecordingSettingsContract;

final class RecordingSettingsService implements RecordingSettingsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{
     *   urlToRetrieveAuthedRecording: string
     * }|RecordingSettingCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|RecordingSettingCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): RecordingSettingsResponse {
        [$parsed, $options] = RecordingSettingCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<RecordingSettingsResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['crm/v3/extensions/calling/%1$s/settings/recording', $appID],
            body: (object) $parsed,
            options: $options,
            convert: RecordingSettingsResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * @param array{
     *   urlToRetrieveAuthedRecording?: string
     * }|RecordingSettingUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        array|RecordingSettingUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): RecordingSettingsResponse {
        [$parsed, $options] = RecordingSettingUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<RecordingSettingsResponse> */
        $response = $this->client->request(
            method: 'patch',
            path: ['crm/v3/extensions/calling/%1$s/settings/recording', $appID],
            body: (object) $parsed,
            options: $options,
            convert: RecordingSettingsResponse::class,
        );

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
        /** @var BaseResponse<RecordingSettingsResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['crm/v3/extensions/calling/%1$s/settings/recording', $appID],
            options: $requestOptions,
            convert: RecordingSettingsResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * @param array{engagementID: int}|RecordingSettingMarkReadyParams $params
     *
     * @throws APIException
     */
    public function markReady(
        array|RecordingSettingMarkReadyParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = RecordingSettingMarkReadyParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'post',
            path: 'crm/v3/extensions/calling/recordings/ready',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );

        return $response->parse();
    }
}
