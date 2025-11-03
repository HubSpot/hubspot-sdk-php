<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Extensions;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\Cards\CardActions;
use HubspotSDK\Crm\Extensions\Cards\CardDisplayBody;
use HubspotSDK\Crm\Extensions\Cards\CardFetchBody;
use HubspotSDK\Crm\Extensions\Cards\CardFetchBodyPatch;
use HubspotSDK\Crm\Extensions\Cards\IntegratorCardPayloadResponse;
use HubspotSDK\Crm\Extensions\Cards\PublicCardListResponse;
use HubspotSDK\Crm\Extensions\Cards\PublicCardResponse;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface CardsContract
{
    /**
     * @api
     *
     * @param CardActions $actions configuration for custom user actions on cards
     * @param CardDisplayBody $display Configuration for displayed info on a card
     * @param CardFetchBody $fetch configuration for this card's data fetch request
     * @param string $title The top-level title for this card. Displayed to users in the CRM UI.
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        $actions,
        $display,
        $fetch,
        $title,
        ?RequestOptions $requestOptions = null,
    ): PublicCardResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        int $appID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicCardResponse;

    /**
     * @api
     *
     * @param int $appID
     * @param CardActions $actions configuration for custom user actions on cards
     * @param CardDisplayBody $display Configuration for displayed info on a card
     * @param CardFetchBodyPatch $fetch Variant of CardFetchBody with fields as optional for patches
     * @param string $title The top-level title for this card. Displayed to users in the CRM UI.
     *
     * @throws APIException
     */
    public function update(
        string $cardID,
        $appID,
        $actions = omit,
        $display = omit,
        $fetch = omit,
        $title = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicCardResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $cardID,
        array $params,
        ?RequestOptions $requestOptions = null
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
     * @param int $appID
     *
     * @throws APIException
     */
    public function delete(
        string $cardID,
        $appID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $cardID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param int $appID
     *
     * @throws APIException
     */
    public function get(
        string $cardID,
        $appID,
        ?RequestOptions $requestOptions = null
    ): PublicCardResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        string $cardID,
        array $params,
        ?RequestOptions $requestOptions = null
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
