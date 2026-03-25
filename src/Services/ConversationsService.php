<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\ConversationsContract;
use HubspotSDK\Services\Conversations\CustomChannelsService;
use HubspotSDK\Services\Conversations\VisitorIdentificationService;

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
