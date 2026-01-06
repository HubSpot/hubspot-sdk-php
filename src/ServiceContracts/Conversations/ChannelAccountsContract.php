<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations;

use HubspotSDK\Conversations\PublicChannelAccount;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface ChannelAccountsContract
{
    /**
     * @api
     *
     * @param list<int> $channelID
     * @param list<int> $inboxID
     * @param list<string> $sort
     *
     * @return Page<PublicChannelAccount>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?bool $archived = null,
        ?array $channelID = null,
        ?int $defaultPageLength = null,
        ?array $inboxID = null,
        ?int $limit = null,
        ?array $sort = null,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        int $channelAccountID,
        bool $archived = false,
        ?RequestOptions $requestOptions = null,
    ): PublicChannelAccount;
}
