<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Account;

use HubspotSDK\Account\CollectionResponseAPIUsage;
use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Account\UsageContract;

final class UsageService implements UsageContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
        /** @var BaseResponse<CollectionResponseAPIUsage> */
        $response = $this->client->request(
            method: 'get',
            path: 'account-info/v3/api-usage/daily/private-apps',
            options: $requestOptions,
            convert: CollectionResponseAPIUsage::class,
        );

        return $response->parse();
    }
}
