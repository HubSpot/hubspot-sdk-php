<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Subscriptions\SubscriptionPauseParams;
use HubspotSDK\Crm\Subscriptions\SubscriptionUnpauseParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\SubscriptionsContract;

final class SubscriptionsService implements SubscriptionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Cancel an active commerce subscription using the subscription ID.
     *
     * @throws APIException
     */
    public function cancel(
        int $objectID,
        ?RequestOptions $requestOptions = null
    ): string {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'payments-subscriptions/v1/subscriptions/crm/%1$s/cancel', $objectID,
            ],
            headers: ['Accept' => '*/*'],
            options: $requestOptions,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Pause an active subscription using the subscription ID.
     *
     * @param array{pauseReason?: string}|SubscriptionPauseParams $params
     *
     * @throws APIException
     */
    public function pause(
        int $objectID,
        array|SubscriptionPauseParams $params,
        ?RequestOptions $requestOptions = null,
    ): string {
        [$parsed, $options] = SubscriptionPauseParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'payments-subscriptions/v1/subscriptions/crm/%1$s/pause', $objectID,
            ],
            headers: ['Accept' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Resume a previously paused subscription using the subscription ID.
     *
     * @param array{proposedNextBillingDate: int}|SubscriptionUnpauseParams $params
     *
     * @throws APIException
     */
    public function unpause(
        int $objectID,
        array|SubscriptionUnpauseParams $params,
        ?RequestOptions $requestOptions = null,
    ): string {
        [$parsed, $options] = SubscriptionUnpauseParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'payments-subscriptions/v1/subscriptions/crm/%1$s/unpause', $objectID,
            ],
            headers: ['Accept' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }
}
