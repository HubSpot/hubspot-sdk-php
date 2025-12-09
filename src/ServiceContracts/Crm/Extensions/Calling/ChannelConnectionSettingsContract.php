<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Extensions\Calling;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\Calling\ChannelConnectionSettingsResponse;
use HubspotSDK\RequestOptions;

interface ChannelConnectionSettingsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        bool $isReady,
        string $url,
        ?RequestOptions $requestOptions = null,
    ): ChannelConnectionSettingsResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        ?bool $isReady = null,
        ?string $url = null,
        ?RequestOptions $requestOptions = null,
    ): ChannelConnectionSettingsResponse;

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
    ): ChannelConnectionSettingsResponse;
}
