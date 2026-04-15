<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm\Extensions;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Extensions\CardsDev\CardActions;
use HubSpotSDK\Crm\Extensions\CardsDev\CardDisplayBody;
use HubSpotSDK\Crm\Extensions\CardsDev\CardFetchBody;
use HubSpotSDK\Crm\Extensions\CardsDev\CardFetchBodyPatch;
use HubSpotSDK\Crm\Extensions\CardsDev\CardMigrateViewsResponse;
use HubSpotSDK\Crm\Extensions\CardsDev\IntegratorCardPayloadResponse;
use HubSpotSDK\Crm\Extensions\CardsDev\PublicCardListResponse;
use HubSpotSDK\Crm\Extensions\CardsDev\PublicCardResponse;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type CardFetchBodyShape from \HubSpotSDK\Crm\Extensions\CardsDev\CardFetchBody
 * @phpstan-import-type CardFetchBodyPatchShape from \HubSpotSDK\Crm\Extensions\CardsDev\CardFetchBodyPatch
 * @phpstan-import-type CardActionsShape from \HubSpotSDK\Crm\Extensions\CardsDev\CardActions
 * @phpstan-import-type CardDisplayBodyShape from \HubSpotSDK\Crm\Extensions\CardsDev\CardDisplayBody
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface CardsDevContract
{
    /**
     * @api
     *
     * @param int $appID The appId of the app containing the Legacy CRM Card(s)
     * @param CardActions|CardActionsShape $actions
     * @param CardDisplayBody|CardDisplayBodyShape $display
     * @param CardFetchBody|CardFetchBodyShape $fetch
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
     * @param string $cardID Path param
     * @param int $appID Path param: The appId of the app containing the Legacy CRM Card(s)
     * @param CardActions|CardActionsShape $actions Body param
     * @param CardDisplayBody|CardDisplayBodyShape $display Body param
     * @param CardFetchBodyPatch|CardFetchBodyPatchShape $fetch Body param
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
     * @param int $appID The appId of the app containing the Legacy CRM Card(s)
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
     * @param int $appID The appId of the app containing the Legacy CRM Card(s)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): PublicCardListResponse;

    /**
     * @api
     *
     * @param int $appID The appId of the app containing the Legacy CRM Card(s)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getByID(
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

    /**
     * @api
     *
     * @param int $appID The appId of the app containing the Legacy CRM Card(s)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function migrateViews(
        int $appID,
        bool $allowDuplicateAppCardIDs,
        int $appCardID,
        int $legacyCrmCardID,
        ?int $helpdeskAppCardID = null,
        RequestOptions|array|null $requestOptions = null,
    ): CardMigrateViewsResponse;
}
