<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations\CustomChannels;

use HubspotSDK\Conversations\CustomChannels\ChannelAccountStagingTokens\ChannelAccountStagingTokenUpdateParams;
use HubspotSDK\Conversations\CustomChannels\PublicChannelAccountStagingToken;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface ChannelAccountStagingTokensRawContract
{
    /**
     * @api
     *
     * @param string $accountToken path param: The unique token identifying the channel account staging token to update
     * @param array<string,mixed>|ChannelAccountStagingTokenUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicChannelAccountStagingToken>
     *
     * @throws APIException
     */
    public function update(
        string $accountToken,
        array|ChannelAccountStagingTokenUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
