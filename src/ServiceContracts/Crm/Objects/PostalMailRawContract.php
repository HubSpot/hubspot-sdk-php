<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\CreatedResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\PostalMail\PostalMailCreateParams;
use HubspotSDK\Crm\Objects\PostalMail\PostalMailGetParams;
use HubspotSDK\Crm\Objects\PostalMail\PostalMailListParams;
use HubspotSDK\Crm\Objects\PostalMail\PostalMailSearchParams;
use HubspotSDK\Crm\Objects\PostalMail\PostalMailUpdateParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface PostalMailRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|PostalMailCreateParams $params
     *
     * @return BaseResponse<CreatedResponseSimplePublicObject>
     *
     * @throws APIException
     */
    public function create(
        array|PostalMailCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $postalMailID Path param:
     * @param array<mixed>|PostalMailUpdateParams $params
     *
     * @return BaseResponse<SimplePublicObject>
     *
     * @throws APIException
     */
    public function update(
        string $postalMailID,
        array|PostalMailUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PostalMailListParams $params
     *
     * @return BaseResponse<Page<SimplePublicObjectWithAssociations>>
     *
     * @throws APIException
     */
    public function list(
        array|PostalMailListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $postalMailID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PostalMailGetParams $params
     *
     * @return BaseResponse<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function get(
        string $postalMailID,
        array|PostalMailGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PostalMailSearchParams $params
     *
     * @return BaseResponse<CollectionResponseWithTotalSimplePublicObject>
     *
     * @throws APIException
     */
    public function search(
        array|PostalMailSearchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
