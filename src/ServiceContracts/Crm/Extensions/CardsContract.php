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

/**
 * @phpstan-import-type CardFetchBodyShape from \HubspotSDK\Crm\Extensions\Cards\CardFetchBody
 * @phpstan-import-type CardFetchBodyPatchShape from \HubspotSDK\Crm\Extensions\Cards\CardFetchBodyPatch
 * @phpstan-import-type CardActionsShape from \HubspotSDK\Crm\Extensions\Cards\CardActions
 * @phpstan-import-type CardDisplayBodyShape from \HubspotSDK\Crm\Extensions\Cards\CardDisplayBody
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface CardsContract
{
    /**
     * @api
     *
     * @param int $appID the ID of the target app
     * @param CardActions|CardActionsShape $actions configuration for custom user actions on cards
     * @param CardDisplayBody|CardDisplayBodyShape $display Configuration for displayed info on a card
     * @param CardFetchBody|CardFetchBodyShape $fetch configuration for this card's data fetch request
     * @param string $title The top-level title for this card. Displayed to users in the CRM UI.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        CardActions|array $actions,
        CardDisplayBody|array $display,
        CardFetchBody|array $fetch,
        string $title,
        RequestOptions|array|null $requestOptions = null,
    ): PublicCardResponse;

    /**
     * @api
     *
     * @param string $cardID path param: The ID of the card to update
     * @param int $appID path param: The ID of the target app
     * @param CardActions|CardActionsShape $actions body param: Configuration for custom user actions on cards
     * @param CardDisplayBody|CardDisplayBodyShape $display Body param: Configuration for displayed info on a card
     * @param CardFetchBodyPatch|CardFetchBodyPatchShape $fetch Body param: Variant of CardFetchBody with fields as optional for patches
     * @param string $title Body param: The top-level title for this card. Displayed to users in the CRM UI.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $cardID,
        int $appID,
        CardActions|array|null $actions = null,
        CardDisplayBody|array|null $display = null,
        CardFetchBodyPatch|array|null $fetch = null,
        ?string $title = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicCardResponse;

    /**
     * @api
     *
     * @param int $appID the ID of the target app
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): PublicCardListResponse;

    /**
     * @api
     *
     * @param string $cardID the ID of the card to delete
     * @param int $appID the ID of the target app
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $cardID,
        int $appID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $cardID the ID of the target card
     * @param int $appID the ID of the target app
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $cardID,
        int $appID,
        RequestOptions|array|null $requestOptions = null,
    ): PublicCardResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getSampleResponse(
        RequestOptions|array|null $requestOptions = null
    ): IntegratorCardPayloadResponse;
}
