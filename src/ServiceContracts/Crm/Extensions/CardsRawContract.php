<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Extensions;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\Cards\CardCreateParams;
use HubspotSDK\Crm\Extensions\Cards\CardDeleteParams;
use HubspotSDK\Crm\Extensions\Cards\CardGetParams;
use HubspotSDK\Crm\Extensions\Cards\CardUpdateParams;
use HubspotSDK\Crm\Extensions\Cards\IntegratorCardPayloadResponse;
use HubspotSDK\Crm\Extensions\Cards\PublicCardListResponse;
use HubspotSDK\Crm\Extensions\Cards\PublicCardResponse;
use HubspotSDK\RequestOptions;

interface CardsRawContract
{
    /**
     * @api
     *
     * @param int $appID the ID of the target app
     * @param array<mixed>|CardCreateParams $params
     *
     * @return BaseResponse<PublicCardResponse>
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|CardCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $cardID path param: The ID of the card to update
     * @param array<mixed>|CardUpdateParams $params
     *
     * @return BaseResponse<PublicCardResponse>
     *
     * @throws APIException
     */
    public function update(
        string $cardID,
        array|CardUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $appID the ID of the target app
     *
     * @return BaseResponse<PublicCardListResponse>
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $cardID the ID of the card to delete
     * @param array<mixed>|CardDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $cardID,
        array|CardDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $cardID the ID of the target card
     * @param array<mixed>|CardGetParams $params
     *
     * @return BaseResponse<PublicCardResponse>
     *
     * @throws APIException
     */
    public function get(
        string $cardID,
        array|CardGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<IntegratorCardPayloadResponse>
     *
     * @throws APIException
     */
    public function getSampleResponse(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
