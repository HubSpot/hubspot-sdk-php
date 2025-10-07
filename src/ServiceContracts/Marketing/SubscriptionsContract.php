<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Subscriptions\PublicSubscriptionStatus;
use HubspotSDK\Marketing\Subscriptions\PublicSubscriptionStatusesResponse;
use HubspotSDK\Marketing\Subscriptions\SubscriptionDefinitionsResponse;
use HubspotSDK\Marketing\Subscriptions\SubscriptionSubscribeParams\LegalBasis;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface SubscriptionsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): SubscriptionDefinitionsResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getEmailStatus(
        string $emailAddress,
        ?RequestOptions $requestOptions = null
    ): PublicSubscriptionStatusesResponse;

    /**
     * @api
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
    ): PublicSubscriptionStatus;

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
    ): PublicSubscriptionStatus;

    /**
     * @api
     *
     * @param string $emailAddress
     * @param string $subscriptionID
     * @param \HubspotSDK\Marketing\Subscriptions\SubscriptionUnsubscribeParams\LegalBasis|value-of<\HubspotSDK\Marketing\Subscriptions\SubscriptionUnsubscribeParams\LegalBasis> $legalBasis
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
    ): PublicSubscriptionStatus;

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
    ): PublicSubscriptionStatus;
}
