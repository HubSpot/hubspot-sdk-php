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

function validateSingleAuth(?string $accessToken, ?string $developerAPIKey): void
{
    $provided = [];
    if (null !== $accessToken && '' !== $accessToken) {
        $provided[] = 'accessToken';
    }
    if (null !== $developerAPIKey && '' !== $developerAPIKey) {
        $provided[] = 'developerAPIKey';
    }

    if (count($provided) > 1) {
        throw new \InvalidArgumentException(
            sprintf(
                'You provided multiple authentication methods (%s), but only one can be used at a time. Please use only one of: accessToken or developerAPIKey.',
                implode(', ', $provided)
            )
        );
    }
}

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
        public ?string $developerAPIKey = null,
        ?string $baseUrl = null,
    ) {
        validateSingleAuth($this->accessToken, $this->developerAPIKey);

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
        if (!$this->accessToken) {
            return [];
        }

        return ['Authorization' => "Bearer {$this->accessToken}"];
    }

    /** @return array<string, string> */
    protected function authQuery(): array
    {
        return ['hapikey' => $this->developerAPIKey];
    }
}
