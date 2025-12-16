<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Extensions\Calling;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\Calling\ChannelConnectionSettings\ChannelConnectionSettingCreateParams;
use HubspotSDK\Crm\Extensions\Calling\ChannelConnectionSettings\ChannelConnectionSettingUpdateParams;
use HubspotSDK\Crm\Extensions\Calling\ChannelConnectionSettingsResponse;
use HubspotSDK\RequestOptions;

interface ChannelConnectionSettingsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ChannelConnectionSettingCreateParams $params
     *
     * @return BaseResponse<ChannelConnectionSettingsResponse>
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|ChannelConnectionSettingCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ChannelConnectionSettingUpdateParams $params
     *
     * @return BaseResponse<ChannelConnectionSettingsResponse>
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        array|ChannelConnectionSettingUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

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
    ): BaseResponse;

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
    ): BaseResponse;
}
