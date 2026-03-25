<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Extensions;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\CardsDev\CardActions;
use HubspotSDK\Crm\Extensions\CardsDev\CardDisplayBody;
use HubspotSDK\Crm\Extensions\CardsDev\CardFetchBody;
use HubspotSDK\Crm\Extensions\CardsDev\CardFetchBodyPatch;
use HubspotSDK\Crm\Extensions\CardsDev\CardMigrateViewsResponse;
use HubspotSDK\Crm\Extensions\CardsDev\IntegratorCardPayloadResponse;
use HubspotSDK\Crm\Extensions\CardsDev\PublicCardListResponse;
use HubspotSDK\Crm\Extensions\CardsDev\PublicCardResponse;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type CardFetchBodyShape from \HubspotSDK\Crm\Extensions\CardsDev\CardFetchBody
 * @phpstan-import-type CardFetchBodyPatchShape from \HubspotSDK\Crm\Extensions\CardsDev\CardFetchBodyPatch
 * @phpstan-import-type CardActionsShape from \HubspotSDK\Crm\Extensions\CardsDev\CardActions
 * @phpstan-import-type CardDisplayBodyShape from \HubspotSDK\Crm\Extensions\CardsDev\CardDisplayBody
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface CardsDevContract
{
    /**
     * @api
     *
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
     * @param int $appID Path param
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function migrateViews(
        int $appID,
        int $appCardID,
        int $legacyCrmCardID,
        ?int $helpdeskAppCardID = null,
        RequestOptions|array|null $requestOptions = null,
    ): CardMigrateViewsResponse;
}
