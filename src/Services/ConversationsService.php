<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\ConversationsContract;
use HubspotSDK\Services\Conversations\CustomChannelsService;

final class ConversationsService implements ConversationsContract
{
    /**
     * @@api
     */
    public CustomChannelsService $customChannels;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->customChannels = new CustomChannelsService($client);
    }
}
