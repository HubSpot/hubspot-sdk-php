<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\CRM\ObjectsContract;
use HubspotSDK\Services\CRM\Objects\AppointmentsService;
use HubspotSDK\Services\CRM\Objects\CallsService;
use HubspotSDK\Services\CRM\Objects\CartsService;
use HubspotSDK\Services\CRM\Objects\CommercePaymentsService;
use HubspotSDK\Services\CRM\Objects\CommerceSubscriptionsService;
use HubspotSDK\Services\CRM\Objects\CommunicationsService;
use HubspotSDK\Services\CRM\Objects\CompaniesService;
use HubspotSDK\Services\CRM\Objects\ContactsService;
use HubspotSDK\Services\CRM\Objects\ContractsService;
use HubspotSDK\Services\CRM\Objects\CoursesService;
use HubspotSDK\Services\CRM\Objects\CustomService;
use HubspotSDK\Services\CRM\Objects\DealSplitsService;
use HubspotSDK\Services\CRM\Objects\DealsService;
use HubspotSDK\Services\CRM\Objects\DiscountsService;
use HubspotSDK\Services\CRM\Objects\EmailsService;
use HubspotSDK\Services\CRM\Objects\FeedbackSubmissionsService;
use HubspotSDK\Services\CRM\Objects\FeesService;
use HubspotSDK\Services\CRM\Objects\GoalTargetsService;
use HubspotSDK\Services\CRM\Objects\InvoicesService;
use HubspotSDK\Services\CRM\Objects\LeadsService;
use HubspotSDK\Services\CRM\Objects\LineItemsService;
use HubspotSDK\Services\CRM\Objects\ListingsService;
use HubspotSDK\Services\CRM\Objects\MeetingsService;
use HubspotSDK\Services\CRM\Objects\NotesService;
use HubspotSDK\Services\CRM\Objects\OrdersService;
use HubspotSDK\Services\CRM\Objects\PartnerClientsService;
use HubspotSDK\Services\CRM\Objects\PartnerServicesService;
use HubspotSDK\Services\CRM\Objects\PostalMailService;
use HubspotSDK\Services\CRM\Objects\ProductsService;
use HubspotSDK\Services\CRM\Objects\QuotesService;
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
    public CartsService $carts;

    /**
     * @@api
     */
    public CommercePaymentsService $commercePayments;

    /**
     * @@api
     */
    public CommerceSubscriptionsService $commerceSubscriptions;

    /**
     * @@api
     */
    public CommunicationsService $communications;

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
    public ContractsService $contracts;

    /**
     * @@api
     */
    public CoursesService $courses;

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
    public DiscountsService $discounts;

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
    public FeesService $fees;

    /**
     * @@api
     */
    public GoalTargetsService $goalTargets;

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
    public ListingsService $listings;

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
    public OrdersService $orders;

    /**
     * @@api
     */
    public PartnerClientsService $partnerClients;

    /**
     * @@api
     */
    public PartnerServicesService $partnerServices;

    /**
     * @@api
     */
    public PostalMailService $postalMail;

    /**
     * @@api
     */
    public ProductsService $products;

    /**
     * @@api
     */
    public QuotesService $quotes;

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
        $this->carts = new CartsService($client);
        $this->commercePayments = new CommercePaymentsService($client);
        $this->commerceSubscriptions = new CommerceSubscriptionsService($client);
        $this->communications = new CommunicationsService($client);
        $this->companies = new CompaniesService($client);
        $this->contacts = new ContactsService($client);
        $this->contracts = new ContractsService($client);
        $this->courses = new CoursesService($client);
        $this->custom = new CustomService($client);
        $this->dealSplits = new DealSplitsService($client);
        $this->deals = new DealsService($client);
        $this->discounts = new DiscountsService($client);
        $this->emails = new EmailsService($client);
        $this->feedbackSubmissions = new FeedbackSubmissionsService($client);
        $this->fees = new FeesService($client);
        $this->goalTargets = new GoalTargetsService($client);
        $this->invoices = new InvoicesService($client);
        $this->leads = new LeadsService($client);
        $this->lineItems = new LineItemsService($client);
        $this->listings = new ListingsService($client);
        $this->meetings = new MeetingsService($client);
        $this->notes = new NotesService($client);
        $this->objects = new Objects\ObjectsService($client);
        $this->orders = new OrdersService($client);
        $this->partnerClients = new PartnerClientsService($client);
        $this->partnerServices = new PartnerServicesService($client);
        $this->postalMail = new PostalMailService($client);
        $this->products = new ProductsService($client);
        $this->quotes = new QuotesService($client);
        $this->schemas = new SchemasService($client);
        $this->services = new ServicesService($client);
        $this->tasks = new TasksService($client);
        $this->taxes = new TaxesService($client);
        $this->tickets = new TicketsService($client);
    }
}
