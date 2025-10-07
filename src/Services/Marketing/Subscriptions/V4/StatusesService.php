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
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetBatchParams;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetParams;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetParams\Channel;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetUnsubscribeAllStatusBatchParams;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetUnsubscribeAllStatusParams;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusSetParams;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusSetParams\LegalBasis;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusSetParams\StatusState;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUnsubscribeAllBatchParams;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUnsubscribeAllParams;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUpdateBatchParams;
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
     * Get subscription preferences for a specific contact
     *
     * @param Channel|value-of<Channel> $channel
     * @param int $businessUnitID
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
     * Batch retrieve subscription statuses
     *
     * @param StatusGetBatchParams\Channel|value-of<StatusGetBatchParams\Channel> $channel
     * @param list<string> $inputs
     * @param int $businessUnitID
     *
     * @throws APIException
     */
    public function getBatch(
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

        return $this->getBatchRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicStatusBulkResponse {
        [$parsed, $options] = StatusGetBatchParams::parseRequest(
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
     * Retrieve a contact's unsubscribed status
     *
     * @param StatusGetUnsubscribeAllStatusParams\Channel|value-of<StatusGetUnsubscribeAllStatusParams\Channel> $channel
     * @param int $businessUnitID
     * @param bool $verbose
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
     * Batch retrieve contacts who have opted out of all communications
     *
     * @param StatusGetUnsubscribeAllStatusBatchParams\Channel|value-of<StatusGetUnsubscribeAllStatusBatchParams\Channel> $channel
     * @param list<string> $inputs
     * @param int $businessUnitID
     *
     * @throws APIException
     */
    public function getUnsubscribeAllStatusBatch(
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

        return $this->getUnsubscribeAllStatusBatchRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getUnsubscribeAllStatusBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicWideStatusBulkResponse {
        [
            $parsed, $options,
        ] = StatusGetUnsubscribeAllStatusBatchParams::parseRequest(
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
     * Update a contact's subscription status
     *
     * @param StatusSetParams\Channel|value-of<StatusSetParams\Channel> $channel
     * @param StatusState|value-of<StatusState> $statusState
     * @param int $subscriptionID
     * @param LegalBasis|value-of<LegalBasis> $legalBasis
     * @param string $legalBasisExplanation
     *
     * @throws APIException
     */
    public function set(
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

        return $this->setRaw($subscriberIDString, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function setRaw(
        string $subscriberIDString,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionResponseWithResultsPublicStatus {
        [$parsed, $options] = StatusSetParams::parseRequest(
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
     * Unsubscribe a contact from all subscriptions
     *
     * @param StatusUnsubscribeAllParams\Channel|value-of<StatusUnsubscribeAllParams\Channel> $channel
     * @param int $businessUnitID
     * @param bool $verbose
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

    /**
     * @api
     *
     * Batch unsubscribe contacts from all subscriptions
     *
     * @param StatusUnsubscribeAllBatchParams\Channel|value-of<StatusUnsubscribeAllBatchParams\Channel> $channel
     * @param list<string> $inputs
     * @param int $businessUnitID
     * @param bool $verbose
     *
     * @throws APIException
     */
    public function unsubscribeAllBatch(
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

        return $this->unsubscribeAllBatchRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function unsubscribeAllBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicBulkOptOutFromAllResponse {
        [$parsed, $options] = StatusUnsubscribeAllBatchParams::parseRequest(
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
     * Batch update subscription status
     *
     * @param list<PublicStatusRequest> $inputs
     *
     * @throws APIException
     */
    public function updateBatch(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicStatus {
        $params = ['inputs' => $inputs];

        return $this->updateBatchRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicStatus {
        [$parsed, $options] = StatusUpdateBatchParams::parseRequest(
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
}
