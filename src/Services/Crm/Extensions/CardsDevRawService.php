<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm\Extensions;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Extensions\CardsDev\CardActions;
use HubSpotSDK\Crm\Extensions\CardsDev\CardDisplayBody;
use HubSpotSDK\Crm\Extensions\CardsDev\CardFetchBody;
use HubSpotSDK\Crm\Extensions\CardsDev\CardFetchBodyPatch;
use HubSpotSDK\Crm\Extensions\CardsDev\CardMigrateViewsResponse;
use HubSpotSDK\Crm\Extensions\CardsDev\CardsDevCreateParams;
use HubSpotSDK\Crm\Extensions\CardsDev\CardsDevDeleteParams;
use HubSpotSDK\Crm\Extensions\CardsDev\CardsDevGetByIDParams;
use HubSpotSDK\Crm\Extensions\CardsDev\CardsDevMigrateViewsParams;
use HubSpotSDK\Crm\Extensions\CardsDev\CardsDevUpdateParams;
use HubSpotSDK\Crm\Extensions\CardsDev\IntegratorCardPayloadResponse;
use HubSpotSDK\Crm\Extensions\CardsDev\PublicCardListResponse;
use HubSpotSDK\Crm\Extensions\CardsDev\PublicCardResponse;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\Extensions\CardsDevRawContract;

/**
 * @phpstan-import-type CardFetchBodyShape from \HubSpotSDK\Crm\Extensions\CardsDev\CardFetchBody
 * @phpstan-import-type CardFetchBodyPatchShape from \HubSpotSDK\Crm\Extensions\CardsDev\CardFetchBodyPatch
 * @phpstan-import-type CardActionsShape from \HubSpotSDK\Crm\Extensions\CardsDev\CardActions
 * @phpstan-import-type CardDisplayBodyShape from \HubSpotSDK\Crm\Extensions\CardsDev\CardDisplayBody
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class CardsDevRawService implements CardsDevRawContract
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
     * @param int $appID The appId of the app containing the Legacy CRM Card(s)
     * @param array{
     *   actions: CardActions|CardActionsShape,
     *   display: CardDisplayBody|CardDisplayBodyShape,
     *   fetch: CardFetchBody|CardFetchBodyShape,
     *   title: string,
     * }|CardsDevCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicCardResponse>
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|CardsDevCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CardsDevCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['crm/extensions/cards-dev/2026-03/%1$s', $appID],
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
     * @param string $cardID Path param: The id of the Legacy CRM Card
     * @param array{
     *   appID: int,
     *   actions?: CardActions|CardActionsShape,
     *   display?: CardDisplayBody|CardDisplayBodyShape,
     *   fetch?: CardFetchBodyPatch|CardFetchBodyPatchShape,
     *   title?: string,
     * }|CardsDevUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicCardResponse>
     *
     * @throws APIException
     */
    public function update(
        string $cardID,
        array|CardsDevUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CardsDevUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['crm/extensions/cards-dev/2026-03/%1$s/%2$s', $appID, $cardID],
            body: (object) array_diff_key($parsed, array_flip(['appID'])),
            options: $options,
            convert: PublicCardResponse::class,
        );
    }

    /**
     * @api
     *
     * Permanently deletes a card definition with the given ID. Once deleted, data fetch requests for this card will no longer be sent to your service. This can't be undone.
     *
     * @param string $cardID The id of the Legacy CRM Card
     * @param array{appID: int}|CardsDevDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $cardID,
        array|CardsDevDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CardsDevDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['crm/extensions/cards-dev/2026-03/%1$s/%2$s', $appID, $cardID],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Returns a list of cards for a given app.
     *
     * @param int $appID The appId of the app containing the Legacy CRM Card(s)
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicCardListResponse>
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/extensions/cards-dev/2026-03/%1$s', $appID],
            options: $requestOptions,
            convert: PublicCardListResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the definition for a card with the given ID.
     *
     * @param string $cardID The id of the Legacy CRM Card
     * @param array{appID: int}|CardsDevGetByIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicCardResponse>
     *
     * @throws APIException
     */
    public function getByID(
        string $cardID,
        array|CardsDevGetByIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CardsDevGetByIDParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/extensions/cards-dev/2026-03/%1$s/%2$s', $appID, $cardID],
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
            path: 'crm/extensions/cards-dev/2026-03/sample-response',
            options: $requestOptions,
            convert: IntegratorCardPayloadResponse::class,
        );
    }

    /**
     * @api
     *
     * Swaps a Legacy CRM Card with an App Card in views. Reference the "Migrate a legacy CRM card to an app card" docs for more information
     *
     * @param int $appID The appId of the app containing the Legacy CRM Card(s)
     * @param array{
     *   allowDuplicateAppCardIDs: bool,
     *   appCardID: int,
     *   legacyCrmCardID: int,
     *   helpdeskAppCardID?: int,
     * }|CardsDevMigrateViewsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CardMigrateViewsResponse>
     *
     * @throws APIException
     */
    public function migrateViews(
        int $appID,
        array|CardsDevMigrateViewsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CardsDevMigrateViewsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['crm/extensions/cards-dev/2026-03/%1$s/views/migrate', $appID],
            body: (object) $parsed,
            options: $options,
            convert: CardMigrateViewsResponse::class,
        );
    }
}
