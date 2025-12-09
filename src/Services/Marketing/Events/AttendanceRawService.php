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
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Events\AttendanceRawContract;

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
     * @param string $subscriberState Path param: The attendance state value. It may be 'register', 'attend' or 'cancel'
     * @param array{
     *   objectID: string,
     *   inputs: list<array{
     *     interactionDateTime: int, properties: array<string,string>, vid: int
     *   }>,
     * }|AttendanceCreateByEventIDAndContactIDParams $params
     *
     * @return BaseResponse<BatchResponseSubscriberVidResponse>
     *
     * @throws APIException
     */
    public function createByEventIDAndContactID(
        string $subscriberState,
        array|AttendanceCreateByEventIDAndContactIDParams $params,
        ?RequestOptions $requestOptions = null,
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
                'marketing/v3/marketing-events/%1$s/attendance/%2$s/create',
                $objectID,
                $subscriberState,
            ],
            body: (object) array_diff_key($parsed, ['objectID']),
            options: $options,
            convert: BatchResponseSubscriberVidResponse::class,
        );
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
     * @param string $subscriberState Path param: The attendance state value. It may be 'register', 'attend' or 'cancel'
     * @param array{
     *   objectID: string,
     *   inputs: list<array{
     *     contactProperties: array<string,string>,
     *     email: string,
     *     interactionDateTime: int,
     *     properties: array<string,string>,
     *   }>,
     * }|AttendanceCreateByEventIDAndEmailParams $params
     *
     * @return BaseResponse<BatchResponseSubscriberEmailResponse>
     *
     * @throws APIException
     */
    public function createByEventIDAndEmail(
        string $subscriberState,
        array|AttendanceCreateByEventIDAndEmailParams $params,
        ?RequestOptions $requestOptions = null,
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
                'marketing/v3/marketing-events/%1$s/attendance/%2$s/email-create',
                $objectID,
                $subscriberState,
            ],
            body: (object) array_diff_key($parsed, ['objectID']),
            options: $options,
            convert: BatchResponseSubscriberEmailResponse::class,
        );
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
     * @param string $subscriberState Path param: The new subscriber state for the HubSpot contacts and the specified marketing event. For example: 'register', 'attend' or 'cancel'.
     * @param array{
     *   externalEventID: string,
     *   inputs: list<array{
     *     interactionDateTime: int, properties: array<string,string>, vid: int
     *   }>,
     *   externalAccountID?: string,
     * }|AttendanceCreateByExternalEventIDAndContactIDParams $params
     *
     * @return BaseResponse<BatchResponseSubscriberVidResponse>
     *
     * @throws APIException
     */
    public function createByExternalEventIDAndContactID(
        string $subscriberState,
        array|AttendanceCreateByExternalEventIDAndContactIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AttendanceCreateByExternalEventIDAndContactIDParams::parseRequest(
            $params,
            $requestOptions,
        );
        $externalEventID = $parsed['externalEventID'];
        unset($parsed['externalEventID']);
        $query_params = ['externalAccountId'];

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'marketing/v3/marketing-events/attendance/%1$s/%2$s/create',
                $externalEventID,
                $subscriberState,
            ],
            query: Util::array_transform_keys(
                array_diff_key($parsed, $query_params),
                ['externalAccountID' => 'externalAccountId'],
            ),
            body: (object) array_diff_key(
                array_diff_key($parsed, $query_params),
                ['externalEventID']
            ),
            options: $options,
            convert: BatchResponseSubscriberVidResponse::class,
        );
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
     * @param string $subscriberState Path param: The new subscriber state for the HubSpot contacts and the specified marketing event. For example: 'register', 'attend' or 'cancel'.
     * @param array{
     *   externalEventID: string,
     *   inputs: list<array{
     *     contactProperties: array<string,string>,
     *     email: string,
     *     interactionDateTime: int,
     *     properties: array<string,string>,
     *   }>,
     *   externalAccountID?: string,
     * }|AttendanceCreateByExternalEventIDAndEmailParams $params
     *
     * @return BaseResponse<BatchResponseSubscriberEmailResponse>
     *
     * @throws APIException
     */
    public function createByExternalEventIDAndEmail(
        string $subscriberState,
        array|AttendanceCreateByExternalEventIDAndEmailParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AttendanceCreateByExternalEventIDAndEmailParams::parseRequest(
            $params,
            $requestOptions,
        );
        $externalEventID = $parsed['externalEventID'];
        unset($parsed['externalEventID']);
        $query_params = ['externalAccountId'];

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'marketing/v3/marketing-events/attendance/%1$s/%2$s/email-create',
                $externalEventID,
                $subscriberState,
            ],
            query: Util::array_transform_keys(
                array_diff_key($parsed, $query_params),
                ['externalAccountID' => 'externalAccountId'],
            ),
            body: (object) array_diff_key(
                array_diff_key($parsed, $query_params),
                ['externalEventID']
            ),
            options: $options,
            convert: BatchResponseSubscriberEmailResponse::class,
        );
    }
}
