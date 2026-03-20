<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Crm\ObjectsContract;
use HubspotSDK\Services\Crm\Objects\ContactsService;
use HubspotSDK\Services\Crm\Objects\CustomService;
use HubspotSDK\Services\Crm\Objects\TasksService;

final class ObjectsService implements ObjectsContract
{
    /**
     * @api
     */
    public ObjectsRawService $raw;

    /**
     * @api
     */
    public ContactsService $contacts;

    /**
     * @api
     */
    public CustomService $custom;

    /**
     * @api
     */
    public TasksService $tasks;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ObjectsRawService($client);
        $this->contacts = new ContactsService($client);
        $this->custom = new CustomService($client);
        $this->tasks = new TasksService($client);
    }
}
