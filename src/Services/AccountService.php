<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Account\CollectionResponseAPIUsageNoPaging;
use HubspotSDK\Account\PortalInformationResponse;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\AccountContract;
use HubspotSDK\Services\Account\ActivityService;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class AccountService implements AccountContract
{
    /**
     * @api
     */
    public AccountRawService $raw;

    /**
     * @api
     */
    public ActivityService $activity;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AccountRawService($client);
        $this->activity = new ActivityService($client);
    }

    /**
     * @api
     *
     * Retrieve account details such as the account type, time zone, currencies, and data hosting location.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        RequestOptions|array|null $requestOptions = null
    ): PortalInformationResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the daily API usage for private apps in the account, along with information about usage limits.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getDailyPrivateAppsUsage(
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponseAPIUsageNoPaging {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getDailyPrivateAppsUsage(requestOptions: $requestOptions);

        return $response->parse();
    }
}
