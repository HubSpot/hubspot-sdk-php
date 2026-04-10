<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm\Objects;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubSpotSDK\Crm\Objects\Communications\CommunicationCreateParams;
use HubSpotSDK\Crm\Objects\Communications\CommunicationGetParams;
use HubSpotSDK\Crm\Objects\Communications\CommunicationListParams;
use HubSpotSDK\Crm\Objects\Communications\CommunicationSearchParams;
use HubSpotSDK\Crm\Objects\Communications\CommunicationUpdateParams;
use HubSpotSDK\Crm\Objects\SimplePublicObjectWithAssociations;
use HubSpotSDK\Crm\SimplePublicObject;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface CommunicationsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CommunicationCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimplePublicObject>
     *
     * @throws APIException
     */
    public function create(
        array|CommunicationCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $communicationID Path param
     * @param array<string,mixed>|CommunicationUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimplePublicObject>
     *
     * @throws APIException
     */
    public function update(
        string $communicationID,
        array|CommunicationUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CommunicationListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<SimplePublicObjectWithAssociations>>
     *
     * @throws APIException
     */
    public function list(
        array|CommunicationListParams $params,
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
        string $communicationID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CommunicationGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function get(
        string $communicationID,
        array|CommunicationGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CommunicationSearchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseWithTotalSimplePublicObject>
     *
     * @throws APIException
     */
    public function search(
        array|CommunicationSearchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
