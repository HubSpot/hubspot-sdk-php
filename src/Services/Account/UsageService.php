<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Account;

use HubspotSDK\Account\CollectionResponseAPIUsage;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Account\UsageContract;

final class UsageService implements UsageContract
{
    /**
     * @api
     */
    public UsageRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new UsageRawService($client);
    }

    /**
     * @api
     *
     * Retrieve the daily API usage for private apps in the account, along with information about usage limits.
     *
     * @throws APIException
     */
    public function getDailyPrivateAppsUsage(
        ?RequestOptions $requestOptions = null
    ): CollectionResponseAPIUsage {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getDailyPrivateAppsUsage(requestOptions: $requestOptions);

        return $response->parse();
    }
}
