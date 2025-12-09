<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\ObjectLibrary;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\ObjectLibrary\ObjectTypeEnablementPublicResponse;
use HubspotSDK\Crm\ObjectLibrary\PortalObjectTypeEnablementPublicResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\ObjectLibrary\EnablementContract;

final class EnablementService implements EnablementContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * For all object types supporting enablement, returns whether they're enabled or disabled
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): PortalObjectTypeEnablementPublicResponse {
        /** @var BaseResponse<PortalObjectTypeEnablementPublicResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'crm/v3/object-library/enablement',
            options: $requestOptions,
            convert: PortalObjectTypeEnablementPublicResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Fetch whether object type is enabled
     *
     * @throws APIException
     */
    public function get(
        string $objectTypeID,
        ?RequestOptions $requestOptions = null
    ): ObjectTypeEnablementPublicResponse {
        /** @var BaseResponse<ObjectTypeEnablementPublicResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['crm/v3/object-library/enablement/%1$s', $objectTypeID],
            options: $requestOptions,
            convert: ObjectTypeEnablementPublicResponse::class,
        );

        return $response->parse();
    }
}
