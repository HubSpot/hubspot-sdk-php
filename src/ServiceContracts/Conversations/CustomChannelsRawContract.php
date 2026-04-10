<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Conversations;

use HubSpotSDK\Conversations\CustomChannels\CustomChannelCreateParams;
use HubSpotSDK\Conversations\CustomChannels\CustomChannelGetParams;
use HubSpotSDK\Conversations\CustomChannels\CustomChannelListParams;
use HubSpotSDK\Conversations\CustomChannels\CustomChannelUpdateParams;
use HubSpotSDK\Conversations\CustomChannels\PublicChannelAccount;
use HubSpotSDK\Conversations\CustomChannels\PublicChannelIntegrationChannel;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
