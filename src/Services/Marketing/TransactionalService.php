<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Marketing\TransactionalContract;
use HubspotSDK\Services\Marketing\Transactional\SingleEmailService;
use HubspotSDK\Services\Marketing\Transactional\SmtpTokensService;

final class TransactionalService implements TransactionalContract
{
    /**
     * @@api
     */
    public SingleEmailService $singleEmail;

    /**
     * @@api
     */
    public SmtpTokensService $smtpTokens;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->singleEmail = new SingleEmailService($client);
        $this->smtpTokens = new SmtpTokensService($client);
    }
}
