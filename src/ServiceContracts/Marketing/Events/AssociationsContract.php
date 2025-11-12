<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Events;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Events\Associations\AssociationAssociateByExternalAccountParams;
use HubspotSDK\Marketing\Events\Associations\AssociationAssociateParams;
use HubspotSDK\Marketing\Events\Associations\AssociationDeleteByExternalAccountParams;
use HubspotSDK\Marketing\Events\Associations\AssociationDeleteParams;
use HubspotSDK\Marketing\Events\Associations\AssociationListByExternalAccountParams;
use HubspotSDK\Marketing\Events\CollectionResponseWithTotalPublicListNoPaging;
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
     * @param array<mixed>|AssociationDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $listID,
        array|AssociationDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|AssociationAssociateParams $params
     *
     * @throws APIException
     */
    public function associate(
        string $listID,
        array|AssociationAssociateParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|AssociationAssociateByExternalAccountParams $params
     *
     * @throws APIException
     */
    public function associateByExternalAccount(
        string $listID,
        array|AssociationAssociateByExternalAccountParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|AssociationDeleteByExternalAccountParams $params
     *
     * @throws APIException
     */
    public function deleteByExternalAccount(
        string $listID,
        array|AssociationDeleteByExternalAccountParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|AssociationListByExternalAccountParams $params
     *
     * @throws APIException
     */
    public function listByExternalAccount(
        string $externalEventID,
        array|AssociationListByExternalAccountParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalPublicListNoPaging;
}
