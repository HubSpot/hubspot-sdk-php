<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Events;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Events\Attendance\AttendanceCreateByEventIDAndContactIDParams;
use HubspotSDK\Marketing\Events\Attendance\AttendanceCreateByEventIDAndEmailParams;
use HubspotSDK\Marketing\Events\Attendance\AttendanceCreateByExternalEventIDAndContactIDParams;
use HubspotSDK\Marketing\Events\Attendance\AttendanceCreateByExternalEventIDAndEmailParams;
use HubspotSDK\Marketing\Events\BatchResponseSubscriberEmailResponse;
use HubspotSDK\Marketing\Events\BatchResponseSubscriberVidResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Events\AttendanceContract;

final class AttendanceService implements AttendanceContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Records the participation of multiple HubSpot contacts in a Marketing Event using their HubSpot contact IDs.
     *
     * Additional Functionality:
     * - Adds a timeline event to the contacts.
     *
     * Allowed Properties:
     * For the state "attend":
     * - joinedAt
     * - leftAt
     *
     * @param array{
     *   objectId: string,
     *   inputs: list<array{
     *     interactionDateTime: int, properties: array<string,string>, vid: int
     *   }>,
     * }|AttendanceCreateByEventIDAndContactIDParams $params
     *
     * @throws APIException
     */
    public function createByEventIDAndContactID(
        string $subscriberState,
        array|AttendanceCreateByEventIDAndContactIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSubscriberVidResponse {
        [$parsed, $options] = AttendanceCreateByEventIDAndContactIDParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectID = $parsed['objectId'];
        unset($parsed['objectId']);

        /** @var BaseResponse<BatchResponseSubscriberVidResponse> */
        $response = $this->client->request(
            method: 'post',
            path: [
                'marketing/v3/marketing-events/%1$s/attendance/%2$s/create',
                $objectID,
                $subscriberState,
            ],
            body: (object) array_diff_key($parsed, ['objectId']),
            options: $options,
            convert: BatchResponseSubscriberVidResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Records the participation of multiple HubSpot contacts in a Marketing Event using their email addresses.
     *
     * If a contact does not exist, it will be automatically created. The contactProperties field is used exclusively for creating new contacts and will not update properties of existing contacts.
     *
     * Additional Functionality:
     * - Adds a timeline event to the contacts.
     *
     * Allowed Properties:
     * For the state "attend":
     * - joinedAt
     * - leftAt
     *
     * @param array{
     *   objectId: string,
     *   inputs: list<array{
     *     contactProperties: array<string,string>,
     *     email: string,
     *     interactionDateTime: int,
     *     properties: array<string,string>,
     *   }>,
     * }|AttendanceCreateByEventIDAndEmailParams $params
     *
     * @throws APIException
     */
    public function createByEventIDAndEmail(
        string $subscriberState,
        array|AttendanceCreateByEventIDAndEmailParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSubscriberEmailResponse {
        [$parsed, $options] = AttendanceCreateByEventIDAndEmailParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectID = $parsed['objectId'];
        unset($parsed['objectId']);

        /** @var BaseResponse<BatchResponseSubscriberEmailResponse> */
        $response = $this->client->request(
            method: 'post',
            path: [
                'marketing/v3/marketing-events/%1$s/attendance/%2$s/email-create',
                $objectID,
                $subscriberState,
            ],
            body: (object) array_diff_key($parsed, ['objectId']),
            options: $options,
            convert: BatchResponseSubscriberEmailResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Records the participation of multiple HubSpot contacts in a Marketing Event using their HubSpot contact IDs.
     *
     * Additional Functionality:
     * - Adds a timeline event to the contacts.
     *
     * Allowed Properties:
     * For the state "attend":
     * - joinedAt
     * - leftAt
     *
     * @param array{
     *   externalEventId: string,
     *   inputs: list<array{
     *     interactionDateTime: int, properties: array<string,string>, vid: int
     *   }>,
     *   externalAccountId?: string,
     * }|AttendanceCreateByExternalEventIDAndContactIDParams $params
     *
     * @throws APIException
     */
    public function createByExternalEventIDAndContactID(
        string $subscriberState,
        array|AttendanceCreateByExternalEventIDAndContactIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSubscriberVidResponse {
        [$parsed, $options] = AttendanceCreateByExternalEventIDAndContactIDParams::parseRequest(
            $params,
            $requestOptions,
        );
        $externalEventID = $parsed['externalEventId'];
        unset($parsed['externalEventId']);
        $query_params = ['externalAccountId'];

        /** @var BaseResponse<BatchResponseSubscriberVidResponse> */
        $response = $this->client->request(
            method: 'post',
            path: [
                'marketing/v3/marketing-events/attendance/%1$s/%2$s/create',
                $externalEventID,
                $subscriberState,
            ],
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key(
                array_diff_key($parsed, $query_params),
                ['externalEventId']
            ),
            options: $options,
            convert: BatchResponseSubscriberVidResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Records the participation of multiple HubSpot contacts in a Marketing Event using their email addresses.
     *
     * If a contact does not exist, it will be automatically created. The contactProperties field is used exclusively for creating new contacts and will not update properties of existing contacts.
     *
     * Additional Functionality:
     * - Adds a timeline event to the contacts.
     *
     * Allowed Properties:
     * For the state "attend":
     * - joinedAt
     * - leftAt
     *
     * @param array{
     *   externalEventId: string,
     *   inputs: list<array{
     *     contactProperties: array<string,string>,
     *     email: string,
     *     interactionDateTime: int,
     *     properties: array<string,string>,
     *   }>,
     *   externalAccountId?: string,
     * }|AttendanceCreateByExternalEventIDAndEmailParams $params
     *
     * @throws APIException
     */
    public function createByExternalEventIDAndEmail(
        string $subscriberState,
        array|AttendanceCreateByExternalEventIDAndEmailParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSubscriberEmailResponse {
        [$parsed, $options] = AttendanceCreateByExternalEventIDAndEmailParams::parseRequest(
            $params,
            $requestOptions,
        );
        $externalEventID = $parsed['externalEventId'];
        unset($parsed['externalEventId']);
        $query_params = ['externalAccountId'];

        /** @var BaseResponse<BatchResponseSubscriberEmailResponse> */
        $response = $this->client->request(
            method: 'post',
            path: [
                'marketing/v3/marketing-events/attendance/%1$s/%2$s/email-create',
                $externalEventID,
                $subscriberState,
            ],
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key(
                array_diff_key($parsed, $query_params),
                ['externalEventId']
            ),
            options: $options,
            convert: BatchResponseSubscriberEmailResponse::class,
        );

        return $response->parse();
    }
}
