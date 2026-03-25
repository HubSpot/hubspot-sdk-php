<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Account\CollectionResponseAPIUsageNoPaging;
use HubspotSDK\Account\PortalInformationResponse;
use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\AccountRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class AccountRawService implements AccountRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve account details such as the account type, time zone, currencies, and data hosting location.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortalInformationResponse>
     *
     * @throws APIException
     */
    public function get(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'account-info/2026-03/details',
            options: $requestOptions,
            convert: PortalInformationResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the daily API usage for private apps in the account, along with information about usage limits.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseAPIUsageNoPaging>
     *
     * @throws APIException
     */
    public function getDailyPrivateAppsUsage(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'account-info/2026-03/api-usage/daily/private-apps',
            options: $requestOptions,
            convert: CollectionResponseAPIUsageNoPaging::class,
        );
    }
}
