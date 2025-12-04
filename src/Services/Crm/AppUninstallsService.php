<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\AppUninstallsContract;

final class AppUninstallsService implements AppUninstallsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Use this endpoint to uninstall your app from a customer's HubSpot account. If successful, this endpoint will return a 204 and the customer will receive an email notification that the developer has uninstall the app from their account.
     *
     * @throws APIException
     */
    public function uninstall(?RequestOptions $requestOptions = null): mixed
    {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: 'appinstalls/v3/external-install',
            options: $requestOptions,
            convert: null,
        );
    }
}
