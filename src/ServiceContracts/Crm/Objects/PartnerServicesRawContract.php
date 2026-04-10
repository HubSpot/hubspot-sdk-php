<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm\Objects;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubSpotSDK\Crm\MultiAssociatedObjectWithLabel;
use HubSpotSDK\Crm\Objects\PartnerServices\PartnerServiceGetParams;
use HubSpotSDK\Crm\Objects\PartnerServices\PartnerServiceListParams;
use HubSpotSDK\Crm\Objects\PartnerServices\PartnerServiceSearchParams;
use HubSpotSDK\Crm\Objects\PartnerServices\PartnerServiceUpdateParams;
use HubSpotSDK\Crm\Objects\SimplePublicObjectWithAssociations;
use HubSpotSDK\Crm\SimplePublicObject;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface PartnerServicesRawContract
{
    /**
     * @api
     *
     * @param string $partnerServiceID Path param
     * @param array<string,mixed>|PartnerServiceUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimplePublicObject>
     *
     * @throws APIException
     */
    public function update(
        string $partnerServiceID,
        array|PartnerServiceUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $toObjectType Path param
     * @param array<string,mixed>|PartnerServiceListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<MultiAssociatedObjectWithLabel>>
     *
     * @throws APIException
     */
    public function list(
        string $toObjectType,
        array|PartnerServiceListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PartnerServiceGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function get(
        string $partnerServiceID,
        array|PartnerServiceGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PartnerServiceSearchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseWithTotalSimplePublicObject>
     *
     * @throws APIException
     */
    public function search(
        array|PartnerServiceSearchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
