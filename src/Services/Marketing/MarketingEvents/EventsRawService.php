<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Marketing\MarketingEvents;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Marketing\MarketingEvents\Events\EventCancelByExternalEventIDParams;
use HubSpotSDK\Marketing\MarketingEvents\Events\EventCompleteByExternalEventIDParams;
use HubSpotSDK\Marketing\MarketingEvents\MarketingEventDefaultResponse;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Marketing\MarketingEvents\EventsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class EventsRawService implements EventsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Mark a marketing event as cancelled.
     *
     * @param array{
     *   externalAccountID: string
     * }|EventCancelByExternalEventIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MarketingEventDefaultResponse>
     *
     * @throws APIException
     */
    public function cancelByExternalEventID(
        string $externalEventID,
        array|EventCancelByExternalEventIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventCancelByExternalEventIDParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'marketing/marketing-events/2026-03/events/%1$s/cancel',
                $externalEventID,
            ],
            query: Util::array_transform_keys(
                $parsed,
                ['externalAccountID' => 'externalAccountId']
            ),
            options: $options,
            convert: MarketingEventDefaultResponse::class,
        );
    }

    /**
     * @api
     *
     * Mark a marketing event as completed
     *
     * @param string $externalEventID Path param
     * @param array{
     *   externalAccountID: string,
     *   endDateTime: \DateTimeInterface,
     *   startDateTime: \DateTimeInterface,
     * }|EventCompleteByExternalEventIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MarketingEventDefaultResponse>
     *
     * @throws APIException
     */
    public function completeByExternalEventID(
        string $externalEventID,
        array|EventCompleteByExternalEventIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventCompleteByExternalEventIDParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['externalAccountID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'marketing/marketing-events/2026-03/events/%1$s/complete',
                $externalEventID,
            ],
            query: Util::array_transform_keys(
                array_intersect_key($parsed, $query_params),
                ['externalAccountID' => 'externalAccountId'],
            ),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: MarketingEventDefaultResponse::class,
        );
    }
}
