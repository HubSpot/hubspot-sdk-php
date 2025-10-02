<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\CRMContract;
use HubspotSDK\Services\CRM\AssociationsService;
use HubspotSDK\Services\CRM\ObjectSchemasService;
use HubspotSDK\Services\CRM\ObjectsService;
use HubspotSDK\Services\CRM\PipelinesService;
use HubspotSDK\Services\CRM\PropertiesService;

final class CRMService implements CRMContract
{
    /**
     * @@api
     */
    public AssociationsService $associations;

    /**
     * @@api
     */
    public ObjectSchemasService $objectSchemas;

    /**
     * @@api
     */
    public ObjectsService $objects;

    /**
     * @@api
     */
    public PipelinesService $pipelines;

    /**
     * @@api
     */
    public PropertiesService $properties;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->associations = new AssociationsService($client);
        $this->objectSchemas = new ObjectSchemasService($client);
        $this->objects = new ObjectsService($client);
        $this->pipelines = new PipelinesService($client);
        $this->properties = new PropertiesService($client);
    }
}
