<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Extensions;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Extensions\Cards\CardActions;
use HubspotSDK\Crm\Extensions\Cards\CardDisplayBody;
use HubspotSDK\Crm\Extensions\Cards\CardFetchBody;
use HubspotSDK\Crm\Extensions\Cards\CardFetchBodyPatch;
use HubspotSDK\Crm\Extensions\Cards\IntegratorCardPayloadResponse;
use HubspotSDK\Crm\Extensions\Cards\PublicCardListResponse;
use HubspotSDK\Crm\Extensions\Cards\PublicCardResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Extensions\CardsContract;

/**
 * @phpstan-import-type CardFetchBodyShape from \HubspotSDK\Crm\Extensions\Cards\CardFetchBody
 * @phpstan-import-type CardFetchBodyPatchShape from \HubspotSDK\Crm\Extensions\Cards\CardFetchBodyPatch
 * @phpstan-import-type CardActionsShape from \HubspotSDK\Crm\Extensions\Cards\CardActions
 * @phpstan-import-type CardDisplayBodyShape from \HubspotSDK\Crm\Extensions\Cards\CardDisplayBody
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class CardsService implements CardsContract
{
    /**
     * @api
     */
    public CardsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CardsRawService($client);
    }

    /**
     * @api
     *
     * Defines a new card that will become active on an account when this app is installed.
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
     * Returns a list of cards for a given app.
     *
     * @param int $appID the ID of the target app
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): PublicCardListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($appID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Permanently deletes a card definition with the given ID. Once deleted, data fetch requests for this card will no longer be sent to your service. This can't be undone.
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
     * Returns the definition for a card with the given ID.
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
        RequestOptions|array|null $requestOptions = null
    ): PublicCardResponse {
        $params = Util::removeNulls(['appID' => $appID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($cardID, params: $params, requestOptions: $requestOptions);

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
}
