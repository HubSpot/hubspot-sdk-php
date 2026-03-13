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
use HubspotSDK\Crm\Extensions\Cards\CardFetchBody;
use HubspotSDK\Crm\Extensions\Cards\CardFetchBodyPatch;
use HubspotSDK\Crm\Extensions\Cards\CardGetParams;
use HubspotSDK\Crm\Extensions\Cards\CardUpdateParams;
use HubspotSDK\Crm\Extensions\Cards\IntegratorCardPayloadResponse;
use HubspotSDK\Crm\Extensions\Cards\PublicCardListResponse;
use HubspotSDK\Crm\Extensions\Cards\PublicCardResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Extensions\CardsRawContract;

/**
 * @phpstan-import-type CardFetchBodyShape from \HubspotSDK\Crm\Extensions\Cards\CardFetchBody
 * @phpstan-import-type CardFetchBodyPatchShape from \HubspotSDK\Crm\Extensions\Cards\CardFetchBodyPatch
 * @phpstan-import-type CardActionsShape from \HubspotSDK\Crm\Extensions\Cards\CardActions
 * @phpstan-import-type CardDisplayBodyShape from \HubspotSDK\Crm\Extensions\Cards\CardDisplayBody
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
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
     *   actions: CardActions|CardActionsShape,
     *   display: CardDisplayBody|CardDisplayBodyShape,
     *   fetch: CardFetchBody|CardFetchBodyShape,
     *   title: string,
     * }|CardCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicCardResponse>
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|CardCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     *   actions?: CardActions|CardActionsShape,
     *   display?: CardDisplayBody|CardDisplayBodyShape,
     *   fetch?: CardFetchBodyPatch|CardFetchBodyPatchShape,
     *   title?: string,
     * }|CardUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicCardResponse>
     *
     * @throws APIException
     */
    public function update(
        string $cardID,
        array|CardUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicCardListResponse>
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        RequestOptions|array|null $requestOptions = null
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $cardID,
        array|CardDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicCardResponse>
     *
     * @throws APIException
     */
    public function get(
        string $cardID,
        array|CardGetParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<IntegratorCardPayloadResponse>
     *
     * @throws APIException
     */
    public function getSampleResponse(
        RequestOptions|array|null $requestOptions = null
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
