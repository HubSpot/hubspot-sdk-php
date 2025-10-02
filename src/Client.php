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
use HubspotSDK\Services\CRMService;
use HubspotSDK\Services\FilesService;
use HubspotSDK\Services\MarketingService;
use HubspotSDK\Services\WebhooksService;

class Client extends BaseClient
{
    public string $accessToken;

    public string $developerHapiKey;

    public string $privateAppsLegacy;

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
    public WebhooksService $webhooks;

    public function __construct(
        ?string $accessToken = null,
        ?string $developerHapiKey = null,
        ?string $privateAppsLegacy = null,
        ?string $baseUrl = null,
    ) {
        $this->accessToken = (string) (
            $accessToken ?? getenv('HUBSPOT_ACCESS_TOKEN')
        );
        $this->developerHapiKey = (string) (
            $developerHapiKey ?? getenv('DEVELOPER_HAPI_KEY')
        );
        $this->privateAppsLegacy = (string) (
            $privateAppsLegacy ?? getenv('PRIVATE_APPS_LEGACY')
        );

        $base = $baseUrl ?? getenv('HUB_SPOT_BASE_URL') ?: 'https://api.hubapi.com';

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
            baseUrl: $base,
            options: $options,
        );

        $this->account = new AccountService($this);
        $this->auth = new AuthService($this);
        $this->automation = new AutomationService($this);
        $this->cms = new CmsService($this);
        $this->crm = new CRMService($this);
        $this->files = new FilesService($this);
        $this->marketing = new MarketingService($this);
        $this->webhooks = new WebhooksService($this);
    }

    /** @return array<string, string> */
    protected function authHeaders(): array
    {
        return [...$this->privateApps(), ...$this->privateAppsLegacy1()];
    }

    /** @return array<string, string> */
    protected function authQuery(): array
    {
        return ['hapikey' => $this->developerHapiKey];
    }

    /** @return array<string, string> */
    protected function privateApps(): array
    {
        return ['private-app' => $this->accessToken];
    }

    /** @return array<string, string> */
    protected function privateAppsLegacy1(): array
    {
        return ['private-app-legacy' => $this->privateAppsLegacy];
    }
}
