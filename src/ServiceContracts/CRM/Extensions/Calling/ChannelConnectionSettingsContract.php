<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM\Extensions\Calling;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Extensions\Calling\ExtensionsCallingChannelConnectionSettingsResponse;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface ChannelConnectionSettingsContract
{
    /**
     * @api
     *
     * @param bool $isReady
     * @param string $url
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        $isReady,
        $url,
        ?RequestOptions $requestOptions = null
    ): ExtensionsCallingChannelConnectionSettingsResponse;

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
    ): ExtensionsCallingChannelConnectionSettingsResponse;

    /**
     * @api
     *
     * @param bool $isReady
     * @param string $url
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        $isReady = omit,
        $url = omit,
        ?RequestOptions $requestOptions = null,
    ): ExtensionsCallingChannelConnectionSettingsResponse;

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
    ): ExtensionsCallingChannelConnectionSettingsResponse;

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
    public function deleteRaw(
        int $appID,
        mixed $params,
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
    ): ExtensionsCallingChannelConnectionSettingsResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getRaw(
        int $appID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): ExtensionsCallingChannelConnectionSettingsResponse;
}
