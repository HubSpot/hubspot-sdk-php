<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Crm\ObjectsContract;
use HubspotSDK\Services\Crm\Objects\CallsService;
use HubspotSDK\Services\Crm\Objects\CartsService;
use HubspotSDK\Services\Crm\Objects\CommercePaymentsService;
use HubspotSDK\Services\Crm\Objects\CommunicationsService;
use HubspotSDK\Services\Crm\Objects\CompaniesService;
use HubspotSDK\Services\Crm\Objects\ContactsService;
use HubspotSDK\Services\Crm\Objects\ContractsService;
use HubspotSDK\Services\Crm\Objects\CoursesService;
use HubspotSDK\Services\Crm\Objects\CustomService;
use HubspotSDK\Services\Crm\Objects\DealSplitsService;
use HubspotSDK\Services\Crm\Objects\DealsService;
use HubspotSDK\Services\Crm\Objects\DiscountsService;
use HubspotSDK\Services\Crm\Objects\EmailsService;
use HubspotSDK\Services\Crm\Objects\FeedbackSubmissionsService;
use HubspotSDK\Services\Crm\Objects\FeesService;
use HubspotSDK\Services\Crm\Objects\GoalTargetsService;
use HubspotSDK\Services\Crm\Objects\InvoicesService;
use HubspotSDK\Services\Crm\Objects\LeadsService;
use HubspotSDK\Services\Crm\Objects\LineItemsService;
use HubspotSDK\Services\Crm\Objects\ListingsService;
use HubspotSDK\Services\Crm\Objects\MeetingsService;
use HubspotSDK\Services\Crm\Objects\NotesService;
use HubspotSDK\Services\Crm\Objects\OrdersService;
use HubspotSDK\Services\Crm\Objects\PartnerClientsService;
use HubspotSDK\Services\Crm\Objects\PartnerServicesService;
use HubspotSDK\Services\Crm\Objects\PostalMailService;
use HubspotSDK\Services\Crm\Objects\ProductsService;
use HubspotSDK\Services\Crm\Objects\ProjectsService;
use HubspotSDK\Services\Crm\Objects\QuotesService;
use HubspotSDK\Services\Crm\Objects\SchemasService;
use HubspotSDK\Services\Crm\Objects\ServicesService;
use HubspotSDK\Services\Crm\Objects\TasksService;
use HubspotSDK\Services\Crm\Objects\TaxesService;
use HubspotSDK\Services\Crm\Objects\TicketsService;

final class ObjectsService implements ObjectsContract
{
    /**
     * @api
     */
    public ObjectsRawService $raw;

    /**
     * @api
     */
    public CallsService $calls;

    /**
     * @api
     */
    public CartsService $carts;

    /**
     * @api
     */
    public CommercePaymentsService $commercePayments;

    /**
     * @api
     */
    public CommunicationsService $communications;

    /**
     * @api
     */
    public CompaniesService $companies;

    /**
     * @api
     */
    public ContactsService $contacts;

    /**
     * @api
     */
    public ContractsService $contracts;

    /**
     * @api
     */
    public CoursesService $courses;

    /**
     * @api
     */
    public CustomService $custom;

    /**
     * @api
     */
    public DealSplitsService $dealSplits;

    /**
     * @api
     */
    public DealsService $deals;

    /**
     * @api
     */
    public DiscountsService $discounts;

    /**
     * @api
     */
    public EmailsService $emails;

    /**
     * @api
     */
    public FeedbackSubmissionsService $feedbackSubmissions;

    /**
     * @api
     */
    public FeesService $fees;

    /**
     * @api
     */
    public GoalTargetsService $goalTargets;

    /**
     * @api
     */
    public InvoicesService $invoices;

    /**
     * @api
     */
    public LeadsService $leads;

    /**
     * @api
     */
    public LineItemsService $lineItems;

    /**
     * @api
     */
    public ListingsService $listings;

    /**
     * @api
     */
    public MeetingsService $meetings;

    /**
     * @api
     */
    public NotesService $notes;

    /**
     * @api
     */
    public Objects\ObjectsService $objects;

    /**
     * @api
     */
    public OrdersService $orders;

    /**
     * @api
     */
    public PartnerClientsService $partnerClients;

    /**
     * @api
     */
    public PartnerServicesService $partnerServices;

    /**
     * @api
     */
    public PostalMailService $postalMail;

    /**
     * @api
     */
    public ProductsService $products;

    /**
     * @api
     */
    public ProjectsService $projects;

    /**
     * @api
     */
    public QuotesService $quotes;

    /**
     * @api
     */
    public SchemasService $schemas;

    /**
     * @api
     */
    public ServicesService $services;

    /**
     * @api
     */
    public TasksService $tasks;

    /**
     * @api
     */
    public TaxesService $taxes;

    /**
     * @api
     */
    public TicketsService $tickets;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ObjectsRawService($client);
        $this->calls = new CallsService($client);
        $this->carts = new CartsService($client);
        $this->commercePayments = new CommercePaymentsService($client);
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
        $this->projects = new ProjectsService($client);
        $this->quotes = new QuotesService($client);
        $this->schemas = new SchemasService($client);
        $this->services = new ServicesService($client);
        $this->tasks = new TasksService($client);
        $this->taxes = new TaxesService($client);
        $this->tickets = new TicketsService($client);
    }
}
