<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Extensions;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Extensions\Cards\CardActions;
use HubspotSDK\CRM\Extensions\Cards\CardCreateParams;
use HubspotSDK\CRM\Extensions\Cards\CardDeleteParams;
use HubspotSDK\CRM\Extensions\Cards\CardDisplayBody;
use HubspotSDK\CRM\Extensions\Cards\CardFetchBody;
use HubspotSDK\CRM\Extensions\Cards\CardFetchBodyPatch;
use HubspotSDK\CRM\Extensions\Cards\CardGetParams;
use HubspotSDK\CRM\Extensions\Cards\CardUpdateParams;
use HubspotSDK\CRM\Extensions\Cards\IntegratorCardPayloadResponse;
use HubspotSDK\CRM\Extensions\Cards\PublicCardListResponse;
use HubspotSDK\CRM\Extensions\Cards\PublicCardResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\Extensions\CardsContract;

use const HubspotSDK\Core\OMIT as omit;

final class CardsService implements CardsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Defines a new card that will become active on an account when this app is installed.
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
    ): PublicCardResponse {
        $params = [
            'actions' => $actions,
            'display' => $display,
            'fetch' => $fetch,
            'title' => $title,
        ];

        return $this->createRaw($appID, $params, $requestOptions);
    }

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
    ): PublicCardResponse {
        [$parsed, $options] = CardCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['crm/v3/extensions/cards-dev/%1$s', $appID],
            body: (object) $parsed,
            options: $options,
            convert: PublicCardResponse::class,
        );
    }

    /**
     * @api
     *
     * Update a card definition with new details.
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
    ): PublicCardResponse {
        $params = [
            'appID' => $appID,
            'actions' => $actions,
            'display' => $display,
            'fetch' => $fetch,
            'title' => $title,
        ];

        return $this->updateRaw($cardID, $params, $requestOptions);
    }

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
    ): PublicCardResponse {
        [$parsed, $options] = CardUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['crm/v3/extensions/cards-dev/%1$s/%2$s', $appID, $cardID],
            body: (object) array_diff_key($parsed, ['appID']),
            options: $options,
            convert: PublicCardResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of cards for a given app.
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): PublicCardListResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/extensions/cards-dev/%1$s', $appID],
            options: $requestOptions,
            convert: PublicCardListResponse::class,
        );
    }

    /**
     * @api
     *
     * Permanently deletes a card definition with the given ID. Once deleted, data fetch requests for this card will no longer be sent to your service. This can't be undone.
     *
     * @param int $appID
     *
     * @throws APIException
     */
    public function delete(
        string $cardID,
        $appID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['appID' => $appID];

        return $this->deleteRaw($cardID, $params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = CardDeleteParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['crm/v3/extensions/cards-dev/%1$s/%2$s', $appID, $cardID],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Returns the definition for a card with the given ID.
     *
     * @param int $appID
     *
     * @throws APIException
     */
    public function get(
        string $cardID,
        $appID,
        ?RequestOptions $requestOptions = null
    ): PublicCardResponse {
        $params = ['appID' => $appID];

        return $this->getRaw($cardID, $params, $requestOptions);
    }

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
    ): PublicCardResponse {
        [$parsed, $options] = CardGetParams::parseRequest($params, $requestOptions);
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/extensions/cards-dev/%1$s/%2$s', $appID, $cardID],
            options: $options,
            convert: PublicCardResponse::class,
        );
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
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'crm/v3/extensions/cards-dev/sample-response',
            options: $requestOptions,
            convert: IntegratorCardPayloadResponse::class,
        );
    }
}
