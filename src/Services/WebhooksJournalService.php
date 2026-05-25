<?php

declare(strict_types=1);

namespace HubSpotSDK\Services;

use HubSpotSDK\Client;
use HubSpotSDK\ServiceContracts\WebhooksJournalContract;
use HubSpotSDK\Services\WebhooksJournal\JournalLocalService;
use HubSpotSDK\Services\WebhooksJournal\JournalService;
use HubSpotSDK\Services\WebhooksJournal\SnapshotsService;
use HubSpotSDK\Services\WebhooksJournal\SubscriptionsService;

final class WebhooksJournalService implements WebhooksJournalContract
{
    /**
     * @api
     */
    public WebhooksJournalRawService $raw;

    /**
     * @api
     */
    public JournalService $journal;

    /**
     * @api
     */
    public JournalLocalService $journalLocal;

    /**
     * @api
     */
    public SnapshotsService $snapshots;

    /**
     * @api
     */
    public SubscriptionsService $subscriptions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new WebhooksJournalRawService($client);
        $this->journal = new JournalService($client);
        $this->journalLocal = new JournalLocalService($client);
        $this->snapshots = new SnapshotsService($client);
        $this->subscriptions = new SubscriptionsService($client);
    }
}
