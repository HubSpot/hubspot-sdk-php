<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Webhooks;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Webhooks\SettingsRawContract;
use HubspotSDK\Webhooks\Settings\SettingUpdateParams;
use HubspotSDK\Webhooks\SettingsResponse;
use HubspotSDK\Webhooks\ThrottlingSettings;

final class SettingsRawService implements SettingsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Update webhook settings for the specified app.
     *
     * @param int $appID the ID of the app
     * @param array{
     *   targetURL: string,
     *   throttling: array{maxConcurrentRequests: int}|ThrottlingSettings,
     * }|SettingUpdateParams $params
     *
     * @return BaseResponse<SettingsResponse>
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        array|SettingUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SettingUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['webhooks/v3/%1$s/settings', $appID],
            body: (object) $parsed,
            options: $options,
            convert: SettingsResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the webhook settings for the specified app, including the webhook’s target URL, throttle configuration, and create/update date.
     *
     * @param int $appID the ID of the app
     *
     * @return BaseResponse<SettingsResponse>
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['webhooks/v3/%1$s/settings', $appID],
            options: $requestOptions,
            convert: SettingsResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete the webhook settings for the specified app. Event subscriptions will not be deleted, but will be paused until another webhook is created.
     *
     * @param int $appID the ID of the app
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
            path: ['webhooks/v3/%1$s/settings', $appID],
            options: $requestOptions,
            convert: null,
        );
    }
}
