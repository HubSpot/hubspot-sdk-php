<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Extensions\Calling;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\Calling\Settings\SettingCreateParams;
use HubspotSDK\Crm\Extensions\Calling\Settings\SettingUpdateParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Extensions\Calling\SettingsContract;
use HubspotSDK\Webhooks\SettingsResponse;

final class SettingsService implements SettingsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{
     *   height: int,
     *   isReady: bool,
     *   name: string,
     *   supportsCustomObjects: bool,
     *   supportsInboundCalling: bool,
     *   url: string,
     *   usesCallingWindow: bool,
     *   usesRemote: bool,
     *   width: int,
     * }|SettingCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|SettingCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SettingsResponse {
        [$parsed, $options] = SettingCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<SettingsResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['crm/v3/extensions/calling/%1$s/settings', $appID],
            body: (object) $parsed,
            options: $options,
            convert: SettingsResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * @param array{
     *   height?: int,
     *   isReady?: bool,
     *   name?: string,
     *   supportsCustomObjects?: bool,
     *   supportsInboundCalling?: bool,
     *   url?: string,
     *   usesCallingWindow?: bool,
     *   usesRemote?: bool,
     *   width?: int,
     * }|SettingUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        array|SettingUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SettingsResponse {
        [$parsed, $options] = SettingUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<SettingsResponse> */
        $response = $this->client->request(
            method: 'patch',
            path: ['crm/v3/extensions/calling/%1$s/settings', $appID],
            body: (object) $parsed,
            options: $options,
            convert: SettingsResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['crm/v3/extensions/calling/%1$s/settings', $appID],
            options: $requestOptions,
            convert: null,
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
    ): SettingsResponse {
        /** @var BaseResponse<SettingsResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['crm/v3/extensions/calling/%1$s/settings', $appID],
            options: $requestOptions,
            convert: SettingsResponse::class,
        );

        return $response->parse();
    }
}
