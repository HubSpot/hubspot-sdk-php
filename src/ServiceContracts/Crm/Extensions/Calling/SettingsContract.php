<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Extensions\Calling;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\Webhooks\SettingsResponse;

interface SettingsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        int $height,
        bool $isReady,
        string $name,
        bool $supportsCustomObjects,
        bool $supportsInboundCalling,
        string $url,
        bool $usesCallingWindow,
        bool $usesRemote,
        int $width,
        ?RequestOptions $requestOptions = null,
    ): SettingsResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        ?int $height = null,
        ?bool $isReady = null,
        ?string $name = null,
        ?bool $supportsCustomObjects = null,
        ?bool $supportsInboundCalling = null,
        ?string $url = null,
        ?bool $usesCallingWindow = null,
        ?bool $usesRemote = null,
        ?int $width = null,
        ?RequestOptions $requestOptions = null,
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
