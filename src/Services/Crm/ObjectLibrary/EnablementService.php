<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm\ObjectLibrary;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\ObjectLibrary\Enablement\ObjectTypeEnablementPublicResponse;
use HubSpotSDK\Crm\ObjectLibrary\Enablement\PortalObjectTypeEnablementPublicResponse;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\ObjectLibrary\EnablementContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class EnablementService implements EnablementContract
{
    /**
     * @api
     */
    public EnablementRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new EnablementRawService($client);
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getAll(
        RequestOptions|array|null $requestOptions = null
    ): PortalObjectTypeEnablementPublicResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getAll(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getByObjectTypeID(
        string $objectTypeID,
        RequestOptions|array|null $requestOptions = null
    ): ObjectTypeEnablementPublicResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getByObjectTypeID($objectTypeID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
