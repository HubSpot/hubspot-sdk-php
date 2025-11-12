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
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchGetParams;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchGetUnsubscribeAllStatusParams;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchUnsubscribeAllParams;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchUpdateParams;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetParams;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetUnsubscribeAllStatusParams;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUnsubscribeAllParams;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUpdateParams;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUpdateParams\LegalBasis;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Subscriptions\V4\StatusesContract;

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
     * @param array{
     *   channel: "EMAIL",
     *   statusState: "SUBSCRIBED"|"UNSUBSCRIBED"|"NOT_SPECIFIED",
     *   subscriptionId: int,
     *   legalBasis?: value-of<LegalBasis>,
     *   legalBasisExplanation?: string,
     * }|StatusUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $subscriberIDString,
        array|StatusUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionResponseWithResultsPublicStatus {
        [$parsed, $options] = StatusUpdateParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   channel: "EMAIL", inputs: list<string>, businessUnitId?: int
     * }|StatusBatchGetParams $params
     *
     * @throws APIException
     */
    public function batchGet(
        array|StatusBatchGetParams $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicStatusBulkResponse {
        [$parsed, $options] = StatusBatchGetParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   channel: "EMAIL", inputs: list<string>, businessUnitId?: int
     * }|StatusBatchGetUnsubscribeAllStatusParams $params
     *
     * @throws APIException
     */
    public function batchGetUnsubscribeAllStatus(
        array|StatusBatchGetUnsubscribeAllStatusParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicWideStatusBulkResponse {
        [$parsed, $options] = StatusBatchGetUnsubscribeAllStatusParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   channel: "EMAIL", inputs: list<string>, businessUnitId?: int, verbose?: bool
     * }|StatusBatchUnsubscribeAllParams $params
     *
     * @throws APIException
     */
    public function batchUnsubscribeAll(
        array|StatusBatchUnsubscribeAllParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicBulkOptOutFromAllResponse {
        [$parsed, $options] = StatusBatchUnsubscribeAllParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   inputs: list<array{
     *     channel: "EMAIL",
     *     statusState: "SUBSCRIBED"|"UNSUBSCRIBED"|"NOT_SPECIFIED",
     *     subscriberIdString: string,
     *     subscriptionId: int,
     *     legalBasis?: "LEGITIMATE_INTEREST_PQL"|"LEGITIMATE_INTEREST_CLIENT"|"PERFORMANCE_OF_CONTRACT"|"CONSENT_WITH_NOTICE"|"NON_GDPR"|"PROCESS_AND_STORE"|"LEGITIMATE_INTEREST_OTHER",
     *     legalBasisExplanation?: string,
     *   }>,
     * }|StatusBatchUpdateParams $params
     *
     * @throws APIException
     */
    public function batchUpdate(
        array|StatusBatchUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicStatus {
        [$parsed, $options] = StatusBatchUpdateParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{channel: "EMAIL", businessUnitId?: int}|StatusGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $subscriberIDString,
        array|StatusGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionResponseWithResultsPublicStatus {
        [$parsed, $options] = StatusGetParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   channel: "EMAIL", businessUnitId?: int, verbose?: bool
     * }|StatusGetUnsubscribeAllStatusParams $params
     *
     * @throws APIException
     */
    public function getUnsubscribeAllStatus(
        string $subscriberIDString,
        array|StatusGetUnsubscribeAllStatusParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionResponseWithResultsPublicWideStatus {
        [$parsed, $options] = StatusGetUnsubscribeAllStatusParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   channel: "EMAIL", businessUnitId?: int, verbose?: bool
     * }|StatusUnsubscribeAllParams $params
     *
     * @throws APIException
     */
    public function unsubscribeAll(
        string $subscriberIDString,
        array|StatusUnsubscribeAllParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionResponseWithResultsPublicStatus {
        [$parsed, $options] = StatusUnsubscribeAllParams::parseRequest(
            $params,
            $requestOptions,
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
