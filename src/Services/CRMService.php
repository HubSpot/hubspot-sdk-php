<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\CRMContract;
use HubspotSDK\Services\CRM\AssociationsService;
use HubspotSDK\Services\CRM\ExportsService;
use HubspotSDK\Services\CRM\ExtensionsService;
use HubspotSDK\Services\CRM\ImportsService;
use HubspotSDK\Services\CRM\ListsService;
use HubspotSDK\Services\CRM\ObjectsService;
use HubspotSDK\Services\CRM\OwnersService;
use HubspotSDK\Services\CRM\PipelinesService;
use HubspotSDK\Services\CRM\PropertiesService;
use HubspotSDK\Services\CRM\TimelineService;

final class CRMService implements CRMContract
{
    /**
     * @@api
     */
    public AssociationsService $associations;

    /**
     * @@api
     */
    public ExportsService $exports;

    /**
     * @@api
     */
    public ExtensionsService $extensions;

    /**
     * @@api
     */
    public ImportsService $imports;

    /**
     * @@api
     */
    public ListsService $lists;

    /**
     * @@api
     */
    public ObjectsService $objects;

    /**
     * @@api
     */
    public OwnersService $owners;

    /**
     * @@api
     */
    public PipelinesService $pipelines;

    /**
     * @@api
     */
    public PropertiesService $properties;

    /**
     * @@api
     */
    public TimelineService $timeline;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->associations = new AssociationsService($client);
        $this->exports = new ExportsService($client);
        $this->extensions = new ExtensionsService($client);
        $this->imports = new ImportsService($client);
        $this->lists = new ListsService($client);
        $this->objects = new ObjectsService($client);
        $this->owners = new OwnersService($client);
        $this->pipelines = new PipelinesService($client);
        $this->properties = new PropertiesService($client);
        $this->timeline = new TimelineService($client);
    }
}
