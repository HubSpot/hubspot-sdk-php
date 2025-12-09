<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Subscriptions\PublicSubscriptionStatus;
use HubspotSDK\Marketing\Subscriptions\PublicSubscriptionStatusesResponse;
use HubspotSDK\Marketing\Subscriptions\SubscriptionDefinitionsResponse;
use HubspotSDK\Marketing\Subscriptions\SubscriptionSubscribeParams\LegalBasis;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\SubscriptionsContract;
use HubspotSDK\Services\Marketing\Subscriptions\V4Service;

final class SubscriptionsService implements SubscriptionsContract
{
    /**
     * @api
     */
    public SubscriptionsRawService $raw;

    /**
     * @api
     */
    public V4Service $v4;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SubscriptionsRawService($client);
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
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
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
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getEmailStatus($emailAddress, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Subscribes a contact to the given subscription type. This API is not valid to use for subscribing a contact at a brand or portal level and will return an error.
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
    ): PublicSubscriptionStatus {
        $params = [
            'emailAddress' => $emailAddress,
            'subscriptionID' => $subscriptionID,
            'legalBasis' => $legalBasis,
            'legalBasisExplanation' => $legalBasisExplanation,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->subscribe(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Unsubscribes a contact from the given subscription type. This API is not valid to use for unsubscribing a contact at a brand or portal level and will return an error.
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
    ): PublicSubscriptionStatus {
        $params = [
            'emailAddress' => $emailAddress,
            'subscriptionID' => $subscriptionID,
            'legalBasis' => $legalBasis,
            'legalBasisExplanation' => $legalBasisExplanation,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->unsubscribe(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
