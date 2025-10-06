<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Conversations;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Conversations\CustomChannelsContract;
use HubspotSDK\Services\Conversations\CustomChannels\MessagesService;

final class CustomChannelsService implements CustomChannelsContract
{
    /**
     * @@api
     */
    public MessagesService $messages;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->messages = new MessagesService($client);
    }
}
