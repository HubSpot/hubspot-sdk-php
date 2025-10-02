<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Subscriptions\SubscriptionSubscribeParams;
use HubspotSDK\Marketing\Subscriptions\SubscriptionSubscribeParams\LegalBasis;
use HubspotSDK\Marketing\Subscriptions\SubscriptionUnsubscribeParams;
use HubspotSDK\Marketing\Subscriptions\V3\SubscriptionsV3PublicSubscriptionStatus;
use HubspotSDK\Marketing\Subscriptions\V3\SubscriptionsV3PublicSubscriptionStatusesResponse;
use HubspotSDK\Marketing\Subscriptions\V3\SubscriptionsV3SubscriptionDefinitionsResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\SubscriptionsContract;
use HubspotSDK\Services\Marketing\Subscriptions\V3Service;

use const HubspotSDK\Core\OMIT as omit;

final class SubscriptionsService implements SubscriptionsContract
{
    /**
     * @@api
     */
    public V3Service $v3;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->v3 = new V3Service($client);
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
    ): SubscriptionsV3SubscriptionDefinitionsResponse {
        $params = [];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function listRaw(
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): SubscriptionsV3SubscriptionDefinitionsResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'communication-preferences/v3/definitions',
            options: $requestOptions,
            convert: SubscriptionsV3SubscriptionDefinitionsResponse::class,
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
    ): SubscriptionsV3PublicSubscriptionStatusesResponse {
        $params = [];

        return $this->getEmailStatusRaw($emailAddress, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function getEmailStatusRaw(
        string $emailAddress,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): SubscriptionsV3PublicSubscriptionStatusesResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['communication-preferences/v3/status/email/%1$s', $emailAddress],
            options: $requestOptions,
            convert: SubscriptionsV3PublicSubscriptionStatusesResponse::class,
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
    ): SubscriptionsV3PublicSubscriptionStatus {
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
    ): SubscriptionsV3PublicSubscriptionStatus {
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
            convert: SubscriptionsV3PublicSubscriptionStatus::class,
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
    ): SubscriptionsV3PublicSubscriptionStatus {
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
    ): SubscriptionsV3PublicSubscriptionStatus {
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
            convert: SubscriptionsV3PublicSubscriptionStatus::class,
        );
    }
}
