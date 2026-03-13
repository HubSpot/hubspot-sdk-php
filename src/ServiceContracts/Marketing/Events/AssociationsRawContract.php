<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Events;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Events\Associations\AssociationAssociateByExternalAccountParams;
use HubspotSDK\Marketing\Events\Associations\AssociationAssociateParams;
use HubspotSDK\Marketing\Events\Associations\AssociationDeleteByExternalAccountParams;
use HubspotSDK\Marketing\Events\Associations\AssociationDeleteParams;
use HubspotSDK\Marketing\Events\Associations\AssociationListByExternalAccountParams;
use HubspotSDK\Marketing\Events\CollectionResponseWithTotalPublicListNoPaging;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface AssociationsRawContract
{
    /**
     * @api
     *
     * @param string $marketingEventID the internal id of the marketing event in HubSpot
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseWithTotalPublicListNoPaging>
     *
     * @throws APIException
     */
    public function list(
        string $marketingEventID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $listID the ILS ID of the list
     * @param array<string,mixed>|AssociationDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $listID,
        array|AssociationDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $listID the ILS ID of the list
     * @param array<string,mixed>|AssociationAssociateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function associate(
        string $listID,
        array|AssociationAssociateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $listID the ILS ID of the list
     * @param array<string,mixed>|AssociationAssociateByExternalAccountParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function associateByExternalAccount(
        string $listID,
        array|AssociationAssociateByExternalAccountParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $listID the ILS ID of the list
     * @param array<string,mixed>|AssociationDeleteByExternalAccountParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteByExternalAccount(
        string $listID,
        array|AssociationDeleteByExternalAccountParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $externalEventID the id of the marketing event in the external event application
     * @param array<string,mixed>|AssociationListByExternalAccountParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseWithTotalPublicListNoPaging>
     *
     * @throws APIException
     */
    public function listByExternalAccount(
        string $externalEventID,
        array|AssociationListByExternalAccountParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
