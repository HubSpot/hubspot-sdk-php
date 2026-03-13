<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Extensions\Calling;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\Calling\ChannelConnectionSettings\ChannelConnectionSettingCreateParams;
use HubspotSDK\Crm\Extensions\Calling\ChannelConnectionSettings\ChannelConnectionSettingUpdateParams;
use HubspotSDK\Crm\Extensions\Calling\ChannelConnectionSettingsResponse;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface ChannelConnectionSettingsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ChannelConnectionSettingCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ChannelConnectionSettingsResponse>
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|ChannelConnectionSettingCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ChannelConnectionSettingUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ChannelConnectionSettingsResponse>
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        array|ChannelConnectionSettingUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ChannelConnectionSettingsResponse>
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
