<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm\Objects;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubSpotSDK\Crm\MultiAssociatedObjectWithLabel;
use HubSpotSDK\Crm\Objects\PartnerClients\PartnerClientGetParams;
use HubSpotSDK\Crm\Objects\PartnerClients\PartnerClientListAssociationsParams;
use HubSpotSDK\Crm\Objects\PartnerClients\PartnerClientListParams;
use HubSpotSDK\Crm\Objects\PartnerClients\PartnerClientSearchParams;
use HubSpotSDK\Crm\Objects\PartnerClients\PartnerClientUpdateParams;
use HubSpotSDK\Crm\Objects\SimplePublicObjectWithAssociations;
use HubSpotSDK\Crm\SimplePublicObject;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface PartnerClientsRawContract
{
    /**
     * @api
     *
     * @param string $partnerClientID Path param
     * @param array<string,mixed>|PartnerClientUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimplePublicObject>
     *
     * @throws APIException
     */
    public function update(
        string $partnerClientID,
        array|PartnerClientUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PartnerClientListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<SimplePublicObjectWithAssociations>>
     *
     * @throws APIException
     */
    public function list(
        array|PartnerClientListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PartnerClientGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function get(
        string $partnerClientID,
        array|PartnerClientGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $toObjectType Path param
     * @param array<string,mixed>|PartnerClientListAssociationsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<MultiAssociatedObjectWithLabel>>
     *
     * @throws APIException
     */
    public function listAssociations(
        string $toObjectType,
        array|PartnerClientListAssociationsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PartnerClientSearchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseWithTotalSimplePublicObject>
     *
     * @throws APIException
     */
    public function search(
        array|PartnerClientSearchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
