<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Webhooks;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Webhooks\SettingsContract;
use HubspotSDK\Webhooks\SettingsResponse;
use HubspotSDK\Webhooks\ThrottlingSettings;

final class SettingsService implements SettingsContract
{
    /**
     * @api
     */
    public SettingsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SettingsRawService($client);
    }

    /**
     * @api
     *
     * Update webhook settings for the specified app.
     *
     * @param int $appID the ID of the app
     * @param string $targetURL a publicly available URL for HubSpot to call where event payloads will be delivered
     * @param array{
     *   maxConcurrentRequests: int
     * }|ThrottlingSettings $throttling Configuration details for webhook throttling
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        string $targetURL,
        array|ThrottlingSettings $throttling,
        ?RequestOptions $requestOptions = null,
    ): SettingsResponse {
        $params = Util::removeNulls(
            ['targetURL' => $targetURL, 'throttling' => $throttling]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the webhook settings for the specified app, including the webhook’s target URL, throttle configuration, and create/update date.
     *
     * @param int $appID the ID of the app
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): SettingsResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($appID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete the webhook settings for the specified app. Event subscriptions will not be deleted, but will be paused until another webhook is created.
     *
     * @param int $appID the ID of the app
     *
     * @throws APIException
     */
    public function delete(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($appID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
