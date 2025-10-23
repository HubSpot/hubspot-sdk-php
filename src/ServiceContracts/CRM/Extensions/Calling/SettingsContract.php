<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM\Extensions\Calling;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\Webhooks\SettingsResponse;

use const HubspotSDK\Core\OMIT as omit;

interface SettingsContract
{
    /**
     * @api
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
    ): SettingsResponse;

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
    ): SettingsResponse;

    /**
     * @api
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
    ): SettingsResponse;

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
    ): SettingsResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): SettingsResponse;
}
