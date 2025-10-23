<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\CRM\ObjectsContract;
use HubspotSDK\Services\CRM\Objects\CompaniesService;
use HubspotSDK\Services\CRM\Objects\ContactsService;
use HubspotSDK\Services\CRM\Objects\CustomService;
use HubspotSDK\Services\CRM\Objects\DealSplitsService;
use HubspotSDK\Services\CRM\Objects\DealsService;
use HubspotSDK\Services\CRM\Objects\MeetingsService;
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
    public CustomService $custom;

    /**
     * @@api
     */
    public DealSplitsService $dealSplits;

    /**
     * @@api
     */
    public DealsService $deals;

    /**
     * @@api
     */
    public MeetingsService $meetings;

    /**
     * @@api
     */
    public Objects\ObjectsService $objects;

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
        $this->custom = new CustomService($client);
        $this->dealSplits = new DealSplitsService($client);
        $this->deals = new DealsService($client);
        $this->meetings = new MeetingsService($client);
        $this->objects = new Objects\ObjectsService($client);
        $this->schemas = new SchemasService($client);
    }
}
