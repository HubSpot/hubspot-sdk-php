<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\CRMContract;
use HubspotSDK\Services\CRM\AppUninstallsService;
use HubspotSDK\Services\CRM\AssociationsService;
use HubspotSDK\Services\CRM\ExportsService;
use HubspotSDK\Services\CRM\ExtensionsService;
use HubspotSDK\Services\CRM\FeatureFlagsService;
use HubspotSDK\Services\CRM\ImportsService;
use HubspotSDK\Services\CRM\LimitsService;
use HubspotSDK\Services\CRM\ListsService;
use HubspotSDK\Services\CRM\ObjectLibraryService;
use HubspotSDK\Services\CRM\ObjectsService;
use HubspotSDK\Services\CRM\OwnersService;
use HubspotSDK\Services\CRM\PipelinesService;
use HubspotSDK\Services\CRM\PropertiesService;
use HubspotSDK\Services\CRM\PropertyValidationsService;
use HubspotSDK\Services\CRM\TimelineService;
use HubspotSDK\Services\CRM\UsersService;

final class CRMService implements CRMContract
{
    /**
     * @@api
     */
    public AppUninstallsService $appUninstalls;

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
    public FeatureFlagsService $featureFlags;

    /**
     * @@api
     */
    public ImportsService $imports;

    /**
     * @@api
     */
    public LimitsService $limits;

    /**
     * @@api
     */
    public ListsService $lists;

    /**
     * @@api
     */
    public ObjectLibraryService $objectLibrary;

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
    public PropertyValidationsService $propertyValidations;

    /**
     * @@api
     */
    public TimelineService $timeline;

    /**
     * @@api
     */
    public UsersService $users;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->appUninstalls = new AppUninstallsService($client);
        $this->associations = new AssociationsService($client);
        $this->exports = new ExportsService($client);
        $this->extensions = new ExtensionsService($client);
        $this->featureFlags = new FeatureFlagsService($client);
        $this->imports = new ImportsService($client);
        $this->limits = new LimitsService($client);
        $this->lists = new ListsService($client);
        $this->objectLibrary = new ObjectLibraryService($client);
        $this->objects = new ObjectsService($client);
        $this->owners = new OwnersService($client);
        $this->pipelines = new PipelinesService($client);
        $this->properties = new PropertiesService($client);
        $this->propertyValidations = new PropertyValidationsService($client);
        $this->timeline = new TimelineService($client);
        $this->users = new UsersService($client);
    }
}
