<?php

declare(strict_types=1);

namespace HubspotSDK;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use HubspotSDK\Core\BaseClient;
use HubspotSDK\Services\AccountService;
use HubspotSDK\Services\AuthService;
use HubspotSDK\Services\AutomationService;
use HubspotSDK\Services\CmsService;
use HubspotSDK\Services\ConversationsService;
use HubspotSDK\Services\CRMService;
use HubspotSDK\Services\FilesService;
use HubspotSDK\Services\MarketingService;
use HubspotSDK\Services\SchedulerService;
use HubspotSDK\Services\SettingsService;
use HubspotSDK\Services\WebhooksService;

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
    public CmsService $cms;

    /**
     * @api
     */
    public ConversationsService $conversations;

    /**
     * @api
     */
    public CRMService $crm;

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

    public function __construct(
        public ?string $accessToken = null,
        public ?string $developerHapikey = null,
        ?string $baseUrl = null,
    ) {
        $baseUrl ??= getenv('HUB_SPOT_BASE_URL') ?: 'https://api.hubapi.com';

        $options = RequestOptions::with(
            uriFactory: Psr17FactoryDiscovery::findUriFactory(),
            streamFactory: Psr17FactoryDiscovery::findStreamFactory(),
            requestFactory: Psr17FactoryDiscovery::findRequestFactory(),
            transporter: Psr18ClientDiscovery::find(),
        );

        parent::__construct(
            headers: [
                'Content-Type' => 'application/json', 'Accept' => 'application/json',
            ],
            baseUrl: $baseUrl,
            options: $options,
        );

        $this->account = new AccountService($this);
        $this->auth = new AuthService($this);
        $this->automation = new AutomationService($this);
        $this->cms = new CmsService($this);
        $this->conversations = new ConversationsService($this);
        $this->crm = new CRMService($this);
        $this->files = new FilesService($this);
        $this->marketing = new MarketingService($this);
        $this->scheduler = new SchedulerService($this);
        $this->settings = new SettingsService($this);
        $this->webhooks = new WebhooksService($this);
    }

    /** @return array<string, string> */
    protected function authHeaders(): array
    {
        if (!$this->STAINLESS_FIXME_accessToken) {
            return [];
        }

        return ['Authorization' => "Bearer {$this->STAINLESS_FIXME_accessToken}"];
    }

    /** @return array<string, string> */
    protected function authQuery(): array
    {
        return ['hapikey' => $this->STAINLESS_FIXME_developerHapikey];
    }
}
