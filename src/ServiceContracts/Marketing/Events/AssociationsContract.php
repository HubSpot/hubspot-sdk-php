<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Events;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Events\CollectionResponseWithTotalPublicListNoPaging;
use HubspotSDK\RequestOptions;

interface AssociationsContract
{
    /**
     * @api
     *
     * @param string $marketingEventID the internal id of the marketing event in HubSpot
     *
     * @throws APIException
     */
    public function list(
        string $marketingEventID,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalPublicListNoPaging;

    /**
     * @api
     *
     * @param string $listID the ILS ID of the list
     * @param string $marketingEventID the internal id of the marketing event in HubSpot
     *
     * @throws APIException
     */
    public function delete(
        string $listID,
        string $marketingEventID,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $listID the ILS ID of the list
     * @param string $marketingEventID the internal id of the marketing event in HubSpot
     *
     * @throws APIException
     */
    public function associate(
        string $listID,
        string $marketingEventID,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $listID the ILS ID of the list
     * @param string $externalAccountID the accountId that is associated with this marketing event in the external event application
     * @param string $externalEventID the id of the marketing event in the external event application
     *
     * @throws APIException
     */
    public function associateByExternalAccount(
        string $listID,
        string $externalAccountID,
        string $externalEventID,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $listID the ILS ID of the list
     * @param string $externalAccountID the accountId that is associated with this marketing event in the external event application
     * @param string $externalEventID the id of the marketing event in the external event application
     *
     * @throws APIException
     */
    public function deleteByExternalAccount(
        string $listID,
        string $externalAccountID,
        string $externalEventID,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $externalEventID the id of the marketing event in the external event application
     * @param string $externalAccountID The accountId that is associated with this marketing event in the external event application
     *
     * @throws APIException
     */
    public function listByExternalAccount(
        string $externalEventID,
        string $externalAccountID,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalPublicListNoPaging;
}
