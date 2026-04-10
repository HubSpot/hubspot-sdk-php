<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm\Extensions;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Crm\Extensions\CardsDev\CardActions;
use HubSpotSDK\Crm\Extensions\CardsDev\CardDisplayBody;
use HubSpotSDK\Crm\Extensions\CardsDev\CardFetchBody;
use HubSpotSDK\Crm\Extensions\CardsDev\CardFetchBodyPatch;
use HubSpotSDK\Crm\Extensions\CardsDev\CardMigrateViewsResponse;
use HubSpotSDK\Crm\Extensions\CardsDev\IntegratorCardPayloadResponse;
use HubSpotSDK\Crm\Extensions\CardsDev\PublicCardListResponse;
use HubSpotSDK\Crm\Extensions\CardsDev\PublicCardResponse;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\Extensions\CardsDevContract;

/**
 * @phpstan-import-type CardFetchBodyShape from \HubSpotSDK\Crm\Extensions\CardsDev\CardFetchBody
 * @phpstan-import-type CardFetchBodyPatchShape from \HubSpotSDK\Crm\Extensions\CardsDev\CardFetchBodyPatch
 * @phpstan-import-type CardActionsShape from \HubSpotSDK\Crm\Extensions\CardsDev\CardActions
 * @phpstan-import-type CardDisplayBodyShape from \HubSpotSDK\Crm\Extensions\CardsDev\CardDisplayBody
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class CardsDevService implements CardsDevContract
{
    /**
     * @api
     */
    public CardsDevRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CardsDevRawService($client);
    }

    /**
     * @api
     *
     * Defines a new card that will become active on an account when this app is installed.
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
    ): PublicCardResponse {
        $params = Util::removeNulls(
            [
                'actions' => $actions,
                'display' => $display,
                'fetch' => $fetch,
                'title' => $title,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a card definition with new details.
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
    ): PublicCardResponse {
        $params = Util::removeNulls(
            [
                'appID' => $appID,
                'actions' => $actions,
                'display' => $display,
                'fetch' => $fetch,
                'title' => $title,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($cardID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Permanently deletes a card definition with the given ID. Once deleted, data fetch requests for this card will no longer be sent to your service. This can't be undone.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $cardID,
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(['appID' => $appID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($cardID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of cards for a given app.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): PublicCardListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($appID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the definition for a card with the given ID.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getByID(
        string $cardID,
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): PublicCardResponse {
        $params = Util::removeNulls(['appID' => $appID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getByID($cardID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns an example card detail response. This is the payload with displayed details for a card that will be shown to a user. An app should send this in response to the data fetch request.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getSampleResponse(
        RequestOptions|array|null $requestOptions = null
    ): IntegratorCardPayloadResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getSampleResponse(requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): CardMigrateViewsResponse {
        $params = Util::removeNulls(
            [
                'appCardID' => $appCardID,
                'legacyCrmCardID' => $legacyCrmCardID,
                'helpdeskAppCardID' => $helpdeskAppCardID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->migrateViews($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
