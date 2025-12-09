<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\ConversationsContract;
use HubspotSDK\Services\Conversations\ActorsService;
use HubspotSDK\Services\Conversations\ChannelAccountsService;
use HubspotSDK\Services\Conversations\ChannelsService;
use HubspotSDK\Services\Conversations\CustomChannelsService;
use HubspotSDK\Services\Conversations\InboxesService;
use HubspotSDK\Services\Conversations\MessagesService;
use HubspotSDK\Services\Conversations\ThreadsService;
use HubspotSDK\Services\Conversations\VisitorIdentificationService;

final class ConversationsService implements ConversationsContract
{
    /**
     * @api
     */
    public ConversationsRawService $raw;

    /**
     * @api
     */
    public ActorsService $actors;

    /**
     * @api
     */
    public ChannelAccountsService $channelAccounts;

    /**
     * @api
     */
    public ChannelsService $channels;

    /**
     * @api
     */
    public CustomChannelsService $customChannels;

    /**
     * @api
     */
    public InboxesService $inboxes;

    /**
     * @api
     */
    public MessagesService $messages;

    /**
     * @api
     */
    public ThreadsService $threads;

    /**
     * @api
     */
    public VisitorIdentificationService $visitorIdentification;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ConversationsRawService($client);
        $this->actors = new ActorsService($client);
        $this->channelAccounts = new ChannelAccountsService($client);
        $this->channels = new ChannelsService($client);
        $this->customChannels = new CustomChannelsService($client);
        $this->inboxes = new InboxesService($client);
        $this->messages = new MessagesService($client);
        $this->threads = new ThreadsService($client);
        $this->visitorIdentification = new VisitorIdentificationService($client);
    }
}
