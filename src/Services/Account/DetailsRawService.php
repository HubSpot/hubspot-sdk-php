<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Account;

use HubspotSDK\Account\PortalInformationResponse;
use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Account\DetailsRawContract;

final class DetailsRawService implements DetailsRawContract
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
     * @return BaseResponse<PortalInformationResponse>
     *
     * @throws APIException
     */
    public function get(?RequestOptions $requestOptions = null): BaseResponse
    {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'account-info/v3/details',
            options: $requestOptions,
            convert: PortalInformationResponse::class,
        );
    }
}
