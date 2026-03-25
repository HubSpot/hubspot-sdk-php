<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\CommunicationPreferences\ActionResponseWithResultsPublicStatus;
use HubspotSDK\CommunicationPreferences\ActionResponseWithResultsPublicWideStatus;
use HubspotSDK\CommunicationPreferences\CommunicationPreferenceGenerateLinksParams\Channel;
use HubspotSDK\CommunicationPreferences\CommunicationPreferenceSubscribeParams\LegalBasis;
use HubspotSDK\CommunicationPreferences\CommunicationPreferenceUpdateStatusParams\StatusState;
use HubspotSDK\CommunicationPreferences\LinkGenerationResponse;
use HubspotSDK\CommunicationPreferences\PublicSubscriptionStatus;
use HubspotSDK\CommunicationPreferences\PublicSubscriptionStatusesResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CommunicationPreferencesContract;
use HubspotSDK\Services\CommunicationPreferences\DefinitionsService;
use HubspotSDK\Services\CommunicationPreferences\StatusesService;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class CommunicationPreferencesService implements CommunicationPreferencesContract
{
    /**
     * @api
     */
    public CommunicationPreferencesRawService $raw;

    /**
     * @api
     */
    public DefinitionsService $definitions;

    /**
     * @api
     */
    public StatusesService $statuses;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CommunicationPreferencesRawService($client);
        $this->definitions = new DefinitionsService($client);
        $this->statuses = new StatusesService($client);
    }

    /**
     * @api
     *
     * Generate communication preference links for a subscriber. This endpoint allows you to create URLs for managing preferences and unsubscribing, tailored to a specific subscriber. It is useful for integrating communication preference management into your applications.
     *
     * @param Channel|value-of<Channel> $channel Query param: The communication channel for which the links are generated. Must be 'EMAIL'.
     * @param string $subscriberIDString Body param: A string representing the unique identifier of the subscriber. This property is required.
     * @param int $businessUnitID Query param: The ID of the business unit associated with the request. Defaults to 0.
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
    ): LinkGenerationResponse {
        $params = Util::removeNulls(
            [
                'channel' => $channel,
                'subscriberIDString' => $subscriberIDString,
                'businessUnitID' => $businessUnitID,
                'language' => $language,
                'subscriptionID' => $subscriptionID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->generateLinks(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the subscription statuses for a specific email address. This endpoint allows you to check the current subscription status for email communications, which can be useful for managing communication preferences and ensuring compliance with user preferences.
     *
     * @param string $emailAddress the email address of the recipient whose subscription status is being retrieved
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getStatusByEmail(
        string $emailAddress,
        RequestOptions|array|null $requestOptions = null
    ): PublicSubscriptionStatusesResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getStatusByEmail($emailAddress, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a contact's current email subscription preferences.
     *
     * @param string $subscriberIDString the unique identifier of the subscriber whose communication preferences status is being retrieved
     * @param \HubspotSDK\CommunicationPreferences\CommunicationPreferenceGetStatusesParams\Channel|value-of<\HubspotSDK\CommunicationPreferences\CommunicationPreferenceGetStatusesParams\Channel> $channel A required string indicating the communication channel to retrieve the status for. Valid value is 'EMAIL'.
     * @param int $businessUnitID an optional integer representing the business unit ID to filter the subscription status
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getStatuses(
        string $subscriberIDString,
        \HubspotSDK\CommunicationPreferences\CommunicationPreferenceGetStatusesParams\Channel|string $channel,
        ?int $businessUnitID = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionResponseWithResultsPublicStatus {
        $params = Util::removeNulls(
            ['channel' => $channel, 'businessUnitID' => $businessUnitID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getStatuses($subscriberIDString, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Check whether a contact has unsubscribed from all email subscriptions. If a contact has not opted out of all communications, the response `results` array will be empty.
     *
     * @param string $subscriberIDString the unique identifier of the subscriber whose unsubscribe status is being retrieved
     * @param \HubspotSDK\CommunicationPreferences\CommunicationPreferenceGetUnsubscribeAllStatusParams\Channel|value-of<\HubspotSDK\CommunicationPreferences\CommunicationPreferenceGetUnsubscribeAllStatusParams\Channel> $channel The communication channel to unsubscribe from. Must be 'EMAIL'.
     * @param int $businessUnitID the ID of the business unit associated with the communication preferences
     * @param bool $verbose A boolean indicating whether to include detailed information in the response. Defaults to false.
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
    ): ActionResponseWithResultsPublicWideStatus {
        $params = Util::removeNulls(
            [
                'channel' => $channel,
                'businessUnitID' => $businessUnitID,
                'verbose' => $verbose,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getUnsubscribeAllStatus($subscriberIDString, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Subscribe a user to a specific communication preference using their email address and subscription ID. This endpoint allows you to manage subscription statuses by updating them to 'subscribed' for a given email address. It is useful for ensuring that users receive communications they have opted into.
     *
     * @param string $emailAddress The email address of the user whose subscription status is being updated. It is a required field and must be a string.
     * @param string $subscriptionID The unique identifier of the subscription for which the status is being updated. It is a required field and must be a string.
     * @param LegalBasis|value-of<LegalBasis> $legalBasis The legal basis for processing the subscription status change. It is an optional field and must be a string with valid values including 'LEGITIMATE_INTEREST_PQL', 'LEGITIMATE_INTEREST_CLIENT', 'PERFORMANCE_OF_CONTRACT', 'CONSENT_WITH_NOTICE', 'NON_GDPR', 'PROCESS_AND_STORE', and 'LEGITIMATE_INTEREST_OTHER'.
     * @param string $legalBasisExplanation An optional field providing an explanation for the legal basis used. It must be a string.
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
    ): PublicSubscriptionStatus {
        $params = Util::removeNulls(
            [
                'emailAddress' => $emailAddress,
                'subscriptionID' => $subscriptionID,
                'legalBasis' => $legalBasis,
                'legalBasisExplanation' => $legalBasisExplanation,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->subscribe(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Unsubscribe a user from communication preferences. This endpoint allows you to update the subscription status of a user to 'unsubscribed' for specified communication channels. It is useful for managing user preferences and ensuring compliance with user opt-out requests.
     *
     * @param string $emailAddress The email address of the user whose subscription status is being updated. It is a required field and must be a string.
     * @param string $subscriptionID The unique identifier of the subscription for which the status is being updated. It is a required field and must be a string.
     * @param \HubspotSDK\CommunicationPreferences\CommunicationPreferenceUnsubscribeParams\LegalBasis|value-of<\HubspotSDK\CommunicationPreferences\CommunicationPreferenceUnsubscribeParams\LegalBasis> $legalBasis The legal basis for processing the subscription status change. It is an optional field and must be a string with valid values including 'LEGITIMATE_INTEREST_PQL', 'LEGITIMATE_INTEREST_CLIENT', 'PERFORMANCE_OF_CONTRACT', 'CONSENT_WITH_NOTICE', 'NON_GDPR', 'PROCESS_AND_STORE', and 'LEGITIMATE_INTEREST_OTHER'.
     * @param string $legalBasisExplanation An optional field providing an explanation for the legal basis used. It must be a string.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function unsubscribe(
        string $emailAddress,
        string $subscriptionID,
        \HubspotSDK\CommunicationPreferences\CommunicationPreferenceUnsubscribeParams\LegalBasis|string|null $legalBasis = null,
        ?string $legalBasisExplanation = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicSubscriptionStatus {
        $params = Util::removeNulls(
            [
                'emailAddress' => $emailAddress,
                'subscriptionID' => $subscriptionID,
                'legalBasis' => $legalBasis,
                'legalBasisExplanation' => $legalBasisExplanation,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->unsubscribe(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Unsubscribe a subscriber from all communication channels. This endpoint allows you to remove a subscriber from all communication preferences, effectively opting them out from receiving any further communications. This can be useful for ensuring compliance with user requests or legal requirements.
     *
     * @param string $subscriberIDString the unique identifier of the subscriber to be unsubscribed from all communications
     * @param \HubspotSDK\CommunicationPreferences\CommunicationPreferenceUnsubscribeAllParams\Channel|value-of<\HubspotSDK\CommunicationPreferences\CommunicationPreferenceUnsubscribeAllParams\Channel> $channel The communication channel from which to unsubscribe the subscriber. Must be 'EMAIL'.
     * @param int $businessUnitID The ID of the business unit associated with the subscriber. This is an optional parameter.
     * @param bool $verbose A boolean flag indicating whether to include detailed information in the response. Defaults to false.
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
    ): ActionResponseWithResultsPublicStatus {
        $params = Util::removeNulls(
            [
                'channel' => $channel,
                'businessUnitID' => $businessUnitID,
                'verbose' => $verbose,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->unsubscribeAll($subscriberIDString, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Set the subscription status of a specific contact.
     *
     * @param string $subscriberIDString the unique identifier of the subscriber whose subscription status is to be updated
     * @param \HubspotSDK\CommunicationPreferences\CommunicationPreferenceUpdateStatusParams\Channel|value-of<\HubspotSDK\CommunicationPreferences\CommunicationPreferenceUpdateStatusParams\Channel> $channel the type of communication channel, with 'EMAIL' as the only supported option
     * @param StatusState|value-of<StatusState> $statusState the current subscription status of the contact, which can be 'SUBSCRIBED', 'UNSUBSCRIBED', or 'NOT_SPECIFIED'
     * @param int $subscriptionID the unique identifier of the subscription to be updated
     * @param \HubspotSDK\CommunicationPreferences\CommunicationPreferenceUpdateStatusParams\LegalBasis|value-of<\HubspotSDK\CommunicationPreferences\CommunicationPreferenceUpdateStatusParams\LegalBasis> $legalBasis the legal basis for communication, with options including 'LEGITIMATE_INTEREST_PQL', 'LEGITIMATE_INTEREST_CLIENT', 'PERFORMANCE_OF_CONTRACT', 'CONSENT_WITH_NOTICE', 'NON_GDPR', 'PROCESS_AND_STORE', and 'LEGITIMATE_INTEREST_OTHER'
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
        \HubspotSDK\CommunicationPreferences\CommunicationPreferenceUpdateStatusParams\LegalBasis|string|null $legalBasis = null,
        ?string $legalBasisExplanation = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionResponseWithResultsPublicStatus {
        $params = Util::removeNulls(
            [
                'channel' => $channel,
                'statusState' => $statusState,
                'subscriptionID' => $subscriptionID,
                'legalBasis' => $legalBasis,
                'legalBasisExplanation' => $legalBasisExplanation,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateStatus($subscriberIDString, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
