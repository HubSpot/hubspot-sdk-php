<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Subscriptions\PublicSubscriptionStatus;
use HubspotSDK\Marketing\Subscriptions\PublicSubscriptionStatusesResponse;
use HubspotSDK\Marketing\Subscriptions\SubscriptionDefinitionsResponse;
use HubspotSDK\Marketing\Subscriptions\SubscriptionSubscribeParams;
use HubspotSDK\Marketing\Subscriptions\SubscriptionSubscribeParams\LegalBasis;
use HubspotSDK\Marketing\Subscriptions\SubscriptionUnsubscribeParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\SubscriptionsContract;
use HubspotSDK\Services\Marketing\Subscriptions\V4Service;

final class SubscriptionsService implements SubscriptionsContract
{
    /**
     * @api
     */
    public V4Service $v4;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->v4 = new V4Service($client);
    }

    /**
     * @api
     *
     * Get a list of all subscription definitions for the portal
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): SubscriptionDefinitionsResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'communication-preferences/v3/definitions',
            options: $requestOptions,
            convert: SubscriptionDefinitionsResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of subscriptions and their status for a given contact.
     *
     * @throws APIException
     */
    public function getEmailStatus(
        string $emailAddress,
        ?RequestOptions $requestOptions = null
    ): PublicSubscriptionStatusesResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['communication-preferences/v3/status/email/%1$s', $emailAddress],
            options: $requestOptions,
            convert: PublicSubscriptionStatusesResponse::class,
        );
    }

    /**
     * @api
     *
     * Subscribes a contact to the given subscription type. This API is not valid to use for subscribing a contact at a brand or portal level and will return an error.
     *
     * @param array{
     *   emailAddress: string,
     *   subscriptionId: string,
     *   legalBasis?: value-of<LegalBasis>,
     *   legalBasisExplanation?: string,
     * }|SubscriptionSubscribeParams $params
     *
     * @throws APIException
     */
    public function subscribe(
        array|SubscriptionSubscribeParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicSubscriptionStatus {
        [$parsed, $options] = SubscriptionSubscribeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'communication-preferences/v3/subscribe',
            body: (object) $parsed,
            options: $options,
            convert: PublicSubscriptionStatus::class,
        );
    }

    /**
     * @api
     *
     * Unsubscribes a contact from the given subscription type. This API is not valid to use for unsubscribing a contact at a brand or portal level and will return an error.
     *
     * @param array{
     *   emailAddress: string,
     *   subscriptionId: string,
     *   legalBasis?: value-of<SubscriptionUnsubscribeParams\LegalBasis>,
     *   legalBasisExplanation?: string,
     * }|SubscriptionUnsubscribeParams $params
     *
     * @throws APIException
     */
    public function unsubscribe(
        array|SubscriptionUnsubscribeParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicSubscriptionStatus {
        [$parsed, $options] = SubscriptionUnsubscribeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'communication-preferences/v3/unsubscribe',
            body: (object) $parsed,
            options: $options,
            convert: PublicSubscriptionStatus::class,
        );
    }
}
