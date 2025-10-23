<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\CRM\ExtensionsContract;
use HubspotSDK\Services\CRM\Extensions\CallingService;
use HubspotSDK\Services\CRM\Extensions\CardsService;
use HubspotSDK\Services\CRM\Extensions\VideoconferencingService;

final class ExtensionsService implements ExtensionsContract
{
    /**
     * @@api
     */
    public CallingService $calling;

    /**
     * @@api
     */
    public CardsService $cards;

    /**
     * @@api
     */
    public VideoconferencingService $videoconferencing;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->calling = new CallingService($client);
        $this->cards = new CardsService($client);
        $this->videoconferencing = new VideoconferencingService($client);
    }
}
