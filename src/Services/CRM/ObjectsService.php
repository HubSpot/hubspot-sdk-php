<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\CRM\ObjectsContract;
use HubspotSDK\Services\CRM\Objects\CompaniesService;
use HubspotSDK\Services\CRM\Objects\ContactsService;
use HubspotSDK\Services\CRM\Objects\DealsService;
use HubspotSDK\Services\CRM\Objects\SchemasService;

final class ObjectsService implements ObjectsContract
{
    /**
     * @@api
     */
    public CompaniesService $companies;

    /**
     * @@api
     */
    public ContactsService $contacts;

    /**
     * @@api
     */
    public DealsService $deals;

    /**
     * @@api
     */
    public SchemasService $schemas;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->companies = new CompaniesService($client);
        $this->contacts = new ContactsService($client);
        $this->deals = new DealsService($client);
        $this->schemas = new SchemasService($client);
    }
}
