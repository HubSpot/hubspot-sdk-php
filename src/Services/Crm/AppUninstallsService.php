<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\AppUninstallsContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class AppUninstallsService implements AppUninstallsContract
{
    /**
     * @api
     */
    public AppUninstallsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AppUninstallsRawService($client);
    }

    /**
     * @api
     *
     * Use this endpoint to uninstall your app from a customer's HubSpot account. If successful, this endpoint will return a 204 and the customer will receive an email notification that the developer has uninstall the app from their account.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function uninstall(
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->uninstall(requestOptions: $requestOptions);

        return $response->parse();
    }
}
