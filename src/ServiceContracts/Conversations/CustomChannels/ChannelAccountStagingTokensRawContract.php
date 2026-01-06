<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations\CustomChannels;

use HubspotSDK\Conversations\CustomChannels\ChannelAccountStagingTokens\ChannelAccountStagingTokenUpdateParams;
use HubspotSDK\Conversations\CustomChannels\PublicChannelAccountStagingToken;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface ChannelAccountStagingTokensRawContract
{
    /**
     * @api
     *
     * @param string $accountToken path param: The unique token identifying the channel account staging token to update
     * @param array<mixed>|ChannelAccountStagingTokenUpdateParams $params
     *
     * @return BaseResponse<PublicChannelAccountStagingToken>
     *
     * @throws APIException
     */
    public function update(
        string $accountToken,
        array|ChannelAccountStagingTokenUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
