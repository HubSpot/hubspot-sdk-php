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

use const HubspotSDK\Core\OMIT as omit;

final class SubscriptionsService implements SubscriptionsContract
{
    /**
     * @@api
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
     * Get subscription definitions
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): SubscriptionDefinitionsResponse {
        // @phpstan-ignore-next-line;
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
     * Get subscription statuses for a contact
     *
     * @throws APIException
     */
    public function getEmailStatus(
        string $emailAddress,
        ?RequestOptions $requestOptions = null
    ): PublicSubscriptionStatusesResponse {
        // @phpstan-ignore-next-line;
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
     * Subscribe a contact
     *
     * @param string $emailAddress
     * @param string $subscriptionID
     * @param LegalBasis|value-of<LegalBasis> $legalBasis
     * @param string $legalBasisExplanation
     *
     * @throws APIException
     */
    public function subscribe(
        $emailAddress,
        $subscriptionID,
        $legalBasis = omit,
        $legalBasisExplanation = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicSubscriptionStatus {
        $params = [
            'emailAddress' => $emailAddress,
            'subscriptionID' => $subscriptionID,
            'legalBasis' => $legalBasis,
            'legalBasisExplanation' => $legalBasisExplanation,
        ];

        return $this->subscribeRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function subscribeRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicSubscriptionStatus {
        [$parsed, $options] = SubscriptionSubscribeParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * Unsubscribe a contact
     *
     * @param string $emailAddress
     * @param string $subscriptionID
     * @param HubspotSDK\Marketing\Subscriptions\SubscriptionUnsubscribeParams\LegalBasis|value-of<HubspotSDK\Marketing\Subscriptions\SubscriptionUnsubscribeParams\LegalBasis> $legalBasis
     * @param string $legalBasisExplanation
     *
     * @throws APIException
     */
    public function unsubscribe(
        $emailAddress,
        $subscriptionID,
        $legalBasis = omit,
        $legalBasisExplanation = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicSubscriptionStatus {
        $params = [
            'emailAddress' => $emailAddress,
            'subscriptionID' => $subscriptionID,
            'legalBasis' => $legalBasis,
            'legalBasisExplanation' => $legalBasisExplanation,
        ];

        return $this->unsubscribeRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function unsubscribeRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicSubscriptionStatus {
        [$parsed, $options] = SubscriptionUnsubscribeParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'communication-preferences/v3/unsubscribe',
            body: (object) $parsed,
            options: $options,
            convert: PublicSubscriptionStatus::class,
        );
    }
}
