<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Conversations;

use HubspotSDK\Conversations\PublicChannel;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface ChannelsContract
{
    /**
     * @api
     *
     * @param list<string> $sort
     *
     * @return Page<PublicChannel>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?int $defaultPageLength = null,
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
        int $channelID,
        ?RequestOptions $requestOptions = null
    ): PublicChannel;
}
