<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\CreatedResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\Services\ServiceCreateParams;
use HubspotSDK\Crm\Objects\Services\ServiceGetParams;
use HubspotSDK\Crm\Objects\Services\ServiceListParams;
use HubspotSDK\Crm\Objects\Services\ServiceSearchParams;
use HubspotSDK\Crm\Objects\Services\ServiceUpdateParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface ServicesContract
{
    /**
     * @api
     *
     * @param array<mixed>|ServiceCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|ServiceCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CreatedResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|ServiceUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $serviceID,
        array|ServiceUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|ServiceListParams $params
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        array|ServiceListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $serviceID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|ServiceGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $serviceID,
        array|ServiceGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param array<mixed>|ServiceSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        array|ServiceSearchParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalSimplePublicObject;
}
