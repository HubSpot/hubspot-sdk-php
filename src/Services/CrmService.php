<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\CrmContract;
use HubspotSDK\Services\Crm\AppUninstallsService;
use HubspotSDK\Services\Crm\AssociationsService;
use HubspotSDK\Services\Crm\ExportsService;
use HubspotSDK\Services\Crm\ExtensionsService;
use HubspotSDK\Services\Crm\FeatureFlagsService;
use HubspotSDK\Services\Crm\ImportsService;
use HubspotSDK\Services\Crm\LimitsService;
use HubspotSDK\Services\Crm\ListsService;
use HubspotSDK\Services\Crm\ObjectLibraryService;
use HubspotSDK\Services\Crm\ObjectsService;
use HubspotSDK\Services\Crm\OwnersService;
use HubspotSDK\Services\Crm\PipelinesService;
use HubspotSDK\Services\Crm\PropertiesService;
use HubspotSDK\Services\Crm\PropertyValidationsService;
use HubspotSDK\Services\Crm\SubscriptionsService;
use HubspotSDK\Services\Crm\TimelineService;
use HubspotSDK\Services\Crm\UsersService;

final class CrmService implements CrmContract
{
    /**
     * @api
     */
    public CrmRawService $raw;

    /**
     * @api
     */
    public AppUninstallsService $appUninstalls;

    /**
     * @api
     */
    public AssociationsService $associations;

    /**
     * @api
     */
    public ExportsService $exports;

    /**
     * @api
     */
    public ExtensionsService $extensions;

    /**
     * @api
     */
    public FeatureFlagsService $featureFlags;

    /**
     * @api
     */
    public ImportsService $imports;

    /**
     * @api
     */
    public LimitsService $limits;

    /**
     * @api
     */
    public ListsService $lists;

    /**
     * @api
     */
    public ObjectLibraryService $objectLibrary;

    /**
     * @api
     */
    public ObjectsService $objects;

    /**
     * @api
     */
    public OwnersService $owners;

    /**
     * @api
     */
    public PipelinesService $pipelines;

    /**
     * @api
     */
    public PropertiesService $properties;

    /**
     * @api
     */
    public PropertyValidationsService $propertyValidations;

    /**
     * @api
     */
    public SubscriptionsService $subscriptions;

    /**
     * @api
     */
    public TimelineService $timeline;

    /**
     * @api
     */
    public UsersService $users;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CrmRawService($client);
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
        $this->subscriptions = new SubscriptionsService($client);
        $this->timeline = new TimelineService($client);
        $this->users = new UsersService($client);
    }
}
