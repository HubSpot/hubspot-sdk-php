<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Account;

use HubspotSDK\Account\PortalInformationResponse;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Account\DetailsContract;

final class DetailsService implements DetailsContract
{
    /**
     * @api
     */
    public DetailsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DetailsRawService($client);
    }

    /**
     * @api
     *
     * Retrieve account details such as the account type, time zone, currencies, and data hosting location.
     *
     * @throws APIException
     */
    public function get(
        ?RequestOptions $requestOptions = null
    ): PortalInformationResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get(requestOptions: $requestOptions);

        return $response->parse();
    }
}
