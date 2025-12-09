<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Account;

use HubspotSDK\Account\PortalInformationResponse;
use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Account\DetailsContract;

final class DetailsService implements DetailsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
        /** @var BaseResponse<PortalInformationResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'account-info/v3/details',
            options: $requestOptions,
            convert: PortalInformationResponse::class,
        );

        return $response->parse();
    }
}
