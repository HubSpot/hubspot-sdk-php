<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Subscriptions\SubscriptionPauseParams;
use HubspotSDK\Crm\Subscriptions\SubscriptionUnpauseParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\SubscriptionsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class SubscriptionsRawService implements SubscriptionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Cancel an active commerce subscription using the subscription ID.
     *
     * @param int $objectID subscription CRM id
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function cancel(
        int $objectID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param int $objectID subscription CRM id
     * @param array{pauseReason?: string}|SubscriptionPauseParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function pause(
        int $objectID,
        array|SubscriptionPauseParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SubscriptionPauseParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param int $objectID subscription CRM id
     * @param array{proposedNextBillingDate: int}|SubscriptionUnpauseParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function unpause(
        int $objectID,
        array|SubscriptionUnpauseParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SubscriptionUnpauseParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
