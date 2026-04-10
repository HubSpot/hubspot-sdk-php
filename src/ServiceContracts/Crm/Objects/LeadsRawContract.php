<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm\Objects;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubSpotSDK\Crm\Objects\Leads\LeadCreateParams;
use HubSpotSDK\Crm\Objects\Leads\LeadGetParams;
use HubSpotSDK\Crm\Objects\Leads\LeadListParams;
use HubSpotSDK\Crm\Objects\Leads\LeadSearchParams;
use HubSpotSDK\Crm\Objects\Leads\LeadUpdateParams;
use HubSpotSDK\Crm\Objects\SimplePublicObjectWithAssociations;
use HubSpotSDK\Crm\SimplePublicObject;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface LeadsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|LeadCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimplePublicObject>
     *
     * @throws APIException
     */
    public function create(
        array|LeadCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $leadsID Path param
     * @param array<string,mixed>|LeadUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimplePublicObject>
     *
     * @throws APIException
     */
    public function update(
        string $leadsID,
        array|LeadUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|LeadListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<SimplePublicObjectWithAssociations>>
     *
     * @throws APIException
     */
    public function list(
        array|LeadListParams $params,
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
        string $leadsID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|LeadGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function get(
        string $leadsID,
        array|LeadGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|LeadSearchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseWithTotalSimplePublicObject>
     *
     * @throws APIException
     */
    public function search(
        array|LeadSearchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
