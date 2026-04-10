<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm\Objects;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubSpotSDK\Crm\Objects\GenericObjects\GenericObjectCreateParams;
use HubSpotSDK\Crm\Objects\GenericObjects\GenericObjectDeleteParams;
use HubSpotSDK\Crm\Objects\GenericObjects\GenericObjectGetParams;
use HubSpotSDK\Crm\Objects\GenericObjects\GenericObjectListParams;
use HubSpotSDK\Crm\Objects\GenericObjects\GenericObjectSearchParams;
use HubSpotSDK\Crm\Objects\GenericObjects\GenericObjectUpdateParams;
use HubSpotSDK\Crm\Objects\SimplePublicObjectWithAssociations;
use HubSpotSDK\Crm\SimplePublicObject;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface GenericObjectsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|GenericObjectCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimplePublicObject>
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        array|GenericObjectCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID Path param
     * @param array<string,mixed>|GenericObjectUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimplePublicObject>
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|GenericObjectUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|GenericObjectListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<SimplePublicObjectWithAssociations>>
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        array|GenericObjectListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|GenericObjectDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        array|GenericObjectDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID Path param
     * @param array<string,mixed>|GenericObjectGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        array|GenericObjectGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|GenericObjectSearchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseWithTotalSimplePublicObject>
     *
     * @throws APIException
     */
    public function search(
        string $objectType,
        array|GenericObjectSearchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
