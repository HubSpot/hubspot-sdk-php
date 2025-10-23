<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\MarketingEvents;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\MarketingEvents\Attendance\AttendanceCreateByContactIDParams;
use HubspotSDK\Marketing\MarketingEvents\Attendance\AttendanceCreateByEmailParams;
use HubspotSDK\Marketing\MarketingEvents\BatchResponseSubscriberEmailResponse;
use HubspotSDK\Marketing\MarketingEvents\BatchResponseSubscriberVidResponse;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventEmailSubscriber;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventSubscriber;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\MarketingEvents\AttendanceContract;

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
     * @param string $externalEventID
     * @param list<MarketingEventSubscriber> $inputs List of HubSpot contacts to subscribe to the marketing event
     * @param string $externalAccountID The accountId that is associated with this marketing event in the external event application
     *
     * @throws APIException
     */
    public function createByContactID(
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

        return $this->createByContactIDRaw(
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
    public function createByContactIDRaw(
        string $subscriberState,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSubscriberVidResponse {
        [$parsed, $options] = AttendanceCreateByContactIDParams::parseRequest(
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
    public function createByEmail(
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

        return $this->createByEmailRaw($subscriberState, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createByEmailRaw(
        string $subscriberState,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSubscriberEmailResponse {
        [$parsed, $options] = AttendanceCreateByEmailParams::parseRequest(
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
