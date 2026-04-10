<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm\Objects;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubSpotSDK\Crm\Objects\Products\ProductCreateParams;
use HubSpotSDK\Crm\Objects\Products\ProductGetParams;
use HubSpotSDK\Crm\Objects\Products\ProductListParams;
use HubSpotSDK\Crm\Objects\Products\ProductSearchParams;
use HubSpotSDK\Crm\Objects\Products\ProductUpdateParams;
use HubSpotSDK\Crm\Objects\SimplePublicObjectWithAssociations;
use HubSpotSDK\Crm\SimplePublicObject;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface ProductsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ProductCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimplePublicObject>
     *
     * @throws APIException
     */
    public function create(
        array|ProductCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $productID Path param
     * @param array<string,mixed>|ProductUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimplePublicObject>
     *
     * @throws APIException
     */
    public function update(
        string $productID,
        array|ProductUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ProductListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<SimplePublicObjectWithAssociations>>
     *
     * @throws APIException
     */
    public function list(
        array|ProductListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $productID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ProductGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function get(
        string $productID,
        array|ProductGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ProductSearchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseWithTotalSimplePublicObject>
     *
     * @throws APIException
     */
    public function search(
        array|ProductSearchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
