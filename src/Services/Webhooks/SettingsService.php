<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Webhooks;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Webhooks\SettingsContract;
use HubspotSDK\Webhooks\Settings\SettingUpdateParams;
use HubspotSDK\Webhooks\SettingsResponse;
use HubspotSDK\Webhooks\ThrottlingSettings;

final class SettingsService implements SettingsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Update webhook settings for the specified app.
     *
     * @param array{
     *   targetURL: string,
     *   throttling: array{maxConcurrentRequests: int}|ThrottlingSettings,
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
            method: 'put',
            path: ['webhooks/v3/%1$s/settings', $appID],
            body: (object) $parsed,
            options: $options,
            convert: SettingsResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the webhook settings for the specified app, including the webhook’s target URL, throttle configuration, and create/update date.
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): SettingsResponse {
        /** @var BaseResponse<SettingsResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['webhooks/v3/%1$s/settings', $appID],
            options: $requestOptions,
            convert: SettingsResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete the webhook settings for the specified app. Event subscriptions will not be deleted, but will be paused until another webhook is created.
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
            path: ['webhooks/v3/%1$s/settings', $appID],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
    }
}
