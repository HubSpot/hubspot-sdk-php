<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Extensions;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\Cards\CardCreateParams;
use HubspotSDK\Crm\Extensions\Cards\CardDeleteParams;
use HubspotSDK\Crm\Extensions\Cards\CardGetParams;
use HubspotSDK\Crm\Extensions\Cards\CardUpdateParams;
use HubspotSDK\Crm\Extensions\Cards\IntegratorCardPayloadResponse;
use HubspotSDK\Crm\Extensions\Cards\PublicCardListResponse;
use HubspotSDK\Crm\Extensions\Cards\PublicCardResponse;
use HubspotSDK\RequestOptions;

interface CardsContract
{
    /**
     * @api
     *
     * @param array<mixed>|CardCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|CardCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicCardResponse;

    /**
     * @api
     *
     * @param array<mixed>|CardUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $cardID,
        array|CardUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicCardResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): PublicCardListResponse;

    /**
     * @api
     *
     * @param array<mixed>|CardDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $cardID,
        array|CardDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|CardGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $cardID,
        array|CardGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicCardResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getSampleResponse(
        ?RequestOptions $requestOptions = null
    ): IntegratorCardPayloadResponse;
}
