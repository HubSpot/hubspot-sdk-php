<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm\ObjectLibrary;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\ObjectLibrary\Enablement\ObjectTypeEnablementPublicResponse;
use HubSpotSDK\Crm\ObjectLibrary\Enablement\PortalObjectTypeEnablementPublicResponse;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface EnablementRawContract
{
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
    ): BaseResponse;

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
    ): BaseResponse;
}
