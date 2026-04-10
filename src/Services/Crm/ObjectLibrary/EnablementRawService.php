<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm\ObjectLibrary;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\ObjectLibrary\Enablement\ObjectTypeEnablementPublicResponse;
use HubSpotSDK\Crm\ObjectLibrary\Enablement\PortalObjectTypeEnablementPublicResponse;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\ObjectLibrary\EnablementRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortalObjectTypeEnablementPublicResponse>
     *
     * @throws APIException
     */
    public function getAll(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm/object-library/2026-03/enablement',
            options: $requestOptions,
            convert: PortalObjectTypeEnablementPublicResponse::class,
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ObjectTypeEnablementPublicResponse>
     *
     * @throws APIException
     */
    public function getByObjectTypeID(
        string $objectTypeID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/object-library/2026-03/enablement/%1$s', $objectTypeID],
            options: $requestOptions,
            convert: ObjectTypeEnablementPublicResponse::class,
        );
    }
}
