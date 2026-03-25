<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Extensions;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\CardsDev\CardMigrateViewsResponse;
use HubspotSDK\Crm\Extensions\CardsDev\CardsDevCreateParams;
use HubspotSDK\Crm\Extensions\CardsDev\CardsDevDeleteParams;
use HubspotSDK\Crm\Extensions\CardsDev\CardsDevGetByIDParams;
use HubspotSDK\Crm\Extensions\CardsDev\CardsDevMigrateViewsParams;
use HubspotSDK\Crm\Extensions\CardsDev\CardsDevUpdateParams;
use HubspotSDK\Crm\Extensions\CardsDev\IntegratorCardPayloadResponse;
use HubspotSDK\Crm\Extensions\CardsDev\PublicCardListResponse;
use HubspotSDK\Crm\Extensions\CardsDev\PublicCardResponse;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface CardsDevRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CardsDevCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicCardResponse>
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|CardsDevCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $cardID Path param
     * @param array<string,mixed>|CardsDevUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicCardResponse>
     *
     * @throws APIException
     */
    public function update(
        string $cardID,
        array|CardsDevUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CardsDevDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $cardID,
        array|CardsDevDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicCardListResponse>
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CardsDevGetByIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicCardResponse>
     *
     * @throws APIException
     */
    public function getByID(
        string $cardID,
        array|CardsDevGetByIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<IntegratorCardPayloadResponse>
     *
     * @throws APIException
     */
    public function getSampleResponse(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CardsDevMigrateViewsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CardMigrateViewsResponse>
     *
     * @throws APIException
     */
    public function migrateViews(
        int $appID,
        array|CardsDevMigrateViewsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
