<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Crm\AssociationsSchemaContract;
use HubspotSDK\Services\Crm\AssociationsSchema\LabelsService;
use HubspotSDK\Services\Crm\AssociationsSchema\LimitsService;

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
