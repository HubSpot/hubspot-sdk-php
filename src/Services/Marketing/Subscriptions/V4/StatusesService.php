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
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatusRequest;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchGetParams;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchGetUnsubscribeAllStatusParams;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchUnsubscribeAllParams;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchUpdateParams;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetParams;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetUnsubscribeAllStatusParams;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUnsubscribeAllParams;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUpdateParams;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUpdateParams\Channel;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUpdateParams\LegalBasis;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUpdateParams\StatusState;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Subscriptions\V4\StatusesContract;

use const HubspotSDK\Core\OMIT as omit;

final class StatusesService implements StatusesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Set the subscription status of a specific contact.
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
    ): ActionResponseWithResultsPublicStatus {
        $params = [
            'channel' => $channel,
            'statusState' => $statusState,
            'subscriptionID' => $subscriptionID,
            'legalBasis' => $legalBasis,
            'legalBasisExplanation' => $legalBasisExplanation,
        ];

        return $this->updateRaw($subscriberIDString, $params, $requestOptions);
    }

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
    ): ActionResponseWithResultsPublicStatus {
        [$parsed, $options] = StatusUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['communication-preferences/v4/statuses/%1$s', $subscriberIDString],
            body: (object) $parsed,
            options: $options,
            convert: ActionResponseWithResultsPublicStatus::class,
        );
    }

    /**
     * @api
     *
     * Batch retrieve subscription statuses for a set of contacts.
     *
     * @param StatusBatchGetParams\Channel|value-of<StatusBatchGetParams\Channel> $channel The channel type for the subscription type. Currently, the only supported channel type is `EMAIL`.
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
    ): BatchResponsePublicStatusBulkResponse {
        $params = [
            'channel' => $channel,
            'inputs' => $inputs,
            'businessUnitID' => $businessUnitID,
        ];

        return $this->batchGetRaw($params, $requestOptions);
    }

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
    ): BatchResponsePublicStatusBulkResponse {
        [$parsed, $options] = StatusBatchGetParams::parseRequest(
            $params,
            $requestOptions
        );
        $query_params = array_flip(['channel', 'businessUnitId']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'communication-preferences/v4/statuses/batch/read',
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponsePublicStatusBulkResponse::class,
        );
    }

    /**
     * @api
     *
     * Checks whether a set of contacts have opted out of all communications.
     *
     * @param StatusBatchGetUnsubscribeAllStatusParams\Channel|value-of<StatusBatchGetUnsubscribeAllStatusParams\Channel> $channel The channel type for the subscription type. Currently, the only supported channel type is `EMAIL`.
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
    ): BatchResponsePublicWideStatusBulkResponse {
        $params = [
            'channel' => $channel,
            'inputs' => $inputs,
            'businessUnitID' => $businessUnitID,
        ];

        return $this->batchGetUnsubscribeAllStatusRaw($params, $requestOptions);
    }

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
    ): BatchResponsePublicWideStatusBulkResponse {
        [
            $parsed, $options,
        ] = StatusBatchGetUnsubscribeAllStatusParams::parseRequest(
            $params,
            $requestOptions
        );
        $query_params = array_flip(['channel', 'businessUnitId']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'communication-preferences/v4/statuses/batch/unsubscribe-all/read',
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponsePublicWideStatusBulkResponse::class,
        );
    }

    /**
     * @api
     *
     * Unsubscribe a set of contacts from all email subscriptions.
     *
     * @param StatusBatchUnsubscribeAllParams\Channel|value-of<StatusBatchUnsubscribeAllParams\Channel> $channel The channel type for the subscription type. Currently, the only supported channel type is `EMAIL`.
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
    ): BatchResponsePublicBulkOptOutFromAllResponse {
        $params = [
            'channel' => $channel,
            'inputs' => $inputs,
            'businessUnitID' => $businessUnitID,
            'verbose' => $verbose,
        ];

        return $this->batchUnsubscribeAllRaw($params, $requestOptions);
    }

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
    ): BatchResponsePublicBulkOptOutFromAllResponse {
        [$parsed, $options] = StatusBatchUnsubscribeAllParams::parseRequest(
            $params,
            $requestOptions
        );
        $query_params = array_flip(['channel', 'businessUnitId', 'verbose']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'communication-preferences/v4/statuses/batch/unsubscribe-all',
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponsePublicBulkOptOutFromAllResponse::class,
        );
    }

    /**
     * @api
     *
     * Update the subscription status for a set of contacts.
     *
     * @param list<PublicStatusRequest> $inputs
     *
     * @throws APIException
     */
    public function batchUpdate(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicStatus {
        $params = ['inputs' => $inputs];

        return $this->batchUpdateRaw($params, $requestOptions);
    }

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
    ): BatchResponsePublicStatus {
        [$parsed, $options] = StatusBatchUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'communication-preferences/v4/statuses/batch/write',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponsePublicStatus::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a contact's current email subscription preferences.
     *
     * @param StatusGetParams\Channel|value-of<StatusGetParams\Channel> $channel The channel type for the subscription type. Currently, the only supported channel type is `EMAIL`.
     * @param int $businessUnitID If you have the [business unit add-on](https://developers.hubspot.com/beta-docs/guides/api/settings/business-units-api), include this parameter to filter results by business unit ID. The default Account business unit will always use `0`.
     *
     * @throws APIException
     */
    public function get(
        string $subscriberIDString,
        $channel,
        $businessUnitID = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionResponseWithResultsPublicStatus {
        $params = ['channel' => $channel, 'businessUnitID' => $businessUnitID];

        return $this->getRaw($subscriberIDString, $params, $requestOptions);
    }

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
    ): ActionResponseWithResultsPublicStatus {
        [$parsed, $options] = StatusGetParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['communication-preferences/v4/statuses/%1$s', $subscriberIDString],
            query: $parsed,
            options: $options,
            convert: ActionResponseWithResultsPublicStatus::class,
        );
    }

    /**
     * @api
     *
     * Check whether a contact has unsubscribed from all email subscriptions. If a contact has not opted out of all communications, the response `results` array will be empty.
     *
     * @param StatusGetUnsubscribeAllStatusParams\Channel|value-of<StatusGetUnsubscribeAllStatusParams\Channel> $channel The channel type for the subscription type. Currently, the only supported channel type is `EMAIL`.
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
    ): ActionResponseWithResultsPublicWideStatus {
        $params = [
            'channel' => $channel,
            'businessUnitID' => $businessUnitID,
            'verbose' => $verbose,
        ];

        return $this->getUnsubscribeAllStatusRaw(
            $subscriberIDString,
            $params,
            $requestOptions
        );
    }

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
    ): ActionResponseWithResultsPublicWideStatus {
        [$parsed, $options] = StatusGetUnsubscribeAllStatusParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'communication-preferences/v4/statuses/%1$s/unsubscribe-all',
                $subscriberIDString,
            ],
            query: $parsed,
            options: $options,
            convert: ActionResponseWithResultsPublicWideStatus::class,
        );
    }

    /**
     * @api
     *
     * Unsubscribe a contact from all email subscriptions.
     *
     * @param StatusUnsubscribeAllParams\Channel|value-of<StatusUnsubscribeAllParams\Channel> $channel The channel type for the subscription type. Currently, the only supported channel type is `EMAIL`.
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
    ): ActionResponseWithResultsPublicStatus {
        $params = [
            'channel' => $channel,
            'businessUnitID' => $businessUnitID,
            'verbose' => $verbose,
        ];

        return $this->unsubscribeAllRaw(
            $subscriberIDString,
            $params,
            $requestOptions
        );
    }

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
    ): ActionResponseWithResultsPublicStatus {
        [$parsed, $options] = StatusUnsubscribeAllParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'communication-preferences/v4/statuses/%1$s/unsubscribe-all',
                $subscriberIDString,
            ],
            query: $parsed,
            options: $options,
            convert: ActionResponseWithResultsPublicStatus::class,
        );
    }
}
