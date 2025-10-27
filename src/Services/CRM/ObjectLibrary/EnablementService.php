<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\ObjectLibrary;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\ObjectLibrary\ObjectTypeEnablementPublicResponse;
use HubspotSDK\CRM\ObjectLibrary\PortalObjectTypeEnablementPublicResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\ObjectLibrary\EnablementContract;

final class EnablementService implements EnablementContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns all objects in the object library and their enablement status
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): PortalObjectTypeEnablementPublicResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'crm/v3/object-library/enablement',
            options: $requestOptions,
            convert: PortalObjectTypeEnablementPublicResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns an object and its enablement status
     *
     * @throws APIException
     */
    public function get(
        string $objectTypeID,
        ?RequestOptions $requestOptions = null
    ): ObjectTypeEnablementPublicResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/object-library/enablement/%1$s', $objectTypeID],
            options: $requestOptions,
            convert: ObjectTypeEnablementPublicResponse::class,
        );
    }
}
