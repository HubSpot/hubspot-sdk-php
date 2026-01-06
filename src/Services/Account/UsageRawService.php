<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Account;

use HubspotSDK\Account\CollectionResponseAPIUsage;
use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Account\UsageRawContract;

final class UsageRawService implements UsageRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve the daily API usage for private apps in the account, along with information about usage limits.
     *
     * @return BaseResponse<CollectionResponseAPIUsage>
     *
     * @throws APIException
     */
    public function getDailyPrivateAppsUsage(
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'account-info/v3/api-usage/daily/private-apps',
            options: $requestOptions,
            convert: CollectionResponseAPIUsage::class,
        );
    }
}
