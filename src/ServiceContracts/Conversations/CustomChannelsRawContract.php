<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations;

use HubspotSDK\Conversations\CustomChannels\CustomChannelCreateParams;
use HubspotSDK\Conversations\CustomChannels\CustomChannelGetParams;
use HubspotSDK\Conversations\CustomChannels\CustomChannelListParams;
use HubspotSDK\Conversations\CustomChannels\CustomChannelUpdateParams;
use HubspotSDK\Conversations\CustomChannels\PublicChannelAccount;
use HubspotSDK\Conversations\CustomChannels\PublicChannelIntegrationChannel;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface CustomChannelsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CustomChannelCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicChannelIntegrationChannel>
     *
     * @throws APIException
     */
    public function create(
        array|CustomChannelCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CustomChannelUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicChannelIntegrationChannel>
     *
     * @throws APIException
     */
    public function update(
        int $channelID,
        array|CustomChannelUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CustomChannelListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PublicChannelIntegrationChannel>>
     *
     * @throws APIException
     */
    public function list(
        array|CustomChannelListParams $params,
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
        int $channelID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $channelAccountID Path param
     * @param array<string,mixed>|CustomChannelGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicChannelAccount>
     *
     * @throws APIException
     */
    public function get(
        int $channelAccountID,
        array|CustomChannelGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
