<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Events;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Events\BatchResponseSubscriberEmailResponse;
use HubspotSDK\Marketing\Events\BatchResponseSubscriberVidResponse;
use HubspotSDK\RequestOptions;

interface AttendanceContract
{
    /**
     * @api
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
    ): BatchResponseSubscriberVidResponse;

    /**
     * @api
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
    ): BatchResponseSubscriberEmailResponse;

    /**
     * @api
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
    ): BatchResponseSubscriberVidResponse;

    /**
     * @api
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
    ): BatchResponseSubscriberEmailResponse;
}
