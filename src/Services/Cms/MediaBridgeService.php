<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Cms\MediaBridgeContract;
use HubspotSDK\Services\Cms\MediaBridge\EventsService;
use HubspotSDK\Services\Cms\MediaBridge\GroupsService;
use HubspotSDK\Services\Cms\MediaBridge\IntegratorSettingsService;
use HubspotSDK\Services\Cms\MediaBridge\PropertiesService;
use HubspotSDK\Services\Cms\MediaBridge\SchemasService;

final class MediaBridgeService implements MediaBridgeContract
{
    /**
     * @api
     */
    public EventsService $events;

    /**
     * @api
     */
    public GroupsService $groups;

    /**
     * @api
     */
    public IntegratorSettingsService $integratorSettings;

    /**
     * @api
     */
    public PropertiesService $properties;

    /**
     * @api
     */
    public SchemasService $schemas;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->events = new EventsService($client);
        $this->groups = new GroupsService($client);
        $this->integratorSettings = new IntegratorSettingsService($client);
        $this->properties = new PropertiesService($client);
        $this->schemas = new SchemasService($client);
    }
}
