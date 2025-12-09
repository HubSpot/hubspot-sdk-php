<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Subscriptions\PublicSubscriptionStatus;
use HubspotSDK\Marketing\Subscriptions\PublicSubscriptionStatusesResponse;
use HubspotSDK\Marketing\Subscriptions\SubscriptionDefinitionsResponse;
use HubspotSDK\Marketing\Subscriptions\SubscriptionSubscribeParams\LegalBasis;
use HubspotSDK\RequestOptions;

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
     * @param string $emailAddress contact's email address
     * @param string $subscriptionID ID of the subscription being updated for the contact
     * @param 'CONSENT_WITH_NOTICE'|'LEGITIMATE_INTEREST_CLIENT'|'LEGITIMATE_INTEREST_OTHER'|'LEGITIMATE_INTEREST_PQL'|'NON_GDPR'|'PERFORMANCE_OF_CONTRACT'|'PROCESS_AND_STORE'|LegalBasis $legalBasis legal basis for updating the contact's status (required for GDPR enabled portals)
     * @param string $legalBasisExplanation a more detailed explanation to go with the legal basis (required for GDPR enabled portals)
     *
     * @throws APIException
     */
    public function subscribe(
        string $emailAddress,
        string $subscriptionID,
        string|LegalBasis|null $legalBasis = null,
        ?string $legalBasisExplanation = null,
        ?RequestOptions $requestOptions = null,
    ): PublicSubscriptionStatus;

    /**
     * @api
     *
     * @param string $emailAddress contact's email address
     * @param string $subscriptionID ID of the subscription being updated for the contact
     * @param 'CONSENT_WITH_NOTICE'|'LEGITIMATE_INTEREST_CLIENT'|'LEGITIMATE_INTEREST_OTHER'|'LEGITIMATE_INTEREST_PQL'|'NON_GDPR'|'PERFORMANCE_OF_CONTRACT'|'PROCESS_AND_STORE'|\HubspotSDK\Marketing\Subscriptions\SubscriptionUnsubscribeParams\LegalBasis $legalBasis legal basis for updating the contact's status (required for GDPR enabled portals)
     * @param string $legalBasisExplanation a more detailed explanation to go with the legal basis (required for GDPR enabled portals)
     *
     * @throws APIException
     */
    public function unsubscribe(
        string $emailAddress,
        string $subscriptionID,
        string|\HubspotSDK\Marketing\Subscriptions\SubscriptionUnsubscribeParams\LegalBasis|null $legalBasis = null,
        ?string $legalBasisExplanation = null,
        ?RequestOptions $requestOptions = null,
    ): PublicSubscriptionStatus;
}
