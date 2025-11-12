<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations\CustomChannels;

use HubspotSDK\Conversations\CustomChannels\ChannelAccountStagingTokens\ChannelAccountStagingTokenUpdateParams;
use HubspotSDK\Conversations\CustomChannels\PublicChannelAccountStagingToken;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface ChannelAccountStagingTokensContract
{
    /**
     * @api
     *
     * @param array<mixed>|ChannelAccountStagingTokenUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $accountToken,
        array|ChannelAccountStagingTokenUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicChannelAccountStagingToken;
}
