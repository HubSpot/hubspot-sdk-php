<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\CreatedResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\Tickets\TicketCreateParams;
use HubspotSDK\Crm\Objects\Tickets\TicketGetParams;
use HubspotSDK\Crm\Objects\Tickets\TicketListParams;
use HubspotSDK\Crm\Objects\Tickets\TicketMergeParams;
use HubspotSDK\Crm\Objects\Tickets\TicketSearchParams;
use HubspotSDK\Crm\Objects\Tickets\TicketUpdateParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface TicketsContract
{
    /**
     * @api
     *
     * @param array<mixed>|TicketCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|TicketCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): CreatedResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|TicketUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $ticketID,
        array|TicketUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|TicketListParams $params
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        array|TicketListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $ticketID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|TicketGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $ticketID,
        array|TicketGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param array<mixed>|TicketMergeParams $params
     *
     * @throws APIException
     */
    public function merge(
        array|TicketMergeParams $params,
        ?RequestOptions $requestOptions = null
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|TicketSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        array|TicketSearchParams $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalSimplePublicObject;
}
