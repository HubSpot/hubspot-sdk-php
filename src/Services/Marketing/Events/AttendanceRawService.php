<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Events;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\Events\Attendance\AttendanceCreateByEventIDAndContactIDParams;
use HubspotSDK\Marketing\Events\Attendance\AttendanceCreateByEventIDAndEmailParams;
use HubspotSDK\Marketing\Events\Attendance\AttendanceCreateByExternalEventIDAndContactIDParams;
use HubspotSDK\Marketing\Events\Attendance\AttendanceCreateByExternalEventIDAndEmailParams;
use HubspotSDK\Marketing\Events\BatchResponseSubscriberEmailResponse;
use HubspotSDK\Marketing\Events\BatchResponseSubscriberVidResponse;
use HubspotSDK\Marketing\Events\MarketingEventEmailSubscriber;
use HubspotSDK\Marketing\Events\MarketingEventSubscriber;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Events\AttendanceRawContract;

/**
 * @phpstan-import-type MarketingEventSubscriberShape from \HubspotSDK\Marketing\Events\MarketingEventSubscriber
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 * @phpstan-import-type MarketingEventEmailSubscriberShape from \HubspotSDK\Marketing\Events\MarketingEventEmailSubscriber
 */
final class AttendanceRawService implements AttendanceRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param string $subscriberState Path param: The attendance state value. It may be 'register', 'attend' or 'cancel'
     * @param array{
     *   objectID: string,
     *   inputs: list<MarketingEventSubscriber|MarketingEventSubscriberShape>,
     * }|AttendanceCreateByEventIDAndContactIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseSubscriberVidResponse>
     *
     * @throws APIException
     */
    public function createByEventIDAndContactID(
        string $subscriberState,
        array|AttendanceCreateByEventIDAndContactIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AttendanceCreateByEventIDAndContactIDParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'marketing/marketing-events/2026-03/%1$s/attendance/%2$s/create',
                $objectID,
                $subscriberState,
            ],
            body: (object) array_diff_key($parsed, array_flip(['objectID'])),
            options: $options,
            convert: BatchResponseSubscriberVidResponse::class,
        );
    }

    /**
     * @api
     *
     * @param string $subscriberState Path param: The attendance state value. It may be 'register', 'attend' or 'cancel'
     * @param array{
     *   objectID: string,
     *   inputs: list<MarketingEventEmailSubscriber|MarketingEventEmailSubscriberShape>,
     * }|AttendanceCreateByEventIDAndEmailParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseSubscriberEmailResponse>
     *
     * @throws APIException
     */
    public function createByEventIDAndEmail(
        string $subscriberState,
        array|AttendanceCreateByEventIDAndEmailParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AttendanceCreateByEventIDAndEmailParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'marketing/marketing-events/2026-03/%1$s/attendance/%2$s/email-create',
                $objectID,
                $subscriberState,
            ],
            body: (object) array_diff_key($parsed, array_flip(['objectID'])),
            options: $options,
            convert: BatchResponseSubscriberEmailResponse::class,
        );
    }

    /**
     * @api
     *
     * @param string $subscriberState Path param
     * @param array{
     *   externalEventID: string,
     *   inputs: list<MarketingEventSubscriber|MarketingEventSubscriberShape>,
     *   externalAccountID?: string,
     * }|AttendanceCreateByExternalEventIDAndContactIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseSubscriberVidResponse>
     *
     * @throws APIException
     */
    public function createByExternalEventIDAndContactID(
        string $subscriberState,
        array|AttendanceCreateByExternalEventIDAndContactIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AttendanceCreateByExternalEventIDAndContactIDParams::parseRequest(
            $params,
            $requestOptions,
        );
        $externalEventID = $parsed['externalEventID'];
        unset($parsed['externalEventID']);
        $query_params = array_flip(['externalAccountID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'marketing/marketing-events/2026-03/attendance/%1$s/%2$s/create',
                $externalEventID,
                $subscriberState,
            ],
            query: Util::array_transform_keys(
                array_intersect_key($parsed, $query_params),
                ['externalAccountID' => 'externalAccountId'],
            ),
            body: (object) array_diff_key(
                array_diff_key($parsed, $query_params),
                array_flip(['externalEventID'])
            ),
            options: $options,
            convert: BatchResponseSubscriberVidResponse::class,
        );
    }

    /**
     * @api
     *
     * @param string $subscriberState Path param
     * @param array{
     *   externalEventID: string,
     *   inputs: list<MarketingEventEmailSubscriber|MarketingEventEmailSubscriberShape>,
     *   externalAccountID?: string,
     * }|AttendanceCreateByExternalEventIDAndEmailParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseSubscriberEmailResponse>
     *
     * @throws APIException
     */
    public function createByExternalEventIDAndEmail(
        string $subscriberState,
        array|AttendanceCreateByExternalEventIDAndEmailParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AttendanceCreateByExternalEventIDAndEmailParams::parseRequest(
            $params,
            $requestOptions,
        );
        $externalEventID = $parsed['externalEventID'];
        unset($parsed['externalEventID']);
        $query_params = array_flip(['externalAccountID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'marketing/marketing-events/2026-03/attendance/%1$s/%2$s/email-create',
                $externalEventID,
                $subscriberState,
            ],
            query: Util::array_transform_keys(
                array_intersect_key($parsed, $query_params),
                ['externalAccountID' => 'externalAccountId'],
            ),
            body: (object) array_diff_key(
                array_diff_key($parsed, $query_params),
                array_flip(['externalEventID'])
            ),
            options: $options,
            convert: BatchResponseSubscriberEmailResponse::class,
        );
    }
}
