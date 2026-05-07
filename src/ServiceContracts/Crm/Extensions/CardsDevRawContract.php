<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm\Extensions;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Extensions\CardsDev\CardMigrateViewsResponse;
use HubSpotSDK\Crm\Extensions\CardsDev\CardsDevCreateParams;
use HubSpotSDK\Crm\Extensions\CardsDev\CardsDevDeleteParams;
use HubSpotSDK\Crm\Extensions\CardsDev\CardsDevGetByIDParams;
use HubSpotSDK\Crm\Extensions\CardsDev\CardsDevMigrateViewsParams;
use HubSpotSDK\Crm\Extensions\CardsDev\CardsDevUpdateParams;
use HubSpotSDK\Crm\Extensions\CardsDev\IntegratorCardPayloadResponse;
use HubSpotSDK\Crm\Extensions\CardsDev\PublicCardListResponse;
use HubSpotSDK\Crm\Extensions\CardsDev\PublicCardResponse;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface CardsDevRawContract
{
    /**
     * @api
     *
     * @param int $appID The appId of the app containing the Legacy CRM Card(s)
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
     * @param string $cardID Path param: The id of the Legacy CRM Card
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
     * @param string $cardID The id of the Legacy CRM Card
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
     * @param int $appID The appId of the app containing the Legacy CRM Card(s)
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
     * @param string $cardID The id of the Legacy CRM Card
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
     * @param int $appID The appId of the app containing the Legacy CRM Card(s)
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
