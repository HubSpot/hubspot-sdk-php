<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Extensions\Calling;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Extensions\Calling\Settings\SettingCreateParams;
use HubspotSDK\CRM\Extensions\Calling\Settings\SettingUpdateParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\Extensions\Calling\SettingsContract;
use HubspotSDK\Webhooks\SettingsResponse;

use const HubspotSDK\Core\OMIT as omit;

final class SettingsService implements SettingsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Set the menu label, target iframe URL, and dimensions for your calling extension.
     *
     * @param string $name the name of your calling service to display to users
     * @param string $url the URL to your phone/calling UI, built with the [Calling SDK](#)
     * @param int $height the target height of the iframe that will contain your phone/calling UI
     * @param bool $isReady When true, this indicates that your calling app is ready for production. Users will be able to select your calling app as their provider and can then click to dial within HubSpot.
     * @param bool $supportsCustomObjects when true, users will be able to click to dial from custom objects
     * @param bool $supportsInboundCalling when true, this indicates that your calling app supports inbound calling within HubSpot
     * @param bool $usesCallingWindow when false, this indicates that your calling app does not require the use of the separate calling window to hold the call connection
     * @param bool $usesRemote when false, this indicates that your calling app does not use the anchored calling remote within the HubSpot app
     * @param int $width the target width of the iframe that will contain your phone/calling UI
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        $name,
        $url,
        $height = omit,
        $isReady = omit,
        $supportsCustomObjects = omit,
        $supportsInboundCalling = omit,
        $usesCallingWindow = omit,
        $usesRemote = omit,
        $width = omit,
        ?RequestOptions $requestOptions = null,
    ): SettingsResponse {
        $params = [
            'name' => $name,
            'url' => $url,
            'height' => $height,
            'isReady' => $isReady,
            'supportsCustomObjects' => $supportsCustomObjects,
            'supportsInboundCalling' => $supportsInboundCalling,
            'usesCallingWindow' => $usesCallingWindow,
            'usesRemote' => $usesRemote,
            'width' => $width,
        ];

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
    ): SettingsResponse {
        [$parsed, $options] = SettingCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['crm/v3/extensions/calling/%1$s/settings', $appID],
            body: (object) $parsed,
            options: $options,
            convert: SettingsResponse::class,
        );
    }

    /**
     * @api
     *
     * Update existing calling extension settings.
     *
     * @param int $height the target height of the iframe that will contain your phone/calling UI
     * @param bool $isReady When true, this indicates that your calling app is ready for production. Users will be able to select your calling app as their provider and can then click to dial within HubSpot.
     * @param string $name the name of your calling service to display to users
     * @param bool $supportsCustomObjects when true, users will be able to click to dial from custom objects
     * @param bool $supportsInboundCalling when true, this indicates that your calling app supports inbound calling within HubSpot
     * @param string $url the URL to your phone/calling UI, built with the [Calling SDK](#)
     * @param bool $usesCallingWindow when false, this indicates that your calling app does not require the use of the separate calling window to hold the call connection
     * @param bool $usesRemote when false, this indicates that your calling app does not use the anchored calling remote within the HubSpot app
     * @param int $width the target width of the iframe that will contain your phone/calling UI
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        $height = omit,
        $isReady = omit,
        $name = omit,
        $supportsCustomObjects = omit,
        $supportsInboundCalling = omit,
        $url = omit,
        $usesCallingWindow = omit,
        $usesRemote = omit,
        $width = omit,
        ?RequestOptions $requestOptions = null,
    ): SettingsResponse {
        $params = [
            'height' => $height,
            'isReady' => $isReady,
            'name' => $name,
            'supportsCustomObjects' => $supportsCustomObjects,
            'supportsInboundCalling' => $supportsInboundCalling,
            'url' => $url,
            'usesCallingWindow' => $usesCallingWindow,
            'usesRemote' => $usesRemote,
            'width' => $width,
        ];

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
    ): SettingsResponse {
        [$parsed, $options] = SettingUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['crm/v3/extensions/calling/%1$s/settings', $appID],
            body: (object) $parsed,
            options: $options,
            convert: SettingsResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a calling extension. This will remove your service as an option for all connected accounts.
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
            path: ['crm/v3/extensions/calling/%1$s/settings', $appID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve the settings configured for the app.
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): SettingsResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/extensions/calling/%1$s/settings', $appID],
            options: $requestOptions,
            convert: SettingsResponse::class,
        );
    }
}
