<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Crm\ExtensionsContract;
use HubspotSDK\Services\Crm\Extensions\CallingService;
use HubspotSDK\Services\Crm\Extensions\CardsService;
use HubspotSDK\Services\Crm\Extensions\VideoConferencingService;

final class ExtensionsService implements ExtensionsContract
{
    /**
     * @api
     */
    public CallingService $calling;

    /**
     * @api
     */
    public CardsService $cards;

    /**
     * @api
     */
    public VideoConferencingService $videoConferencing;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->calling = new CallingService($client);
        $this->cards = new CardsService($client);
        $this->videoConferencing = new VideoConferencingService($client);
    }
}
