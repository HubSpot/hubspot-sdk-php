<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm;

use HubSpotSDK\Client;
use HubSpotSDK\ServiceContracts\Crm\AssociationsSchemaContract;
use HubSpotSDK\Services\Crm\AssociationsSchema\LabelsService;
use HubSpotSDK\Services\Crm\AssociationsSchema\LimitsService;

final class AssociationsSchemaService implements AssociationsSchemaContract
{
    /**
     * @api
     */
    public AssociationsSchemaRawService $raw;

    /**
     * @api
     */
    public LabelsService $labels;

    /**
     * @api
     */
    public LimitsService $limits;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AssociationsSchemaRawService($client);
        $this->labels = new LabelsService($client);
        $this->limits = new LimitsService($client);
    }
}
