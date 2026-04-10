<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Marketing;

use HubSpotSDK\Client;
use HubSpotSDK\ServiceContracts\Marketing\TransactionalContract;
use HubSpotSDK\Services\Marketing\Transactional\SingleEmailService;
use HubSpotSDK\Services\Marketing\Transactional\SmtpTokensService;

final class TransactionalService implements TransactionalContract
{
    /**
     * @api
     */
    public TransactionalRawService $raw;

    /**
     * @api
     */
    public SingleEmailService $singleEmail;

    /**
     * @api
     */
    public SmtpTokensService $smtpTokens;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TransactionalRawService($client);
        $this->singleEmail = new SingleEmailService($client);
        $this->smtpTokens = new SmtpTokensService($client);
    }
}
