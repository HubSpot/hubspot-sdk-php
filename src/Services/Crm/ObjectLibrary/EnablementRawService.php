<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\ObjectLibrary;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\ObjectLibrary\ObjectTypeEnablementPublicResponse;
use HubspotSDK\Crm\ObjectLibrary\PortalObjectTypeEnablementPublicResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\ObjectLibrary\EnablementRawContract;

final class EnablementRawService implements EnablementRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * For all object types supporting enablement, returns whether they're enabled or disabled
     *
     * @return BaseResponse<PortalObjectTypeEnablementPublicResponse>
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): BaseResponse
    {
        // @phpstan-ignore-next-line return.type
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
     * Fetch whether object type is enabled
     *
     * @param string $objectTypeID objectTypeId for the object type in question
     *
     * @return BaseResponse<ObjectTypeEnablementPublicResponse>
     *
     * @throws APIException
     */
    public function get(
        string $objectTypeID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/object-library/enablement/%1$s', $objectTypeID],
            options: $requestOptions,
            convert: ObjectTypeEnablementPublicResponse::class,
        );
    }
}
