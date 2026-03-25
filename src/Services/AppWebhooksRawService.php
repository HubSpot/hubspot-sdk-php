<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\AppWebhooks\AppWebhookBatchUpdateSubscriptionsParams;
use HubspotSDK\AppWebhooks\AppWebhookCreateSubscriptionParams;
use HubspotSDK\AppWebhooks\AppWebhookCreateSubscriptionParams\EventType;
use HubspotSDK\AppWebhooks\AppWebhookDeleteSubscriptionParams;
use HubspotSDK\AppWebhooks\AppWebhookGetSubscriptionParams;
use HubspotSDK\AppWebhooks\AppWebhookUpdateSettingsParams;
use HubspotSDK\AppWebhooks\AppWebhookUpdateSubscriptionParams;
use HubspotSDK\AppWebhooks\BatchResponseSubscriptionResponse;
use HubspotSDK\AppWebhooks\SubscriptionBatchUpdateRequest;
use HubspotSDK\AppWebhooks\SubscriptionListResponse;
use HubspotSDK\AppWebhooks\SubscriptionResponse;
use HubspotSDK\AppWebhooks\ThrottlingSettings;
use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\Calling\SettingsResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\AppWebhooksRawContract;

/**
 * @phpstan-import-type SubscriptionBatchUpdateRequestShape from \HubspotSDK\AppWebhooks\SubscriptionBatchUpdateRequest
 * @phpstan-import-type ThrottlingSettingsShape from \HubspotSDK\AppWebhooks\ThrottlingSettings
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class AppWebhooksRawService implements AppWebhooksRawContract
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
     *   inputs: list<SubscriptionBatchUpdateRequest|SubscriptionBatchUpdateRequestShape>,
     * }|AppWebhookBatchUpdateSubscriptionsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseSubscriptionResponse>
     *
     * @throws APIException
     */
    public function batchUpdateSubscriptions(
        int $appID,
        array|AppWebhookBatchUpdateSubscriptionsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AppWebhookBatchUpdateSubscriptionsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['app-webhooks/2026-03/%1$s/subscriptions/batch/update', $appID],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseSubscriptionResponse::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   active: bool,
     *   eventType: value-of<EventType>,
     *   eventTypeName?: string,
     *   objectTypeID?: string,
     *   propertyName?: string,
     * }|AppWebhookCreateSubscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriptionResponse>
     *
     * @throws APIException
     */
    public function createSubscription(
        int $appID,
        array|AppWebhookCreateSubscriptionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AppWebhookCreateSubscriptionParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['app-webhooks/2026-03/%1$s/subscriptions', $appID],
            body: (object) $parsed,
            options: $options,
            convert: SubscriptionResponse::class,
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['app-webhooks/2026-03/%1$s/settings', $appID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param array{appID: int}|AppWebhookDeleteSubscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteSubscription(
        int $subscriptionID,
        array|AppWebhookDeleteSubscriptionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AppWebhookDeleteSubscriptionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'app-webhooks/2026-03/%1$s/subscriptions/%2$s', $appID, $subscriptionID,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingsResponse>
     *
     * @throws APIException
     */
    public function getSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['app-webhooks/2026-03/%1$s/settings', $appID],
            options: $requestOptions,
            convert: SettingsResponse::class,
        );
    }

    /**
     * @api
     *
     * @param array{appID: int}|AppWebhookGetSubscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriptionResponse>
     *
     * @throws APIException
     */
    public function getSubscription(
        int $subscriptionID,
        array|AppWebhookGetSubscriptionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AppWebhookGetSubscriptionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'app-webhooks/2026-03/%1$s/subscriptions/%2$s', $appID, $subscriptionID,
            ],
            options: $options,
            convert: SubscriptionResponse::class,
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriptionListResponse>
     *
     * @throws APIException
     */
    public function listSubscriptions(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['app-webhooks/2026-03/%1$s/subscriptions', $appID],
            options: $requestOptions,
            convert: SubscriptionListResponse::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   targetURL: string, throttling: ThrottlingSettings|ThrottlingSettingsShape
     * }|AppWebhookUpdateSettingsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingsResponse>
     *
     * @throws APIException
     */
    public function updateSettings(
        int $appID,
        array|AppWebhookUpdateSettingsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AppWebhookUpdateSettingsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['app-webhooks/2026-03/%1$s/settings', $appID],
            body: (object) $parsed,
            options: $options,
            convert: SettingsResponse::class,
        );
    }

    /**
     * @api
     *
     * @param int $subscriptionID Path param
     * @param array{
     *   appID: int, active?: bool
     * }|AppWebhookUpdateSubscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriptionResponse>
     *
     * @throws APIException
     */
    public function updateSubscription(
        int $subscriptionID,
        array|AppWebhookUpdateSubscriptionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AppWebhookUpdateSubscriptionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: [
                'app-webhooks/2026-03/%1$s/subscriptions/%2$s', $appID, $subscriptionID,
            ],
            body: (object) array_diff_key($parsed, array_flip(['appID'])),
            options: $options,
            convert: SubscriptionResponse::class,
        );
    }
}
