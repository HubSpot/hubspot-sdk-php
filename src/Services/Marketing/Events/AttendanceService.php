<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Events;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Events\Attendance\AttendanceCreateByEventIDAndContactIDParams;
use HubspotSDK\Marketing\Events\Attendance\AttendanceCreateByEventIDAndEmailParams;
use HubspotSDK\Marketing\Events\Attendance\AttendanceCreateByExternalEventIDAndContactIDParams;
use HubspotSDK\Marketing\Events\Attendance\AttendanceCreateByExternalEventIDAndEmailParams;
use HubspotSDK\Marketing\Events\BatchResponseSubscriberEmailResponse;
use HubspotSDK\Marketing\Events\BatchResponseSubscriberVidResponse;
use HubspotSDK\Marketing\Events\MarketingEventEmailSubscriber;
use HubspotSDK\Marketing\Events\MarketingEventSubscriber;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Events\AttendanceContract;

use const HubspotSDK\Core\OMIT as omit;

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
     * @param string $objectID
     * @param list<MarketingEventSubscriber> $inputs List of HubSpot contacts to subscribe to the marketing event
     *
     * @throws APIException
     */
    public function createByEventIDAndContactID(
        string $subscriberState,
        $objectID,
        $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSubscriberVidResponse {
        $params = ['objectID' => $objectID, 'inputs' => $inputs];

        return $this->createByEventIDAndContactIDRaw(
            $subscriberState,
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
    public function createByEventIDAndContactIDRaw(
        string $subscriberState,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSubscriberVidResponse {
        [
            $parsed, $options,
        ] = AttendanceCreateByEventIDAndContactIDParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line;
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
     * @param string $objectID
     * @param list<MarketingEventEmailSubscriber> $inputs List of marketing event details to create or update
     *
     * @throws APIException
     */
    public function createByEventIDAndEmail(
        string $subscriberState,
        $objectID,
        $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSubscriberEmailResponse {
        $params = ['objectID' => $objectID, 'inputs' => $inputs];

        return $this->createByEventIDAndEmailRaw(
            $subscriberState,
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
    public function createByEventIDAndEmailRaw(
        string $subscriberState,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSubscriberEmailResponse {
        [$parsed, $options] = AttendanceCreateByEventIDAndEmailParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line;
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
     * @param string $externalEventID
     * @param list<MarketingEventSubscriber> $inputs List of HubSpot contacts to subscribe to the marketing event
     * @param string $externalAccountID The accountId that is associated with this marketing event in the external event application
     *
     * @throws APIException
     */
    public function createByExternalEventIDAndContactID(
        string $subscriberState,
        $externalEventID,
        $inputs,
        $externalAccountID = omit,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSubscriberVidResponse {
        $params = [
            'externalEventID' => $externalEventID,
            'inputs' => $inputs,
            'externalAccountID' => $externalAccountID,
        ];

        return $this->createByExternalEventIDAndContactIDRaw(
            $subscriberState,
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
    public function createByExternalEventIDAndContactIDRaw(
        string $subscriberState,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSubscriberVidResponse {
        [
            $parsed, $options,
        ] = AttendanceCreateByExternalEventIDAndContactIDParams::parseRequest(
            $params,
            $requestOptions
        );
        $externalEventID = $parsed['externalEventID'];
        unset($parsed['externalEventID']);
        $query_params = ['externalAccountId'];

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'marketing/v3/marketing-events/attendance/%1$s/%2$s/create',
                $externalEventID,
                $subscriberState,
            ],
            query: array_diff_key($parsed, $query_params),
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
     * @param string $externalEventID
     * @param list<MarketingEventEmailSubscriber> $inputs List of marketing event details to create or update
     * @param string $externalAccountID The accountId that is associated with this marketing event in the external event application
     *
     * @throws APIException
     */
    public function createByExternalEventIDAndEmail(
        string $subscriberState,
        $externalEventID,
        $inputs,
        $externalAccountID = omit,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSubscriberEmailResponse {
        $params = [
            'externalEventID' => $externalEventID,
            'inputs' => $inputs,
            'externalAccountID' => $externalAccountID,
        ];

        return $this->createByExternalEventIDAndEmailRaw(
            $subscriberState,
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
    public function createByExternalEventIDAndEmailRaw(
        string $subscriberState,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSubscriberEmailResponse {
        [
            $parsed, $options,
        ] = AttendanceCreateByExternalEventIDAndEmailParams::parseRequest(
            $params,
            $requestOptions
        );
        $externalEventID = $parsed['externalEventID'];
        unset($parsed['externalEventID']);
        $query_params = ['externalAccountId'];

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'marketing/v3/marketing-events/attendance/%1$s/%2$s/email-create',
                $externalEventID,
                $subscriberState,
            ],
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key(
                array_diff_key($parsed, $query_params),
                ['externalEventID']
            ),
            options: $options,
            convert: BatchResponseSubscriberEmailResponse::class,
        );
    }
}
