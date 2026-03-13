<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Subscriptions\V4;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\Subscriptions\V4\ActionResponseWithResultsPublicStatus;
use HubspotSDK\Marketing\Subscriptions\V4\ActionResponseWithResultsPublicWideStatus;
use HubspotSDK\Marketing\Subscriptions\V4\BatchResponsePublicBulkOptOutFromAllResponse;
use HubspotSDK\Marketing\Subscriptions\V4\BatchResponsePublicStatus;
use HubspotSDK\Marketing\Subscriptions\V4\BatchResponsePublicStatusBulkResponse;
use HubspotSDK\Marketing\Subscriptions\V4\BatchResponsePublicWideStatusBulkResponse;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatusRequest;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUpdateParams\Channel;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUpdateParams\LegalBasis;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUpdateParams\StatusState;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Subscriptions\V4\StatusesContract;

/**
 * @phpstan-import-type PublicStatusRequestShape from \HubspotSDK\Marketing\Subscriptions\V4\PublicStatusRequest
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class StatusesService implements StatusesContract
{
    /**
     * @api
     */
    public StatusesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new StatusesRawService($client);
    }

    /**
     * @api
     *
     * Set the subscription status of a specific contact.
     *
     * @param string $subscriberIDString the contact's email address
     * @param Channel|value-of<Channel> $channel the type of communication channel, with 'EMAIL' as the only supported option
     * @param StatusState|value-of<StatusState> $statusState the current subscription status of the contact, which can be 'SUBSCRIBED', 'UNSUBSCRIBED', or 'NOT_SPECIFIED'
     * @param int $subscriptionID the unique identifier of the subscription to be updated
     * @param LegalBasis|value-of<LegalBasis> $legalBasis the legal basis for communication, with options including 'LEGITIMATE_INTEREST_PQL', 'LEGITIMATE_INTEREST_CLIENT', 'PERFORMANCE_OF_CONTRACT', 'CONSENT_WITH_NOTICE', 'NON_GDPR', 'PROCESS_AND_STORE', and 'LEGITIMATE_INTEREST_OTHER'
     * @param string $legalBasisExplanation an explanation for the legal basis used for communication
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $subscriberIDString,
        Channel|string $channel,
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
        $response = $this->raw->update($subscriberIDString, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Batch retrieve subscription statuses for a set of contacts.
     *
     * @param \HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchGetParams\Channel|value-of<\HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchGetParams\Channel> $channel Query param: The channel type for the subscription type. Currently, the only supported channel type is `EMAIL`.
     * @param list<string> $inputs body param: Strings to input
     * @param int $businessUnitID Query param: If you have the [business unit add-on](https://developers.hubspot.com/beta-docs/guides/api/settings/business-units-api), include this parameter to filter results by business unit ID. The default Account business unit will always use `0`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function batchGet(
        \HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchGetParams\Channel|string $channel,
        array $inputs,
        ?int $businessUnitID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponsePublicStatusBulkResponse {
        $params = Util::removeNulls(
            [
                'channel' => $channel,
                'inputs' => $inputs,
                'businessUnitID' => $businessUnitID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->batchGet(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Checks whether a set of contacts have opted out of all communications.
     *
     * @param \HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchGetUnsubscribeAllStatusParams\Channel|value-of<\HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchGetUnsubscribeAllStatusParams\Channel> $channel Query param: The channel type for the subscription type. Currently, the only supported channel type is `EMAIL`.
     * @param list<string> $inputs body param: Strings to input
     * @param int $businessUnitID Query param: If you have the [business unit add-on](https://developers.hubspot.com/beta-docs/guides/api/settings/business-units-api), include this parameter to filter results by business unit ID. The default Account business unit will always use `0`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function batchGetUnsubscribeAllStatus(
        \HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchGetUnsubscribeAllStatusParams\Channel|string $channel,
        array $inputs,
        ?int $businessUnitID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponsePublicWideStatusBulkResponse {
        $params = Util::removeNulls(
            [
                'channel' => $channel,
                'inputs' => $inputs,
                'businessUnitID' => $businessUnitID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->batchGetUnsubscribeAllStatus(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Unsubscribe a set of contacts from all email subscriptions.
     *
     * @param \HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchUnsubscribeAllParams\Channel|value-of<\HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchUnsubscribeAllParams\Channel> $channel Query param: The channel type for the subscription type. Currently, the only supported channel type is `EMAIL`.
     * @param list<string> $inputs body param: Strings to input
     * @param int $businessUnitID Query param: If you have the [business unit add-on](https://developers.hubspot.com/beta-docs/guides/api/settings/business-units-api), include this parameter to filter results by business unit ID. The default Account business unit will always use `0`.
     * @param bool $verbose Query param: Set to `true` to include the details of the updated subscription statuses in the response. Not including this parameter will result in an empty response.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function batchUnsubscribeAll(
        \HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchUnsubscribeAllParams\Channel|string $channel,
        array $inputs,
        ?int $businessUnitID = null,
        bool $verbose = false,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponsePublicBulkOptOutFromAllResponse {
        $params = Util::removeNulls(
            [
                'channel' => $channel,
                'inputs' => $inputs,
                'businessUnitID' => $businessUnitID,
                'verbose' => $verbose,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->batchUnsubscribeAll(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the subscription status for a set of contacts.
     *
     * @param list<PublicStatusRequest|PublicStatusRequestShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function batchUpdate(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponsePublicStatus {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->batchUpdate(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a contact's current email subscription preferences.
     *
     * @param string $subscriberIDString the contact's email address
     * @param \HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetParams\Channel|value-of<\HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetParams\Channel> $channel The channel type for the subscription type. Currently, the only supported channel type is `EMAIL`.
     * @param int $businessUnitID If you have the [business unit add-on](https://developers.hubspot.com/beta-docs/guides/api/settings/business-units-api), include this parameter to filter results by business unit ID. The default Account business unit will always use `0`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $subscriberIDString,
        \HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetParams\Channel|string $channel,
        ?int $businessUnitID = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionResponseWithResultsPublicStatus {
        $params = Util::removeNulls(
            ['channel' => $channel, 'businessUnitID' => $businessUnitID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($subscriberIDString, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Check whether a contact has unsubscribed from all email subscriptions. If a contact has not opted out of all communications, the response `results` array will be empty.
     *
     * @param string $subscriberIDString the contact's email address
     * @param \HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetUnsubscribeAllStatusParams\Channel|value-of<\HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetUnsubscribeAllStatusParams\Channel> $channel The channel type for the subscription type. Currently, the only supported channel type is `EMAIL`.
     * @param int $businessUnitID If you have the [business unit add-on](https://developers.hubspot.com/beta-docs/guides/api/settings/business-units-api), include this parameter to filter results by business unit ID. The default Account business unit will always use `0`.
     * @param bool $verbose Set to `true` to include the details of the updated subscription statuses in the response. Not including this parameter will result in an empty response.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getUnsubscribeAllStatus(
        string $subscriberIDString,
        \HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetUnsubscribeAllStatusParams\Channel|string $channel,
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
     * @param string $subscriberIDString the contact's email address
     * @param \HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUnsubscribeAllParams\Channel|value-of<\HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUnsubscribeAllParams\Channel> $channel The channel type for the subscription type. Currently, the only supported channel type is `EMAIL`.
     * @param int $businessUnitID If you have the [business unit add-on](https://developers.hubspot.com/beta-docs/guides/api/settings/business-units-api), include this parameter to filter results by business unit ID. The default Account business unit will always use `0`.
     * @param bool $verbose Set to `true` to include the details of the updated subscription statuses in the response. Not including this parameter will result in an empty response.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function unsubscribeAll(
        string $subscriberIDString,
        \HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUnsubscribeAllParams\Channel|string $channel,
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
}
