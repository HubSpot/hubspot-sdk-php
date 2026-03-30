<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts;

use HubspotSDK\CommunicationPreferences\ActionResponseWithResultsPublicStatus;
use HubspotSDK\CommunicationPreferences\ActionResponseWithResultsPublicWideStatus;
use HubspotSDK\CommunicationPreferences\CommunicationPreferenceGenerateLinksParams\Channel;
use HubspotSDK\CommunicationPreferences\CommunicationPreferenceUpdateStatusParams\LegalBasis;
use HubspotSDK\CommunicationPreferences\CommunicationPreferenceUpdateStatusParams\StatusState;
use HubspotSDK\CommunicationPreferences\LinkGenerationResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface CommunicationPreferencesContract
{
    /**
     * @api
     *
     * @param Channel|value-of<Channel> $channel Query param
     * @param string $subscriberIDString Body param: A string representing the unique identifier of the subscriber. This property is required.
     * @param int $businessUnitID Query param
     * @param string $language body param: The language in which the generated link should be presented, represented as a string
     * @param int $subscriptionID body param: The unique identifier for the subscription, represented as an integer in int64 format
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function generateLinks(
        Channel|string $channel,
        string $subscriberIDString,
        int $businessUnitID = 0,
        ?string $language = null,
        ?int $subscriptionID = null,
        RequestOptions|array|null $requestOptions = null,
    ): LinkGenerationResponse;

    /**
     * @api
     *
     * @param \HubspotSDK\CommunicationPreferences\CommunicationPreferenceGetStatusesParams\Channel|value-of<\HubspotSDK\CommunicationPreferences\CommunicationPreferenceGetStatusesParams\Channel> $channel
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getStatuses(
        string $subscriberIDString,
        \HubspotSDK\CommunicationPreferences\CommunicationPreferenceGetStatusesParams\Channel|string $channel,
        ?int $businessUnitID = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionResponseWithResultsPublicStatus;

    /**
     * @api
     *
     * @param \HubspotSDK\CommunicationPreferences\CommunicationPreferenceGetUnsubscribeAllStatusParams\Channel|value-of<\HubspotSDK\CommunicationPreferences\CommunicationPreferenceGetUnsubscribeAllStatusParams\Channel> $channel
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getUnsubscribeAllStatus(
        string $subscriberIDString,
        \HubspotSDK\CommunicationPreferences\CommunicationPreferenceGetUnsubscribeAllStatusParams\Channel|string $channel,
        ?int $businessUnitID = null,
        bool $verbose = false,
        RequestOptions|array|null $requestOptions = null,
    ): ActionResponseWithResultsPublicWideStatus;

    /**
     * @api
     *
     * @param \HubspotSDK\CommunicationPreferences\CommunicationPreferenceUnsubscribeAllParams\Channel|value-of<\HubspotSDK\CommunicationPreferences\CommunicationPreferenceUnsubscribeAllParams\Channel> $channel
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function unsubscribeAll(
        string $subscriberIDString,
        \HubspotSDK\CommunicationPreferences\CommunicationPreferenceUnsubscribeAllParams\Channel|string $channel,
        ?int $businessUnitID = null,
        bool $verbose = false,
        RequestOptions|array|null $requestOptions = null,
    ): ActionResponseWithResultsPublicStatus;

    /**
     * @api
     *
     * @param \HubspotSDK\CommunicationPreferences\CommunicationPreferenceUpdateStatusParams\Channel|value-of<\HubspotSDK\CommunicationPreferences\CommunicationPreferenceUpdateStatusParams\Channel> $channel the type of communication channel, with 'EMAIL' as the only supported option
     * @param StatusState|value-of<StatusState> $statusState the current subscription status of the contact, which can be 'SUBSCRIBED', 'UNSUBSCRIBED', or 'NOT_SPECIFIED'
     * @param int $subscriptionID the unique identifier of the subscription to be updated
     * @param LegalBasis|value-of<LegalBasis> $legalBasis the legal basis for communication, with options including 'LEGITIMATE_INTEREST_PQL', 'LEGITIMATE_INTEREST_CLIENT', 'PERFORMANCE_OF_CONTRACT', 'CONSENT_WITH_NOTICE', 'NON_GDPR', 'PROCESS_AND_STORE', and 'LEGITIMATE_INTEREST_OTHER'
     * @param string $legalBasisExplanation an explanation for the legal basis used for communication
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateStatus(
        string $subscriberIDString,
        \HubspotSDK\CommunicationPreferences\CommunicationPreferenceUpdateStatusParams\Channel|string $channel,
        StatusState|string $statusState,
        int $subscriptionID,
        LegalBasis|string|null $legalBasis = null,
        ?string $legalBasisExplanation = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionResponseWithResultsPublicStatus;
}
