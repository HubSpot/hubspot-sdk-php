<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Subscriptions\PublicSubscriptionStatus;
use HubspotSDK\Marketing\Subscriptions\PublicSubscriptionStatusesResponse;
use HubspotSDK\Marketing\Subscriptions\SubscriptionDefinitionsResponse;
use HubspotSDK\Marketing\Subscriptions\SubscriptionSubscribeParams\LegalBasis;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface SubscriptionsContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): SubscriptionDefinitionsResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEmailStatus(
        string $emailAddress,
        RequestOptions|array|null $requestOptions = null
    ): PublicSubscriptionStatusesResponse;

    /**
     * @api
     *
     * @param string $emailAddress contact's email address
     * @param string $subscriptionID ID of the subscription being updated for the contact
     * @param LegalBasis|value-of<LegalBasis> $legalBasis legal basis for updating the contact's status (required for GDPR enabled portals)
     * @param string $legalBasisExplanation a more detailed explanation to go with the legal basis (required for GDPR enabled portals)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function subscribe(
        string $emailAddress,
        string $subscriptionID,
        LegalBasis|string|null $legalBasis = null,
        ?string $legalBasisExplanation = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicSubscriptionStatus;

    /**
     * @api
     *
     * @param string $emailAddress contact's email address
     * @param string $subscriptionID ID of the subscription being updated for the contact
     * @param \HubspotSDK\Marketing\Subscriptions\SubscriptionUnsubscribeParams\LegalBasis|value-of<\HubspotSDK\Marketing\Subscriptions\SubscriptionUnsubscribeParams\LegalBasis> $legalBasis legal basis for updating the contact's status (required for GDPR enabled portals)
     * @param string $legalBasisExplanation a more detailed explanation to go with the legal basis (required for GDPR enabled portals)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function unsubscribe(
        string $emailAddress,
        string $subscriptionID,
        \HubspotSDK\Marketing\Subscriptions\SubscriptionUnsubscribeParams\LegalBasis|string|null $legalBasis = null,
        ?string $legalBasisExplanation = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicSubscriptionStatus;
}
