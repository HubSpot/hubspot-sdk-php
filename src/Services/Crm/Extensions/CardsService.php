<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Extensions;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Extensions\Cards\CardActions;
use HubspotSDK\Crm\Extensions\Cards\CardDisplayBody;
use HubspotSDK\Crm\Extensions\Cards\CardDisplayProperty;
use HubspotSDK\Crm\Extensions\Cards\CardDisplayProperty\DataType;
use HubspotSDK\Crm\Extensions\Cards\CardFetchBody\CardType;
use HubspotSDK\Crm\Extensions\Cards\CardObjectTypeBody;
use HubspotSDK\Crm\Extensions\Cards\CardObjectTypeBody\Name;
use HubspotSDK\Crm\Extensions\Cards\DisplayOption;
use HubspotSDK\Crm\Extensions\Cards\DisplayOption\Type;
use HubspotSDK\Crm\Extensions\Cards\IntegratorCardPayloadResponse;
use HubspotSDK\Crm\Extensions\Cards\PublicCardListResponse;
use HubspotSDK\Crm\Extensions\Cards\PublicCardResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Extensions\CardsContract;

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
     * @param array{
     *   baseURLs: list<string>
     * }|CardActions $actions Configuration for custom user actions on cards
     * @param array{
     *   properties: list<array{
     *     dataType: 'BOOLEAN'|'CURRENCY'|'DATE'|'DATETIME'|'EMAIL'|'LINK'|'NUMERIC'|'STATUS'|'STRING'|DataType,
     *     label: string,
     *     name: string,
     *     options: list<array{
     *       label: string,
     *       name: string,
     *       type: 'DANGER'|'DEFAULT'|'INFO'|'SUCCESS'|'WARNING'|Type,
     *     }|DisplayOption>,
     *   }|CardDisplayProperty>,
     * }|CardDisplayBody $display Configuration for displayed info on a card
     * @param array{
     *   objectTypes: list<array{
     *     name: 'companies'|'contacts'|'deals'|'marketing_events'|'tickets'|Name,
     *     propertiesToSend: list<string>,
     *   }|CardObjectTypeBody>,
     *   targetURL: string,
     *   cardType?: 'EXTERNAL'|'SERVERLESS'|CardType,
     *   serverlessFunction?: string,
     * } $fetch Configuration for this card's data fetch request
     * @param string $title The top-level title for this card. Displayed to users in the CRM UI.
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|CardActions $actions,
        array|CardDisplayBody $display,
        array $fetch,
        string $title,
        ?RequestOptions $requestOptions = null,
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
     * @param array{
     *   baseURLs: list<string>
     * }|CardActions $actions Body param: Configuration for custom user actions on cards
     * @param array{
     *   properties: list<array{
     *     dataType: 'BOOLEAN'|'CURRENCY'|'DATE'|'DATETIME'|'EMAIL'|'LINK'|'NUMERIC'|'STATUS'|'STRING'|DataType,
     *     label: string,
     *     name: string,
     *     options: list<array{
     *       label: string,
     *       name: string,
     *       type: 'DANGER'|'DEFAULT'|'INFO'|'SUCCESS'|'WARNING'|Type,
     *     }|DisplayOption>,
     *   }|CardDisplayProperty>,
     * }|CardDisplayBody $display Body param: Configuration for displayed info on a card
     * @param array{
     *   objectTypes: list<array{
     *     name: 'companies'|'contacts'|'deals'|'marketing_events'|'tickets'|Name,
     *     propertiesToSend: list<string>,
     *   }|CardObjectTypeBody>,
     *   cardType?: 'EXTERNAL'|'SERVERLESS'|\HubspotSDK\Crm\Extensions\Cards\CardFetchBodyPatch\CardType,
     *   serverlessFunction?: string,
     *   targetURL?: string,
     * } $fetch Body param: Variant of CardFetchBody with fields as optional for patches
     * @param string $title Body param: The top-level title for this card. Displayed to users in the CRM UI.
     *
     * @throws APIException
     */
    public function update(
        string $cardID,
        int $appID,
        array|CardActions|null $actions = null,
        array|CardDisplayBody|null $display = null,
        ?array $fetch = null,
        ?string $title = null,
        ?RequestOptions $requestOptions = null,
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
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        ?RequestOptions $requestOptions = null
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
     *
     * @throws APIException
     */
    public function delete(
        string $cardID,
        int $appID,
        ?RequestOptions $requestOptions = null
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
     *
     * @throws APIException
     */
    public function get(
        string $cardID,
        int $appID,
        ?RequestOptions $requestOptions = null
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
     * @throws APIException
     */
    public function getSampleResponse(
        ?RequestOptions $requestOptions = null
    ): IntegratorCardPayloadResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getSampleResponse(requestOptions: $requestOptions);

        return $response->parse();
    }
}
