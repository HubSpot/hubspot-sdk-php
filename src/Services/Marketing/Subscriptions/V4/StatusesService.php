<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Subscriptions\V4;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Subscriptions\V4\ActionResponseWithResultsPublicStatus;
use HubspotSDK\Marketing\Subscriptions\V4\ActionResponseWithResultsPublicWideStatus;
use HubspotSDK\Marketing\Subscriptions\V4\BatchResponsePublicBulkOptOutFromAllResponse;
use HubspotSDK\Marketing\Subscriptions\V4\BatchResponsePublicStatus;
use HubspotSDK\Marketing\Subscriptions\V4\BatchResponsePublicStatusBulkResponse;
use HubspotSDK\Marketing\Subscriptions\V4\BatchResponsePublicWideStatusBulkResponse;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatusRequest\Channel;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatusRequest\LegalBasis;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatusRequest\StatusState;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Subscriptions\V4\StatusesContract;

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
     * @param 'EMAIL'|\HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUpdateParams\Channel $channel the type of communication channel, with 'EMAIL' as the only supported option
     * @param 'NOT_SPECIFIED'|'SUBSCRIBED'|'UNSUBSCRIBED'|\HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUpdateParams\StatusState $statusState the current subscription status of the contact, which can be 'SUBSCRIBED', 'UNSUBSCRIBED', or 'NOT_SPECIFIED'
     * @param int $subscriptionID the unique identifier of the subscription to be updated
     * @param 'CONSENT_WITH_NOTICE'|'LEGITIMATE_INTEREST_CLIENT'|'LEGITIMATE_INTEREST_OTHER'|'LEGITIMATE_INTEREST_PQL'|'NON_GDPR'|'PERFORMANCE_OF_CONTRACT'|'PROCESS_AND_STORE'|\HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUpdateParams\LegalBasis $legalBasis the legal basis for communication, with options including 'LEGITIMATE_INTEREST_PQL', 'LEGITIMATE_INTEREST_CLIENT', 'PERFORMANCE_OF_CONTRACT', 'CONSENT_WITH_NOTICE', 'NON_GDPR', 'PROCESS_AND_STORE', and 'LEGITIMATE_INTEREST_OTHER'
     * @param string $legalBasisExplanation an explanation for the legal basis used for communication
     *
     * @throws APIException
     */
    public function update(
        string $subscriberIDString,
        string|\HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUpdateParams\Channel $channel,
        string|\HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUpdateParams\StatusState $statusState,
        int $subscriptionID,
        string|\HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUpdateParams\LegalBasis|null $legalBasis = null,
        ?string $legalBasisExplanation = null,
        ?RequestOptions $requestOptions = null,
    ): ActionResponseWithResultsPublicStatus {
        $params = [
            'channel' => $channel,
            'statusState' => $statusState,
            'subscriptionID' => $subscriptionID,
            'legalBasis' => $legalBasis,
            'legalBasisExplanation' => $legalBasisExplanation,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($subscriberIDString, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Batch retrieve subscription statuses for a set of contacts.
     *
     * @param 'EMAIL'|\HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchGetParams\Channel $channel Query param: The channel type for the subscription type. Currently, the only supported channel type is `EMAIL`.
     * @param list<string> $inputs body param: Strings to input
     * @param int $businessUnitID Query param: If you have the [business unit add-on](https://developers.hubspot.com/beta-docs/guides/api/settings/business-units-api), include this parameter to filter results by business unit ID. The default Account business unit will always use `0`.
     *
     * @throws APIException
     */
    public function batchGet(
        string|\HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchGetParams\Channel $channel,
        array $inputs,
        ?int $businessUnitID = null,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicStatusBulkResponse {
        $params = [
            'channel' => $channel,
            'inputs' => $inputs,
            'businessUnitID' => $businessUnitID,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->batchGet(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Checks whether a set of contacts have opted out of all communications.
     *
     * @param 'EMAIL'|\HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchGetUnsubscribeAllStatusParams\Channel $channel Query param: The channel type for the subscription type. Currently, the only supported channel type is `EMAIL`.
     * @param list<string> $inputs body param: Strings to input
     * @param int $businessUnitID Query param: If you have the [business unit add-on](https://developers.hubspot.com/beta-docs/guides/api/settings/business-units-api), include this parameter to filter results by business unit ID. The default Account business unit will always use `0`.
     *
     * @throws APIException
     */
    public function batchGetUnsubscribeAllStatus(
        string|\HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchGetUnsubscribeAllStatusParams\Channel $channel,
        array $inputs,
        ?int $businessUnitID = null,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicWideStatusBulkResponse {
        $params = [
            'channel' => $channel,
            'inputs' => $inputs,
            'businessUnitID' => $businessUnitID,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->batchGetUnsubscribeAllStatus(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Unsubscribe a set of contacts from all email subscriptions.
     *
     * @param 'EMAIL'|\HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchUnsubscribeAllParams\Channel $channel Query param: The channel type for the subscription type. Currently, the only supported channel type is `EMAIL`.
     * @param list<string> $inputs body param: Strings to input
     * @param int $businessUnitID Query param: If you have the [business unit add-on](https://developers.hubspot.com/beta-docs/guides/api/settings/business-units-api), include this parameter to filter results by business unit ID. The default Account business unit will always use `0`.
     * @param bool $verbose Query param: Set to `true` to include the details of the updated subscription statuses in the response. Not including this parameter will result in an empty response.
     *
     * @throws APIException
     */
    public function batchUnsubscribeAll(
        string|\HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchUnsubscribeAllParams\Channel $channel,
        array $inputs,
        ?int $businessUnitID = null,
        bool $verbose = false,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicBulkOptOutFromAllResponse {
        $params = [
            'channel' => $channel,
            'inputs' => $inputs,
            'businessUnitID' => $businessUnitID,
            'verbose' => $verbose,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->batchUnsubscribeAll(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the subscription status for a set of contacts.
     *
     * @param list<array{
     *   channel: 'EMAIL'|Channel,
     *   statusState: 'NOT_SPECIFIED'|'SUBSCRIBED'|'UNSUBSCRIBED'|StatusState,
     *   subscriberIDString: string,
     *   subscriptionID: int,
     *   legalBasis?: 'CONSENT_WITH_NOTICE'|'LEGITIMATE_INTEREST_CLIENT'|'LEGITIMATE_INTEREST_OTHER'|'LEGITIMATE_INTEREST_PQL'|'NON_GDPR'|'PERFORMANCE_OF_CONTRACT'|'PROCESS_AND_STORE'|LegalBasis,
     *   legalBasisExplanation?: string,
     * }> $inputs
     *
     * @throws APIException
     */
    public function batchUpdate(
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicStatus {
        $params = ['inputs' => $inputs];

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
     * @param 'EMAIL'|\HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetParams\Channel $channel The channel type for the subscription type. Currently, the only supported channel type is `EMAIL`.
     * @param int $businessUnitID If you have the [business unit add-on](https://developers.hubspot.com/beta-docs/guides/api/settings/business-units-api), include this parameter to filter results by business unit ID. The default Account business unit will always use `0`.
     *
     * @throws APIException
     */
    public function get(
        string $subscriberIDString,
        string|\HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetParams\Channel $channel,
        ?int $businessUnitID = null,
        ?RequestOptions $requestOptions = null,
    ): ActionResponseWithResultsPublicStatus {
        $params = ['channel' => $channel, 'businessUnitID' => $businessUnitID];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     * @param 'EMAIL'|\HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetUnsubscribeAllStatusParams\Channel $channel The channel type for the subscription type. Currently, the only supported channel type is `EMAIL`.
     * @param int $businessUnitID If you have the [business unit add-on](https://developers.hubspot.com/beta-docs/guides/api/settings/business-units-api), include this parameter to filter results by business unit ID. The default Account business unit will always use `0`.
     * @param bool $verbose Set to `true` to include the details of the updated subscription statuses in the response. Not including this parameter will result in an empty response.
     *
     * @throws APIException
     */
    public function getUnsubscribeAllStatus(
        string $subscriberIDString,
        string|\HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetUnsubscribeAllStatusParams\Channel $channel,
        ?int $businessUnitID = null,
        bool $verbose = false,
        ?RequestOptions $requestOptions = null,
    ): ActionResponseWithResultsPublicWideStatus {
        $params = [
            'channel' => $channel,
            'businessUnitID' => $businessUnitID,
            'verbose' => $verbose,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     * @param 'EMAIL'|\HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUnsubscribeAllParams\Channel $channel The channel type for the subscription type. Currently, the only supported channel type is `EMAIL`.
     * @param int $businessUnitID If you have the [business unit add-on](https://developers.hubspot.com/beta-docs/guides/api/settings/business-units-api), include this parameter to filter results by business unit ID. The default Account business unit will always use `0`.
     * @param bool $verbose Set to `true` to include the details of the updated subscription statuses in the response. Not including this parameter will result in an empty response.
     *
     * @throws APIException
     */
    public function unsubscribeAll(
        string $subscriberIDString,
        string|\HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUnsubscribeAllParams\Channel $channel,
        ?int $businessUnitID = null,
        bool $verbose = false,
        ?RequestOptions $requestOptions = null,
    ): ActionResponseWithResultsPublicStatus {
        $params = [
            'channel' => $channel,
            'businessUnitID' => $businessUnitID,
            'verbose' => $verbose,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->unsubscribeAll($subscriberIDString, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
