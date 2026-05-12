<?php

declare(strict_types=1);

namespace HubSpotSDK;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use HubSpotSDK\Core\BaseClient;
use HubSpotSDK\Core\Implementation\StreamingHttpClient;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Services\AccountService;
use HubSpotSDK\Services\AuthService;
use HubSpotSDK\Services\AutomationService;
use HubSpotSDK\Services\BusinessUnitsService;
use HubSpotSDK\Services\CmsService;
use HubSpotSDK\Services\CommunicationPreferencesService;
use HubSpotSDK\Services\ConversationsService;
use HubSpotSDK\Services\CrmService;
use HubSpotSDK\Services\EventsService;
use HubSpotSDK\Services\FilesService;
use HubSpotSDK\Services\MarketingService;
use HubSpotSDK\Services\MetaService;
use HubSpotSDK\Services\SchedulerService;
use HubSpotSDK\Services\SettingsService;
use HubSpotSDK\Services\WebhooksService;

/**
 * @phpstan-import-type NormalizedRequest from \HubSpotSDK\Core\BaseClient
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
    public CommunicationPreferencesService $communicationPreferences;

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
    public MetaService $meta;

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

        if (is_null($options->streamingTransporter)) {
            assert(!is_null($options->transporter));
            $options->streamingTransporter = new StreamingHttpClient($options->transporter);
        }

        /** @var array<string, string|null> $headers */
        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'User-Agent' => sprintf('hubspot/PHP %s', VERSION),
            'X-Stainless-Lang' => 'php',
            'X-Stainless-Package-Version' => '0.1.0-alpha.6',
            'X-Stainless-Arch' => Util::machtype(),
            'X-Stainless-OS' => Util::ostype(),
            'X-Stainless-Runtime' => php_sapi_name(),
            'X-Stainless-Runtime-Version' => phpversion(),
        ];

        $customHeadersEnv = Util::getenv('HUBSPOT_CUSTOM_HEADERS');
        if (null !== $customHeadersEnv) {
            foreach (explode("\n", $customHeadersEnv) as $line) {
                $colon = strpos($line, ':');
                if (false !== $colon) {
                    $headers[trim(substr($line, 0, $colon))] = trim(substr($line, $colon + 1));
                }
            }
        }

        parent::__construct(
            headers: $headers,
            baseUrl: $baseUrl,
            options: $options
        );

        $this->account = new AccountService($this);
        $this->auth = new AuthService($this);
        $this->automation = new AutomationService($this);
        $this->businessUnits = new BusinessUnitsService($this);
        $this->cms = new CmsService($this);
        $this->communicationPreferences = new CommunicationPreferencesService($this);
        $this->conversations = new ConversationsService($this);
        $this->crm = new CrmService($this);
        $this->events = new EventsService($this);
        $this->files = new FilesService($this);
        $this->marketing = new MarketingService($this);
        $this->meta = new MetaService($this);
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
