<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Extensions;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\Cards\CardActions;
use HubspotSDK\Crm\Extensions\Cards\CardCreateParams;
use HubspotSDK\Crm\Extensions\Cards\CardDeleteParams;
use HubspotSDK\Crm\Extensions\Cards\CardDisplayBody;
use HubspotSDK\Crm\Extensions\Cards\CardDisplayProperty;
use HubspotSDK\Crm\Extensions\Cards\CardGetParams;
use HubspotSDK\Crm\Extensions\Cards\CardObjectTypeBody;
use HubspotSDK\Crm\Extensions\Cards\CardUpdateParams;
use HubspotSDK\Crm\Extensions\Cards\IntegratorCardPayloadResponse;
use HubspotSDK\Crm\Extensions\Cards\PublicCardListResponse;
use HubspotSDK\Crm\Extensions\Cards\PublicCardResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Extensions\CardsContract;

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
     * @param array{
     *   actions: array{baseUrls: list<string>}|CardActions,
     *   display: array{
     *     properties: list<array<mixed>|CardDisplayProperty>
     *   }|CardDisplayBody,
     *   fetch: array{
     *     objectTypes: list<array<mixed>|CardObjectTypeBody>,
     *     targetUrl: string,
     *     cardType?: "EXTERNAL"|"SERVERLESS",
     *     serverlessFunction?: string,
     *   },
     *   title: string,
     * }|CardCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|CardCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicCardResponse {
        [$parsed, $options] = CardCreateParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   appId: int,
     *   actions?: array{baseUrls: list<string>}|CardActions,
     *   display?: array{
     *     properties: list<array<mixed>|CardDisplayProperty>
     *   }|CardDisplayBody,
     *   fetch?: array{
     *     objectTypes: list<array<mixed>|CardObjectTypeBody>,
     *     cardType?: "EXTERNAL"|"SERVERLESS",
     *     serverlessFunction?: string,
     *     targetUrl?: string,
     *   },
     *   title?: string,
     * }|CardUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $cardID,
        array|CardUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicCardResponse {
        [$parsed, $options] = CardUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['crm/v3/extensions/cards-dev/%1$s/%2$s', $appID, $cardID],
            body: (object) array_diff_key($parsed, ['appId']),
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
     * @param array{appId: int}|CardDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $cardID,
        array|CardDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = CardDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);

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
     * @param array{appId: int}|CardGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $cardID,
        array|CardGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicCardResponse {
        [$parsed, $options] = CardGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);

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
