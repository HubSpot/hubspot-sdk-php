<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Extensions;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\CardsDev\CardActions;
use HubspotSDK\Crm\Extensions\CardsDev\CardDisplayBody;
use HubspotSDK\Crm\Extensions\CardsDev\CardFetchBody;
use HubspotSDK\Crm\Extensions\CardsDev\CardFetchBodyPatch;
use HubspotSDK\Crm\Extensions\CardsDev\CardMigrateViewsResponse;
use HubspotSDK\Crm\Extensions\CardsDev\CardsDevCreateParams;
use HubspotSDK\Crm\Extensions\CardsDev\CardsDevDeleteParams;
use HubspotSDK\Crm\Extensions\CardsDev\CardsDevGetByIDParams;
use HubspotSDK\Crm\Extensions\CardsDev\CardsDevMigrateViewsParams;
use HubspotSDK\Crm\Extensions\CardsDev\CardsDevUpdateParams;
use HubspotSDK\Crm\Extensions\CardsDev\IntegratorCardPayloadResponse;
use HubspotSDK\Crm\Extensions\CardsDev\PublicCardListResponse;
use HubspotSDK\Crm\Extensions\CardsDev\PublicCardResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Extensions\CardsDevRawContract;

/**
 * @phpstan-import-type CardFetchBodyShape from \HubspotSDK\Crm\Extensions\CardsDev\CardFetchBody
 * @phpstan-import-type CardFetchBodyPatchShape from \HubspotSDK\Crm\Extensions\CardsDev\CardFetchBodyPatch
 * @phpstan-import-type CardActionsShape from \HubspotSDK\Crm\Extensions\CardsDev\CardActions
 * @phpstan-import-type CardDisplayBodyShape from \HubspotSDK\Crm\Extensions\CardsDev\CardDisplayBody
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
     * @param string $cardID Path param
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
     * @param array{
     *   appCardID: int, legacyCrmCardID: int, helpdeskAppCardID?: int
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
