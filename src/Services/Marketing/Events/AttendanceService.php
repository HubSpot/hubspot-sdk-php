<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Events;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Events\BatchResponseSubscriberEmailResponse;
use HubspotSDK\Marketing\Events\BatchResponseSubscriberVidResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Events\AttendanceContract;

final class AttendanceService implements AttendanceContract
{
    /**
     * @api
     */
    public AttendanceRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AttendanceRawService($client);
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
     * @param string $subscriberState Path param: The attendance state value. It may be 'register', 'attend' or 'cancel'
     * @param string $objectID Path param: The internal id of the marketing event in HubSpot
     * @param list<array{
     *   interactionDateTime: int, properties: array<string,string>, vid: int
     * }> $inputs Body param: List of HubSpot contacts to subscribe to the marketing event
     *
     * @throws APIException
     */
    public function createByEventIDAndContactID(
        string $subscriberState,
        string $objectID,
        array $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSubscriberVidResponse {
        $params = ['objectID' => $objectID, 'inputs' => $inputs];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createByEventIDAndContactID($subscriberState, params: $params, requestOptions: $requestOptions);

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
     * @param string $subscriberState Path param: The attendance state value. It may be 'register', 'attend' or 'cancel'
     * @param string $objectID Path param: The internal ID of the marketing event in HubSpot
     * @param list<array{
     *   contactProperties: array<string,string>,
     *   email: string,
     *   interactionDateTime: int,
     *   properties: array<string,string>,
     * }> $inputs Body param: List of marketing event details to create or update
     *
     * @throws APIException
     */
    public function createByEventIDAndEmail(
        string $subscriberState,
        string $objectID,
        array $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSubscriberEmailResponse {
        $params = ['objectID' => $objectID, 'inputs' => $inputs];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createByEventIDAndEmail($subscriberState, params: $params, requestOptions: $requestOptions);

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
     * @param string $subscriberState Path param: The new subscriber state for the HubSpot contacts and the specified marketing event. For example: 'register', 'attend' or 'cancel'.
     * @param string $externalEventID Path param: The id of the marketing event in the external event application
     * @param list<array{
     *   interactionDateTime: int, properties: array<string,string>, vid: int
     * }> $inputs Body param: List of HubSpot contacts to subscribe to the marketing event
     * @param string $externalAccountID Query param: The accountId that is associated with this marketing event in the external event application
     *
     * @throws APIException
     */
    public function createByExternalEventIDAndContactID(
        string $subscriberState,
        string $externalEventID,
        array $inputs,
        ?string $externalAccountID = null,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSubscriberVidResponse {
        $params = [
            'externalEventID' => $externalEventID,
            'inputs' => $inputs,
            'externalAccountID' => $externalAccountID,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createByExternalEventIDAndContactID($subscriberState, params: $params, requestOptions: $requestOptions);

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
     * @param string $subscriberState Path param: The new subscriber state for the HubSpot contacts and the specified marketing event. For example: 'register', 'attend' or 'cancel'.
     * @param string $externalEventID Path param: The id of the marketing event in the external event application
     * @param list<array{
     *   contactProperties: array<string,string>,
     *   email: string,
     *   interactionDateTime: int,
     *   properties: array<string,string>,
     * }> $inputs Body param: List of marketing event details to create or update
     * @param string $externalAccountID Query param: The accountId that is associated with this marketing event in the external event application
     *
     * @throws APIException
     */
    public function createByExternalEventIDAndEmail(
        string $subscriberState,
        string $externalEventID,
        array $inputs,
        ?string $externalAccountID = null,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSubscriberEmailResponse {
        $params = [
            'externalEventID' => $externalEventID,
            'inputs' => $inputs,
            'externalAccountID' => $externalAccountID,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createByExternalEventIDAndEmail($subscriberState, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
