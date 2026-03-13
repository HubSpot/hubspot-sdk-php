<?php

declare(strict_types=1);

namespace HubspotSDK;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use HubspotSDK\Core\BaseClient;
use HubspotSDK\Core\Util;
use HubspotSDK\Services\AccountService;
use HubspotSDK\Services\AuthService;
use HubspotSDK\Services\AutomationService;
use HubspotSDK\Services\BusinessUnitsService;
use HubspotSDK\Services\CmsService;
use HubspotSDK\Services\ConversationsService;
use HubspotSDK\Services\CrmService;
use HubspotSDK\Services\EventsService;
use HubspotSDK\Services\FilesService;
use HubspotSDK\Services\MarketingService;
use HubspotSDK\Services\SchedulerService;
use HubspotSDK\Services\SettingsService;
use HubspotSDK\Services\WebhooksService;

/**
 * @phpstan-import-type NormalizedRequest from \HubspotSDK\Core\BaseClient
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
class Client extends BaseClient
{
    /**
     * @api
     */
    public AccountService $account;

    /**
     * @api
     */
    public AuthService $auth;

    /**
     * @api
     */
    public AutomationService $automation;

    /**
     * @api
     */
    public BusinessUnitsService $businessUnits;

    /**
     * @api
     */
    public CmsService $cms;

    /**
     * @api
     */
    public ConversationsService $conversations;

    /**
     * @api
     */
    public CrmService $crm;

    /**
     * @api
     */
    public EventsService $events;

    /**
     * @api
     */
    public FilesService $files;

    /**
     * @api
     */
    public MarketingService $marketing;

    /**
     * @api
     */
    public SchedulerService $scheduler;

    /**
     * @api
     */
    public SettingsService $settings;

    /**
     * @api
     */
    public WebhooksService $webhooks;

    /**
     * @param RequestOpts|null $requestOptions
     */
    public function __construct(
        public ?string $accessToken = null,
        public ?string $developerAPIKey = null,
        ?string $baseUrl = null,
        RequestOptions|array|null $requestOptions = null,
    ) {
        $baseUrl ??= Util::getenv('HUBSPOT_BASE_URL') ?: 'https://api.hubapi.com';

        $options = RequestOptions::parse(
            RequestOptions::with(
                uriFactory: Psr17FactoryDiscovery::findUriFactory(),
                streamFactory: Psr17FactoryDiscovery::findStreamFactory(),
                requestFactory: Psr17FactoryDiscovery::findRequestFactory(),
                transporter: Psr18ClientDiscovery::find(),
            ),
            $requestOptions,
        );

        parent::__construct(
            headers: [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'User-Agent' => sprintf('hubspot/PHP %s', VERSION),
                'X-Stainless-Lang' => 'php',
                'X-Stainless-Package-Version' => '0.0.1',
                'X-Stainless-Arch' => Util::machtype(),
                'X-Stainless-OS' => Util::ostype(),
                'X-Stainless-Runtime' => php_sapi_name(),
                'X-Stainless-Runtime-Version' => phpversion(),
            ],
            baseUrl: $baseUrl,
            options: $options
        );

        $this->account = new AccountService($this);
        $this->auth = new AuthService($this);
        $this->automation = new AutomationService($this);
        $this->businessUnits = new BusinessUnitsService($this);
        $this->cms = new CmsService($this);
        $this->conversations = new ConversationsService($this);
        $this->crm = new CrmService($this);
        $this->events = new EventsService($this);
        $this->files = new FilesService($this);
        $this->marketing = new MarketingService($this);
        $this->scheduler = new SchedulerService($this);
        $this->settings = new SettingsService($this);
        $this->webhooks = new WebhooksService($this);
    }

    /** @return array<string,string> */
    protected function authHeaders(): array
    {
        return $this->accessToken ? [
            'Authorization' => "Bearer {$this->accessToken}",
        ] : [];
    }

    /** @return array<string,string> */
    protected function authQuery(): array
    {
        return $this->developerAPIKey ? ['hapikey' => $this->developerAPIKey] : [];
    }

    /**
     * @internal
     *
     * @param string|list<string> $path
     * @param array<string,mixed> $query
     * @param array<string,string|int|list<string|int>|null> $headers
     * @param RequestOpts|null $opts
     *
     * @return array{NormalizedRequest, RequestOptions}
     */
    protected function buildRequest(
        string $method,
        string|array $path,
        array $query,
        array $headers,
        mixed $body,
        RequestOptions|array|null $opts,
    ): array {
        return parent::buildRequest(
            method: $method,
            path: $path,
            query: [...$this->authQuery(), ...$query],
            headers: [...$this->authHeaders(), ...$headers],
            body: $body,
            opts: $opts,
        );
    }
}
