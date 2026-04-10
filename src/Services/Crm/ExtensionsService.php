<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm;

use HubSpotSDK\Client;
use HubSpotSDK\ServiceContracts\Crm\ExtensionsContract;
use HubSpotSDK\Services\Crm\Extensions\CallingService;
use HubSpotSDK\Services\Crm\Extensions\CardsDevService;
use HubSpotSDK\Services\Crm\Extensions\VideoConferencingService;

final class ExtensionsService implements ExtensionsContract
{
    /**
     * @api
     */
    public ExtensionsRawService $raw;

    /**
     * @api
     */
    public CallingService $calling;

    /**
     * @api
     */
    public CardsDevService $cardsDev;

    /**
     * @api
     */
    public VideoConferencingService $videoConferencing;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ExtensionsRawService($client);
        $this->calling = new CallingService($client);
        $this->cardsDev = new CardsDevService($client);
        $this->videoConferencing = new VideoConferencingService($client);
    }
}
