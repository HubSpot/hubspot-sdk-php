<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\CRM\ObjectsContract;
use HubspotSDK\Services\CRM\Objects\AppointmentsService;
use HubspotSDK\Services\CRM\Objects\CallsService;
use HubspotSDK\Services\CRM\Objects\CompaniesService;
use HubspotSDK\Services\CRM\Objects\ContactsService;
use HubspotSDK\Services\CRM\Objects\CustomService;
use HubspotSDK\Services\CRM\Objects\DealSplitsService;
use HubspotSDK\Services\CRM\Objects\DealsService;
use HubspotSDK\Services\CRM\Objects\EmailsService;
use HubspotSDK\Services\CRM\Objects\FeedbackSubmissionsService;
use HubspotSDK\Services\CRM\Objects\InvoicesService;
use HubspotSDK\Services\CRM\Objects\LeadsService;
use HubspotSDK\Services\CRM\Objects\LineItemsService;
use HubspotSDK\Services\CRM\Objects\MeetingsService;
use HubspotSDK\Services\CRM\Objects\NotesService;
use HubspotSDK\Services\CRM\Objects\PartnerClientsService;
use HubspotSDK\Services\CRM\Objects\SchemasService;
use HubspotSDK\Services\CRM\Objects\ServicesService;
use HubspotSDK\Services\CRM\Objects\TasksService;
use HubspotSDK\Services\CRM\Objects\TaxesService;
use HubspotSDK\Services\CRM\Objects\TicketsService;

final class ObjectsService implements ObjectsContract
{
    /**
     * @@api
     */
    public AppointmentsService $appointments;

    /**
     * @@api
     */
    public CallsService $calls;

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
    public EmailsService $emails;

    /**
     * @@api
     */
    public FeedbackSubmissionsService $feedbackSubmissions;

    /**
     * @@api
     */
    public InvoicesService $invoices;

    /**
     * @@api
     */
    public LeadsService $leads;

    /**
     * @@api
     */
    public LineItemsService $lineItems;

    /**
     * @@api
     */
    public MeetingsService $meetings;

    /**
     * @@api
     */
    public NotesService $notes;

    /**
     * @@api
     */
    public Objects\ObjectsService $objects;

    /**
     * @@api
     */
    public PartnerClientsService $partnerClients;

    /**
     * @@api
     */
    public SchemasService $schemas;

    /**
     * @@api
     */
    public ServicesService $services;

    /**
     * @@api
     */
    public TasksService $tasks;

    /**
     * @@api
     */
    public TaxesService $taxes;

    /**
     * @@api
     */
    public TicketsService $tickets;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->appointments = new AppointmentsService($client);
        $this->calls = new CallsService($client);
        $this->companies = new CompaniesService($client);
        $this->contacts = new ContactsService($client);
        $this->custom = new CustomService($client);
        $this->dealSplits = new DealSplitsService($client);
        $this->deals = new DealsService($client);
        $this->emails = new EmailsService($client);
        $this->feedbackSubmissions = new FeedbackSubmissionsService($client);
        $this->invoices = new InvoicesService($client);
        $this->leads = new LeadsService($client);
        $this->lineItems = new LineItemsService($client);
        $this->meetings = new MeetingsService($client);
        $this->notes = new NotesService($client);
        $this->objects = new Objects\ObjectsService($client);
        $this->partnerClients = new PartnerClientsService($client);
        $this->schemas = new SchemasService($client);
        $this->services = new ServicesService($client);
        $this->tasks = new TasksService($client);
        $this->taxes = new TaxesService($client);
        $this->tickets = new TicketsService($client);
    }
}
