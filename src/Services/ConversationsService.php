<?php

declare(strict_types=1);

namespace HubSpotSDK\Services;

use HubSpotSDK\Client;
use HubSpotSDK\ServiceContracts\ConversationsContract;
use HubSpotSDK\Services\Conversations\CustomChannelsService;
use HubSpotSDK\Services\Conversations\VisitorIdentificationService;

final class ConversationsService implements ConversationsContract
{
    /**
     * @api
     */
    public ConversationsRawService $raw;

    /**
     * @api
     */
    public CustomChannelsService $customChannels;

    /**
     * @api
     */
    public VisitorIdentificationService $visitorIdentification;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ConversationsRawService($client);
        $this->customChannels = new CustomChannelsService($client);
        $this->visitorIdentification = new VisitorIdentificationService($client);
    }
}
