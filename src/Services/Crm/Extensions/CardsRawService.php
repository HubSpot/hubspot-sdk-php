<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Extensions;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\Cards\CardActions;
use HubspotSDK\Crm\Extensions\Cards\CardCreateParams;
use HubspotSDK\Crm\Extensions\Cards\CardDeleteParams;
use HubspotSDK\Crm\Extensions\Cards\CardDisplayBody;
use HubspotSDK\Crm\Extensions\Cards\CardDisplayProperty;
use HubspotSDK\Crm\Extensions\Cards\CardFetchBody\CardType;
use HubspotSDK\Crm\Extensions\Cards\CardGetParams;
use HubspotSDK\Crm\Extensions\Cards\CardObjectTypeBody;
use HubspotSDK\Crm\Extensions\Cards\CardUpdateParams;
use HubspotSDK\Crm\Extensions\Cards\IntegratorCardPayloadResponse;
use HubspotSDK\Crm\Extensions\Cards\PublicCardListResponse;
use HubspotSDK\Crm\Extensions\Cards\PublicCardResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Extensions\CardsRawContract;

final class CardsRawService implements CardsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Defines a new card that will become active on an account when this app is installed.
     *
     * @param int $appID the ID of the target app
     * @param array{
     *   actions: array{baseURLs: list<string>}|CardActions,
     *   display: array{
     *     properties: list<array<string,mixed>|CardDisplayProperty>
     *   }|CardDisplayBody,
     *   fetch: array{
     *     objectTypes: list<array<string,mixed>|CardObjectTypeBody>,
     *     targetURL: string,
     *     cardType?: 'EXTERNAL'|'SERVERLESS'|CardType,
     *     serverlessFunction?: string,
     *   },
     *   title: string,
     * }|CardCreateParams $params
     *
     * @return BaseResponse<PublicCardResponse>
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|CardCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CardCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $cardID path param: The ID of the card to update
     * @param array{
     *   appID: int,
     *   actions?: array{baseURLs: list<string>}|CardActions,
     *   display?: array{
     *     properties: list<array<string,mixed>|CardDisplayProperty>
     *   }|CardDisplayBody,
     *   fetch?: array{
     *     objectTypes: list<array<string,mixed>|CardObjectTypeBody>,
     *     cardType?: 'EXTERNAL'|'SERVERLESS'|\HubspotSDK\Crm\Extensions\Cards\CardFetchBodyPatch\CardType,
     *     serverlessFunction?: string,
     *     targetURL?: string,
     *   },
     *   title?: string,
     * }|CardUpdateParams $params
     *
     * @return BaseResponse<PublicCardResponse>
     *
     * @throws APIException
     */
    public function update(
        string $cardID,
        array|CardUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CardUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['crm/v3/extensions/cards-dev/%1$s/%2$s', $appID, $cardID],
            body: (object) array_diff_key($parsed, array_flip(['appID'])),
            options: $options,
            convert: PublicCardResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of cards for a given app.
     *
     * @param int $appID the ID of the target app
     *
     * @return BaseResponse<PublicCardListResponse>
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $cardID the ID of the card to delete
     * @param array{appID: int}|CardDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $cardID,
        array|CardDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CardDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
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
     * @param string $cardID the ID of the target card
     * @param array{appID: int}|CardGetParams $params
     *
     * @return BaseResponse<PublicCardResponse>
     *
     * @throws APIException
     */
    public function get(
        string $cardID,
        array|CardGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CardGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
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
     * @return BaseResponse<IntegratorCardPayloadResponse>
     *
     * @throws APIException
     */
    public function getSampleResponse(
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm/v3/extensions/cards-dev/sample-response',
            options: $requestOptions,
            convert: IntegratorCardPayloadResponse::class,
        );
    }
}
