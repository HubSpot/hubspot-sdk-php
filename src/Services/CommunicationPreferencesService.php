<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\CommunicationPreferences\ActionResponseWithResultsPublicStatus;
use HubspotSDK\CommunicationPreferences\ActionResponseWithResultsPublicWideStatus;
use HubspotSDK\CommunicationPreferences\CommunicationPreferenceGenerateLinksParams\Channel;
use HubspotSDK\CommunicationPreferences\CommunicationPreferenceUpdateStatusParams\LegalBasis;
use HubspotSDK\CommunicationPreferences\CommunicationPreferenceUpdateStatusParams\StatusState;
use HubspotSDK\CommunicationPreferences\LinkGenerationResponse;
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
     * Retrieve a contact's current email subscription preferences.
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
     * Unsubscribe a contact from all email subscriptions.
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
