<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Subscriptions\V4;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
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
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUpdateParams\Channel;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUpdateParams\LegalBasis;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUpdateParams\StatusState;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Subscriptions\V4\StatusesRawContract;

final class StatusesRawService implements StatusesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Set the subscription status of a specific contact.
     *
     * @param string $subscriberIDString the contact's email address
     * @param array{
     *   channel: 'EMAIL'|Channel,
     *   statusState: 'NOT_SPECIFIED'|'SUBSCRIBED'|'UNSUBSCRIBED'|StatusState,
     *   subscriptionID: int,
     *   legalBasis?: value-of<LegalBasis>,
     *   legalBasisExplanation?: string,
     * }|StatusUpdateParams $params
     *
     * @return BaseResponse<ActionResponseWithResultsPublicStatus>
     *
     * @throws APIException
     */
    public function update(
        string $subscriberIDString,
        array|StatusUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = StatusUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     *   channel: 'EMAIL'|StatusBatchGetParams\Channel,
     *   inputs: list<string>,
     *   businessUnitID?: int,
     * }|StatusBatchGetParams $params
     *
     * @return BaseResponse<BatchResponsePublicStatusBulkResponse>
     *
     * @throws APIException
     */
    public function batchGet(
        array|StatusBatchGetParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = StatusBatchGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['channel', 'businessUnitID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'communication-preferences/v4/statuses/batch/read',
            query: Util::array_transform_keys(
                array_intersect_key($parsed, $query_params),
                ['businessUnitID' => 'businessUnitId'],
            ),
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
     *   channel: 'EMAIL'|StatusBatchGetUnsubscribeAllStatusParams\Channel,
     *   inputs: list<string>,
     *   businessUnitID?: int,
     * }|StatusBatchGetUnsubscribeAllStatusParams $params
     *
     * @return BaseResponse<BatchResponsePublicWideStatusBulkResponse>
     *
     * @throws APIException
     */
    public function batchGetUnsubscribeAllStatus(
        array|StatusBatchGetUnsubscribeAllStatusParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = StatusBatchGetUnsubscribeAllStatusParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['channel', 'businessUnitID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'communication-preferences/v4/statuses/batch/unsubscribe-all/read',
            query: Util::array_transform_keys(
                array_intersect_key($parsed, $query_params),
                ['businessUnitID' => 'businessUnitId'],
            ),
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
     *   channel: 'EMAIL'|StatusBatchUnsubscribeAllParams\Channel,
     *   inputs: list<string>,
     *   businessUnitID?: int,
     *   verbose?: bool,
     * }|StatusBatchUnsubscribeAllParams $params
     *
     * @return BaseResponse<BatchResponsePublicBulkOptOutFromAllResponse>
     *
     * @throws APIException
     */
    public function batchUnsubscribeAll(
        array|StatusBatchUnsubscribeAllParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = StatusBatchUnsubscribeAllParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['channel', 'businessUnitID', 'verbose']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'communication-preferences/v4/statuses/batch/unsubscribe-all',
            query: Util::array_transform_keys(
                array_intersect_key($parsed, $query_params),
                ['businessUnitID' => 'businessUnitId'],
            ),
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
     *     channel: 'EMAIL'|\HubspotSDK\Marketing\Subscriptions\V4\PublicStatusRequest\Channel,
     *     statusState: 'NOT_SPECIFIED'|'SUBSCRIBED'|'UNSUBSCRIBED'|\HubspotSDK\Marketing\Subscriptions\V4\PublicStatusRequest\StatusState,
     *     subscriberIDString: string,
     *     subscriptionID: int,
     *     legalBasis?: 'CONSENT_WITH_NOTICE'|'LEGITIMATE_INTEREST_CLIENT'|'LEGITIMATE_INTEREST_OTHER'|'LEGITIMATE_INTEREST_PQL'|'NON_GDPR'|'PERFORMANCE_OF_CONTRACT'|'PROCESS_AND_STORE'|\HubspotSDK\Marketing\Subscriptions\V4\PublicStatusRequest\LegalBasis,
     *     legalBasisExplanation?: string,
     *   }>,
     * }|StatusBatchUpdateParams $params
     *
     * @return BaseResponse<BatchResponsePublicStatus>
     *
     * @throws APIException
     */
    public function batchUpdate(
        array|StatusBatchUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = StatusBatchUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $subscriberIDString the contact's email address
     * @param array{
     *   channel: 'EMAIL'|StatusGetParams\Channel,
     *   businessUnitID?: int,
     * }|StatusGetParams $params
     *
     * @return BaseResponse<ActionResponseWithResultsPublicStatus>
     *
     * @throws APIException
     */
    public function get(
        string $subscriberIDString,
        array|StatusGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = StatusGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['communication-preferences/v4/statuses/%1$s', $subscriberIDString],
            query: Util::array_transform_keys(
                $parsed,
                ['businessUnitID' => 'businessUnitId']
            ),
            options: $options,
            convert: ActionResponseWithResultsPublicStatus::class,
        );
    }

    /**
     * @api
     *
     * Check whether a contact has unsubscribed from all email subscriptions. If a contact has not opted out of all communications, the response `results` array will be empty.
     *
     * @param string $subscriberIDString the contact's email address
     * @param array{
     *   channel: 'EMAIL'|StatusGetUnsubscribeAllStatusParams\Channel,
     *   businessUnitID?: int,
     *   verbose?: bool,
     * }|StatusGetUnsubscribeAllStatusParams $params
     *
     * @return BaseResponse<ActionResponseWithResultsPublicWideStatus>
     *
     * @throws APIException
     */
    public function getUnsubscribeAllStatus(
        string $subscriberIDString,
        array|StatusGetUnsubscribeAllStatusParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = StatusGetUnsubscribeAllStatusParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'communication-preferences/v4/statuses/%1$s/unsubscribe-all',
                $subscriberIDString,
            ],
            query: Util::array_transform_keys(
                $parsed,
                ['businessUnitID' => 'businessUnitId']
            ),
            options: $options,
            convert: ActionResponseWithResultsPublicWideStatus::class,
        );
    }

    /**
     * @api
     *
     * Unsubscribe a contact from all email subscriptions.
     *
     * @param string $subscriberIDString the contact's email address
     * @param array{
     *   channel: 'EMAIL'|StatusUnsubscribeAllParams\Channel,
     *   businessUnitID?: int,
     *   verbose?: bool,
     * }|StatusUnsubscribeAllParams $params
     *
     * @return BaseResponse<ActionResponseWithResultsPublicStatus>
     *
     * @throws APIException
     */
    public function unsubscribeAll(
        string $subscriberIDString,
        array|StatusUnsubscribeAllParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = StatusUnsubscribeAllParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'communication-preferences/v4/statuses/%1$s/unsubscribe-all',
                $subscriberIDString,
            ],
            query: Util::array_transform_keys(
                $parsed,
                ['businessUnitID' => 'businessUnitId']
            ),
            options: $options,
            convert: ActionResponseWithResultsPublicStatus::class,
        );
    }
}
