<?php

declare(strict_types=1);

namespace HubSpotSDK\Services;

use HubSpotSDK\Client;
use HubSpotSDK\ServiceContracts\CrmContract;
use HubSpotSDK\Services\Crm\AppUninstallsService;
use HubSpotSDK\Services\Crm\AssociationsSchemaService;
use HubSpotSDK\Services\Crm\AssociationsService;
use HubSpotSDK\Services\Crm\DealSplitsService;
use HubSpotSDK\Services\Crm\ExportsService;
use HubSpotSDK\Services\Crm\ExtensionsService;
use HubSpotSDK\Services\Crm\FeatureFlagsService;
use HubSpotSDK\Services\Crm\ImportsService;
use HubSpotSDK\Services\Crm\LimitsService;
use HubSpotSDK\Services\Crm\ListsService;
use HubSpotSDK\Services\Crm\ObjectLibraryService;
use HubSpotSDK\Services\Crm\ObjectSchemasService;
use HubSpotSDK\Services\Crm\ObjectsService;
use HubSpotSDK\Services\Crm\OwnersService;
use HubSpotSDK\Services\Crm\PipelinesService;
use HubSpotSDK\Services\Crm\PropertiesService;
use HubSpotSDK\Services\Crm\PropertiesValidationsService;
use HubSpotSDK\Services\Crm\TimelineService;

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
    public AssociationsSchemaService $associationsSchema;

    /**
     * @api
     */
    public DealSplitsService $dealSplits;

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
    public ObjectSchemasService $objectSchemas;

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
    public PropertiesValidationsService $propertiesValidations;

    /**
     * @api
     */
    public TimelineService $timeline;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CrmRawService($client);
        $this->appUninstalls = new AppUninstallsService($client);
        $this->associations = new AssociationsService($client);
        $this->associationsSchema = new AssociationsSchemaService($client);
        $this->dealSplits = new DealSplitsService($client);
        $this->exports = new ExportsService($client);
        $this->extensions = new ExtensionsService($client);
        $this->featureFlags = new FeatureFlagsService($client);
        $this->imports = new ImportsService($client);
        $this->limits = new LimitsService($client);
        $this->lists = new ListsService($client);
        $this->objectLibrary = new ObjectLibraryService($client);
        $this->objectSchemas = new ObjectSchemasService($client);
        $this->objects = new ObjectsService($client);
        $this->owners = new OwnersService($client);
        $this->pipelines = new PipelinesService($client);
        $this->properties = new PropertiesService($client);
        $this->propertiesValidations = new PropertiesValidationsService($client);
        $this->timeline = new TimelineService($client);
    }
}
