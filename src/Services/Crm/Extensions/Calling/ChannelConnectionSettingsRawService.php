<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Extensions\Calling;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\Calling\ChannelConnectionSettings\ChannelConnectionSettingCreateParams;
use HubspotSDK\Crm\Extensions\Calling\ChannelConnectionSettings\ChannelConnectionSettingUpdateParams;
use HubspotSDK\Crm\Extensions\Calling\ChannelConnectionSettingsResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Extensions\Calling\ChannelConnectionSettingsRawContract;

final class ChannelConnectionSettingsRawService implements ChannelConnectionSettingsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{
     *   isReady: bool, url: string
     * }|ChannelConnectionSettingCreateParams $params
     *
     * @return BaseResponse<ChannelConnectionSettingsResponse>
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|ChannelConnectionSettingCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ChannelConnectionSettingCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   isReady?: bool, url?: string
     * }|ChannelConnectionSettingUpdateParams $params
     *
     * @return BaseResponse<ChannelConnectionSettingsResponse>
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        array|ChannelConnectionSettingUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ChannelConnectionSettingUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @return BaseResponse<ChannelConnectionSettingsResponse>
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'crm/v3/extensions/calling/%1$s/settings/channel-connection', $appID,
            ],
            options: $requestOptions,
            convert: ChannelConnectionSettingsResponse::class,
        );
    }
}
