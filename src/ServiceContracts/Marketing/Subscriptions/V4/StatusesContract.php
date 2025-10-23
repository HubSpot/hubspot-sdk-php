<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Exceptions\APIException;
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

use const HubspotSDK\Core\OMIT as omit;

interface StatusesContract
{
    /**
     * @api
     *
     * @param Channel|value-of<Channel> $channel the type of communication channel, with 'EMAIL' as the only supported option
     * @param StatusState|value-of<StatusState> $statusState the current subscription status of the contact, which can be 'SUBSCRIBED', 'UNSUBSCRIBED', or 'NOT_SPECIFIED'
     * @param int $subscriptionID the unique identifier of the subscription to be updated
     * @param LegalBasis|value-of<LegalBasis> $legalBasis the legal basis for communication, with options including 'LEGITIMATE_INTEREST_PQL', 'LEGITIMATE_INTEREST_CLIENT', 'PERFORMANCE_OF_CONTRACT', 'CONSENT_WITH_NOTICE', 'NON_GDPR', 'PROCESS_AND_STORE', and 'LEGITIMATE_INTEREST_OTHER'
     * @param string $legalBasisExplanation an explanation for the legal basis used for communication
     *
     * @throws APIException
     */
    public function update(
        string $subscriberIDString,
        $channel,
        $statusState,
        $subscriptionID,
        $legalBasis = omit,
        $legalBasisExplanation = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionResponseWithResultsPublicStatus;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $subscriberIDString,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionResponseWithResultsPublicStatus;

    /**
     * @api
     *
     * @param \HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchGetParams\Channel|value-of<\HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchGetParams\Channel> $channel The channel type for the subscription type. Currently, the only supported channel type is `EMAIL`.
     * @param list<string> $inputs strings to input
     * @param int $businessUnitID If you have the [business unit add-on](https://developers.hubspot.com/beta-docs/guides/api/settings/business-units-api), include this parameter to filter results by business unit ID. The default Account business unit will always use `0`.
     *
     * @throws APIException
     */
    public function batchGet(
        $channel,
        $inputs,
        $businessUnitID = omit,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicStatusBulkResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchGetRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicStatusBulkResponse;

    /**
     * @api
     *
     * @param \HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchGetUnsubscribeAllStatusParams\Channel|value-of<\HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchGetUnsubscribeAllStatusParams\Channel> $channel The channel type for the subscription type. Currently, the only supported channel type is `EMAIL`.
     * @param list<string> $inputs strings to input
     * @param int $businessUnitID If you have the [business unit add-on](https://developers.hubspot.com/beta-docs/guides/api/settings/business-units-api), include this parameter to filter results by business unit ID. The default Account business unit will always use `0`.
     *
     * @throws APIException
     */
    public function batchGetUnsubscribeAllStatus(
        $channel,
        $inputs,
        $businessUnitID = omit,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicWideStatusBulkResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchGetUnsubscribeAllStatusRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicWideStatusBulkResponse;

    /**
     * @api
     *
     * @param \HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchUnsubscribeAllParams\Channel|value-of<\HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchUnsubscribeAllParams\Channel> $channel The channel type for the subscription type. Currently, the only supported channel type is `EMAIL`.
     * @param list<string> $inputs strings to input
     * @param int $businessUnitID If you have the [business unit add-on](https://developers.hubspot.com/beta-docs/guides/api/settings/business-units-api), include this parameter to filter results by business unit ID. The default Account business unit will always use `0`.
     * @param bool $verbose Set to `true` to include the details of the updated subscription statuses in the response. Not including this parameter will result in an empty response.
     *
     * @throws APIException
     */
    public function batchUnsubscribeAll(
        $channel,
        $inputs,
        $businessUnitID = omit,
        $verbose = omit,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicBulkOptOutFromAllResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchUnsubscribeAllRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicBulkOptOutFromAllResponse;

    /**
     * @api
     *
     * @param list<PublicStatusRequest> $inputs
     *
     * @throws APIException
     */
    public function batchUpdate(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicStatus;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchUpdateRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicStatus;

    /**
     * @api
     *
     * @param \HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetParams\Channel|value-of<\HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetParams\Channel> $channel The channel type for the subscription type. Currently, the only supported channel type is `EMAIL`.
     * @param int $businessUnitID If you have the [business unit add-on](https://developers.hubspot.com/beta-docs/guides/api/settings/business-units-api), include this parameter to filter results by business unit ID. The default Account business unit will always use `0`.
     *
     * @throws APIException
     */
    public function get(
        string $subscriberIDString,
        $channel,
        $businessUnitID = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionResponseWithResultsPublicStatus;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        string $subscriberIDString,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionResponseWithResultsPublicStatus;

    /**
     * @api
     *
     * @param \HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetUnsubscribeAllStatusParams\Channel|value-of<\HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetUnsubscribeAllStatusParams\Channel> $channel The channel type for the subscription type. Currently, the only supported channel type is `EMAIL`.
     * @param int $businessUnitID If you have the [business unit add-on](https://developers.hubspot.com/beta-docs/guides/api/settings/business-units-api), include this parameter to filter results by business unit ID. The default Account business unit will always use `0`.
     * @param bool $verbose Set to `true` to include the details of the updated subscription statuses in the response. Not including this parameter will result in an empty response.
     *
     * @throws APIException
     */
    public function getUnsubscribeAllStatus(
        string $subscriberIDString,
        $channel,
        $businessUnitID = omit,
        $verbose = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionResponseWithResultsPublicWideStatus;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getUnsubscribeAllStatusRaw(
        string $subscriberIDString,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionResponseWithResultsPublicWideStatus;

    /**
     * @api
     *
     * @param \HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUnsubscribeAllParams\Channel|value-of<\HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUnsubscribeAllParams\Channel> $channel The channel type for the subscription type. Currently, the only supported channel type is `EMAIL`.
     * @param int $businessUnitID If you have the [business unit add-on](https://developers.hubspot.com/beta-docs/guides/api/settings/business-units-api), include this parameter to filter results by business unit ID. The default Account business unit will always use `0`.
     * @param bool $verbose Set to `true` to include the details of the updated subscription statuses in the response. Not including this parameter will result in an empty response.
     *
     * @throws APIException
     */
    public function unsubscribeAll(
        string $subscriberIDString,
        $channel,
        $businessUnitID = omit,
        $verbose = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionResponseWithResultsPublicStatus;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function unsubscribeAllRaw(
        string $subscriberIDString,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionResponseWithResultsPublicStatus;
}
