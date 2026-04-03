<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\MarketingEvents;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventEmailSubscriber;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventSubscriber;
use HubspotSDK\Marketing\MarketingEvents\SubscriberState\SubscriberStateRecordByEmailParams;
use HubspotSDK\Marketing\MarketingEvents\SubscriberState\SubscriberStateRecordByIDParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\MarketingEvents\SubscriberStateRawContract;

/**
 * @phpstan-import-type MarketingEventEmailSubscriberShape from \HubspotSDK\Marketing\MarketingEvents\MarketingEventEmailSubscriber
 * @phpstan-import-type MarketingEventSubscriberShape from \HubspotSDK\Marketing\MarketingEvents\MarketingEventSubscriber
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class SubscriberStateRawService implements SubscriberStateRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Record a subscriber state between multiple HubSpot contacts and a marketing event, using contact email addresses. Note that the contact must already exist in HubSpot; a contact will not be created. The contactProperties field is used only when creating a new contact. These properties will not update existing contacts.
     *
     * @param string $subscriberState Path param
     * @param array{
     *   externalEventID: string,
     *   externalAccountID: string,
     *   inputs: list<MarketingEventEmailSubscriber|MarketingEventEmailSubscriberShape>,
     * }|SubscriberStateRecordByEmailParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function recordByEmail(
        string $subscriberState,
        array|SubscriberStateRecordByEmailParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SubscriberStateRecordByEmailParams::parseRequest(
            $params,
            $requestOptions,
        );
        $externalEventID = $parsed['externalEventID'];
        unset($parsed['externalEventID']);
        $query_params = array_flip(['externalAccountID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'marketing/marketing-events/2026-03/events/%1$s/%2$s/email-upsert',
                $externalEventID,
                $subscriberState,
            ],
            query: Util::array_transform_keys(
                array_intersect_key($parsed, $query_params),
                ['externalAccountID' => 'externalAccountId'],
            ),
            headers: ['Accept' => '*/*'],
            body: (object) array_diff_key(
                array_diff_key($parsed, $query_params),
                array_flip(['externalEventID'])
            ),
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Record a subscriber state between multiple HubSpot contacts and a marketing event, using HubSpot contact IDs. Note that the contact must already exist in HubSpot; a contact will not be created.
     *
     * @param string $subscriberState Path param
     * @param array{
     *   externalEventID: string,
     *   externalAccountID: string,
     *   inputs: list<MarketingEventSubscriber|MarketingEventSubscriberShape>,
     * }|SubscriberStateRecordByIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function recordByID(
        string $subscriberState,
        array|SubscriberStateRecordByIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SubscriberStateRecordByIDParams::parseRequest(
            $params,
            $requestOptions,
        );
        $externalEventID = $parsed['externalEventID'];
        unset($parsed['externalEventID']);
        $query_params = array_flip(['externalAccountID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'marketing/marketing-events/2026-03/events/%1$s/%2$s/upsert',
                $externalEventID,
                $subscriberState,
            ],
            query: Util::array_transform_keys(
                array_intersect_key($parsed, $query_params),
                ['externalAccountID' => 'externalAccountId'],
            ),
            headers: ['Accept' => '*/*'],
            body: (object) array_diff_key(
                array_diff_key($parsed, $query_params),
                array_flip(['externalEventID'])
            ),
            options: $options,
            convert: 'string',
        );
    }
}
