<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\ObjectLibrary;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\ObjectLibrary\ObjectTypeEnablementPublicResponse;
use HubspotSDK\Crm\ObjectLibrary\PortalObjectTypeEnablementPublicResponse;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface EnablementContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): PortalObjectTypeEnablementPublicResponse;

    /**
     * @api
     *
     * @param string $objectTypeID objectTypeId for the object type in question
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $objectTypeID,
        RequestOptions|array|null $requestOptions = null
    ): ObjectTypeEnablementPublicResponse;
}
