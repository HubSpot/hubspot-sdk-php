<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Events;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\CollectionResponseWithTotalPublicListNoPaging;
use HubspotSDK\RequestOptions;

interface AssociationsContract
{
    /**
     * @api
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
     * @param string $marketingEventID
     *
     * @throws APIException
     */
    public function delete(
        string $listID,
        $marketingEventID,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $listID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $marketingEventID
     *
     * @throws APIException
     */
    public function associate(
        string $listID,
        $marketingEventID,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function associateRaw(
        string $listID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $externalAccountID
     * @param string $externalEventID
     *
     * @throws APIException
     */
    public function associateByExternalAccount(
        string $listID,
        $externalAccountID,
        $externalEventID,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function associateByExternalAccountRaw(
        string $listID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $externalAccountID
     * @param string $externalEventID
     *
     * @throws APIException
     */
    public function deleteByExternalAccount(
        string $listID,
        $externalAccountID,
        $externalEventID,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteByExternalAccountRaw(
        string $listID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $externalAccountID
     *
     * @throws APIException
     */
    public function listByExternalAccount(
        string $externalEventID,
        $externalAccountID,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalPublicListNoPaging;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listByExternalAccountRaw(
        string $externalEventID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalPublicListNoPaging;
}
