<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\ObjectLibrary;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\ObjectLibrary\Enablement\ObjectTypeEnablementPublicResponse;
use HubspotSDK\Crm\ObjectLibrary\Enablement\PortalObjectTypeEnablementPublicResponse;
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
    public function getAll(
        RequestOptions|array|null $requestOptions = null
    ): PortalObjectTypeEnablementPublicResponse;

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
    ): ObjectTypeEnablementPublicResponse;
}
