<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\MarketingEvents;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\MarketingEvents\CollectionResponseWithTotalPublicList;
use HubspotSDK\Marketing\MarketingEvents\ListAssociations\ListAssociationAssociateByExternalAccountParams;
use HubspotSDK\Marketing\MarketingEvents\ListAssociations\ListAssociationAssociateParams;
use HubspotSDK\Marketing\MarketingEvents\ListAssociations\ListAssociationDeleteByExternalAccountParams;
use HubspotSDK\Marketing\MarketingEvents\ListAssociations\ListAssociationDeleteParams;
use HubspotSDK\Marketing\MarketingEvents\ListAssociations\ListAssociationListByExternalAccountParams;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface ListAssociationsRawContract
{
    /**
     * @api
     *
     * @param string $marketingEventID the internal id of the marketing event in HubSpot
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseWithTotalPublicList>
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
     * @param array<string,mixed>|ListAssociationDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $listID,
        array|ListAssociationDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $listID the ILS ID of the list
     * @param array<string,mixed>|ListAssociationAssociateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function associate(
        string $listID,
        array|ListAssociationAssociateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $listID the ILS ID of the list
     * @param array<string,mixed>|ListAssociationAssociateByExternalAccountParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function associateByExternalAccount(
        string $listID,
        array|ListAssociationAssociateByExternalAccountParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $listID the ILS ID of the list
     * @param array<string,mixed>|ListAssociationDeleteByExternalAccountParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteByExternalAccount(
        string $listID,
        array|ListAssociationDeleteByExternalAccountParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $externalEventID the id of the marketing event in the external event application
     * @param array<string,mixed>|ListAssociationListByExternalAccountParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseWithTotalPublicList>
     *
     * @throws APIException
     */
    public function listByExternalAccount(
        string $externalEventID,
        array|ListAssociationListByExternalAccountParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
