<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm;

use HubSpotSDK\Client;
use HubSpotSDK\ServiceContracts\Crm\ObjectsContract;
use HubSpotSDK\Services\Crm\Objects\CallsService;
use HubSpotSDK\Services\Crm\Objects\CartsService;
use HubSpotSDK\Services\Crm\Objects\CommercePaymentsService;
use HubSpotSDK\Services\Crm\Objects\CommunicationsService;
use HubSpotSDK\Services\Crm\Objects\CompaniesService;
use HubSpotSDK\Services\Crm\Objects\ContactsService;
use HubSpotSDK\Services\Crm\Objects\ContractsService;
use HubSpotSDK\Services\Crm\Objects\CoursesService;
use HubSpotSDK\Services\Crm\Objects\CustomService;
use HubSpotSDK\Services\Crm\Objects\DealsService;
use HubSpotSDK\Services\Crm\Objects\DiscountsService;
use HubSpotSDK\Services\Crm\Objects\EmailsService;
use HubSpotSDK\Services\Crm\Objects\FeedbackSubmissionsService;
use HubSpotSDK\Services\Crm\Objects\FeesService;
use HubSpotSDK\Services\Crm\Objects\GenericObjectsService;
use HubSpotSDK\Services\Crm\Objects\GoalTargetsService;
use HubSpotSDK\Services\Crm\Objects\InvoicesService;
use HubSpotSDK\Services\Crm\Objects\LeadsService;
use HubSpotSDK\Services\Crm\Objects\LineItemsService;
use HubSpotSDK\Services\Crm\Objects\ListingsService;
use HubSpotSDK\Services\Crm\Objects\MeetingsService;
use HubSpotSDK\Services\Crm\Objects\NotesService;
use HubSpotSDK\Services\Crm\Objects\OrdersService;
use HubSpotSDK\Services\Crm\Objects\PartnerClientsService;
use HubSpotSDK\Services\Crm\Objects\PartnerServicesService;
use HubSpotSDK\Services\Crm\Objects\PostalMailService;
use HubSpotSDK\Services\Crm\Objects\ProductsService;
use HubSpotSDK\Services\Crm\Objects\ProjectsService;
use HubSpotSDK\Services\Crm\Objects\QuotesService;
use HubSpotSDK\Services\Crm\Objects\ServicesService;
use HubSpotSDK\Services\Crm\Objects\SubscriptionsService;
use HubSpotSDK\Services\Crm\Objects\TasksService;
use HubSpotSDK\Services\Crm\Objects\TaxesService;
use HubSpotSDK\Services\Crm\Objects\TicketsService;
use HubSpotSDK\Services\Crm\Objects\UsersService;

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
    public GenericObjectsService $genericObjects;

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
    public ServicesService $services;

    /**
     * @api
     */
    public SubscriptionsService $subscriptions;

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
     * @api
     */
    public UsersService $users;

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
        $this->deals = new DealsService($client);
        $this->discounts = new DiscountsService($client);
        $this->emails = new EmailsService($client);
        $this->feedbackSubmissions = new FeedbackSubmissionsService($client);
        $this->fees = new FeesService($client);
        $this->genericObjects = new GenericObjectsService($client);
        $this->goalTargets = new GoalTargetsService($client);
        $this->invoices = new InvoicesService($client);
        $this->leads = new LeadsService($client);
        $this->lineItems = new LineItemsService($client);
        $this->listings = new ListingsService($client);
        $this->meetings = new MeetingsService($client);
        $this->notes = new NotesService($client);
        $this->orders = new OrdersService($client);
        $this->partnerClients = new PartnerClientsService($client);
        $this->partnerServices = new PartnerServicesService($client);
        $this->postalMail = new PostalMailService($client);
        $this->products = new ProductsService($client);
        $this->projects = new ProjectsService($client);
        $this->quotes = new QuotesService($client);
        $this->services = new ServicesService($client);
        $this->subscriptions = new SubscriptionsService($client);
        $this->tasks = new TasksService($client);
        $this->taxes = new TaxesService($client);
        $this->tickets = new TicketsService($client);
        $this->users = new UsersService($client);
    }
}
