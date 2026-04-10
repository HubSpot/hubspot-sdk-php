<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\CommunicationPreferences\Statuses;

use HubSpotSDK\Client;
use HubSpotSDK\CommunicationPreferences\BatchResponsePublicBulkOptOutFromAllResponse;
use HubSpotSDK\CommunicationPreferences\BatchResponsePublicStatus;
use HubSpotSDK\CommunicationPreferences\BatchResponsePublicStatusBulkResponse;
use HubSpotSDK\CommunicationPreferences\BatchResponsePublicWideStatusBulkResponse;
use HubSpotSDK\CommunicationPreferences\PublicStatusRequest;
use HubSpotSDK\CommunicationPreferences\Statuses\Batch\BatchGetUnsubscribeAllStatusesParams;
use HubSpotSDK\CommunicationPreferences\Statuses\Batch\BatchGetUnsubscribeAllStatusesParams\Channel;
use HubSpotSDK\CommunicationPreferences\Statuses\Batch\BatchReadParams;
use HubSpotSDK\CommunicationPreferences\Statuses\Batch\BatchUnsubscribeAllParams;
use HubSpotSDK\CommunicationPreferences\Statuses\Batch\BatchUpdateStatusesParams;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\CommunicationPreferences\Statuses\BatchRawContract;

/**
 * @phpstan-import-type PublicStatusRequestShape from \HubSpotSDK\CommunicationPreferences\PublicStatusRequest
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class BatchRawService implements BatchRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Checks whether a set of contacts have opted out of all communications.
     *
     * @param array{
     *   channel: Channel|value-of<Channel>, inputs: list<string>, businessUnitID?: int
     * }|BatchGetUnsubscribeAllStatusesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePublicWideStatusBulkResponse>
     *
     * @throws APIException
     */
    public function getUnsubscribeAllStatuses(
        array|BatchGetUnsubscribeAllStatusesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchGetUnsubscribeAllStatusesParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['channel', 'businessUnitID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'communication-preferences/2026-03/statuses/batch/unsubscribe-all/read',
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
     * Batch retrieve subscription statuses for a set of contacts.
     *
     * @param array{
     *   channel: BatchReadParams\Channel|value-of<BatchReadParams\Channel>,
     *   inputs: list<string>,
     *   businessUnitID?: int,
     * }|BatchReadParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePublicStatusBulkResponse>
     *
     * @throws APIException
     */
    public function read(
        array|BatchReadParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchReadParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['channel', 'businessUnitID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'communication-preferences/2026-03/statuses/batch/read',
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
     * Unsubscribe a set of contacts from all email subscriptions.
     *
     * @param array{
     *   channel: BatchUnsubscribeAllParams\Channel|value-of<BatchUnsubscribeAllParams\Channel>,
     *   inputs: list<string>,
     *   businessUnitID?: int,
     *   verbose?: bool,
     * }|BatchUnsubscribeAllParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePublicBulkOptOutFromAllResponse>
     *
     * @throws APIException
     */
    public function unsubscribeAll(
        array|BatchUnsubscribeAllParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchUnsubscribeAllParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['channel', 'businessUnitID', 'verbose']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'communication-preferences/2026-03/statuses/batch/unsubscribe-all',
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
     *   inputs: list<PublicStatusRequest|PublicStatusRequestShape>
     * }|BatchUpdateStatusesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePublicStatus>
     *
     * @throws APIException
     */
    public function updateStatuses(
        array|BatchUpdateStatusesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchUpdateStatusesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'communication-preferences/2026-03/statuses/batch/write',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponsePublicStatus::class,
        );
    }
}
