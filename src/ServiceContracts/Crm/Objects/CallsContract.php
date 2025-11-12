<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\CreatedResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\Calls\CallCreateParams;
use HubspotSDK\Crm\Objects\Calls\CallGetParams;
use HubspotSDK\Crm\Objects\Calls\CallListParams;
use HubspotSDK\Crm\Objects\Calls\CallSearchParams;
use HubspotSDK\Crm\Objects\Calls\CallUpdateParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface CallsContract
{
    /**
     * @api
     *
     * @param array<mixed>|CallCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|CallCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): CreatedResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|CallUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $callID,
        array|CallUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|CallListParams $params
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        array|CallListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $callID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|CallGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $callID,
        array|CallGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param array<mixed>|CallSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        array|CallSearchParams $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalSimplePublicObject;
}
