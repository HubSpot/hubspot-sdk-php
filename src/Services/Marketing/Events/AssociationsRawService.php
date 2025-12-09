<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Events;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Events\Associations\AssociationAssociateByExternalAccountParams;
use HubspotSDK\Marketing\Events\Associations\AssociationAssociateParams;
use HubspotSDK\Marketing\Events\Associations\AssociationDeleteByExternalAccountParams;
use HubspotSDK\Marketing\Events\Associations\AssociationDeleteParams;
use HubspotSDK\Marketing\Events\Associations\AssociationListByExternalAccountParams;
use HubspotSDK\Marketing\Events\CollectionResponseWithTotalPublicListNoPaging;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Events\AssociationsRawContract;

final class AssociationsRawService implements AssociationsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Gets lists associated with a marketing event by marketing event id
     *
     * @param string $marketingEventID the internal id of the marketing event in HubSpot
     *
     * @return BaseResponse<CollectionResponseWithTotalPublicListNoPaging>
     *
     * @throws APIException
     */
    public function list(
        string $marketingEventID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'marketing/v3/marketing-events/associations/%1$s/lists',
                $marketingEventID,
            ],
            options: $requestOptions,
            convert: CollectionResponseWithTotalPublicListNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Disassociates a list from a marketing event by marketing event id and ILS list id
     *
     * @param string $listID the ILS ID of the list
     * @param array{marketingEventID: string}|AssociationDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $listID,
        array|AssociationDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AssociationDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $marketingEventID = $parsed['marketingEventID'];
        unset($parsed['marketingEventID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'marketing/v3/marketing-events/associations/%1$s/lists/%2$s',
                $marketingEventID,
                $listID,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Associates a list with a marketing event by marketing event id and ILS list id
     *
     * @param string $listID the ILS ID of the list
     * @param array{marketingEventID: string}|AssociationAssociateParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function associate(
        string $listID,
        array|AssociationAssociateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AssociationAssociateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $marketingEventID = $parsed['marketingEventID'];
        unset($parsed['marketingEventID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: [
                'marketing/v3/marketing-events/associations/%1$s/lists/%2$s',
                $marketingEventID,
                $listID,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Associates a list with a marketing event by external account id, external event id, and ILS list id
     *
     * @param string $listID the ILS ID of the list
     * @param array{
     *   externalAccountID: string, externalEventID: string
     * }|AssociationAssociateByExternalAccountParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function associateByExternalAccount(
        string $listID,
        array|AssociationAssociateByExternalAccountParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AssociationAssociateByExternalAccountParams::parseRequest(
            $params,
            $requestOptions,
        );
        $externalAccountID = $parsed['externalAccountID'];
        unset($parsed['externalAccountID']);
        $externalEventID = $parsed['externalEventID'];
        unset($parsed['externalEventID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: [
                'marketing/v3/marketing-events/associations/%1$s/%2$s/lists/%3$s',
                $externalAccountID,
                $externalEventID,
                $listID,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Disassociates a list from a marketing event by external account id, external event id, and ILS list id
     *
     * @param string $listID the ILS ID of the list
     * @param array{
     *   externalAccountID: string, externalEventID: string
     * }|AssociationDeleteByExternalAccountParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteByExternalAccount(
        string $listID,
        array|AssociationDeleteByExternalAccountParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AssociationDeleteByExternalAccountParams::parseRequest(
            $params,
            $requestOptions,
        );
        $externalAccountID = $parsed['externalAccountID'];
        unset($parsed['externalAccountID']);
        $externalEventID = $parsed['externalEventID'];
        unset($parsed['externalEventID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'marketing/v3/marketing-events/associations/%1$s/%2$s/lists/%3$s',
                $externalAccountID,
                $externalEventID,
                $listID,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Gets lists associated with a marketing event by external account id and external event id
     *
     * @param string $externalEventID the id of the marketing event in the external event application
     * @param array{
     *   externalAccountID: string
     * }|AssociationListByExternalAccountParams $params
     *
     * @return BaseResponse<CollectionResponseWithTotalPublicListNoPaging>
     *
     * @throws APIException
     */
    public function listByExternalAccount(
        string $externalEventID,
        array|AssociationListByExternalAccountParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AssociationListByExternalAccountParams::parseRequest(
            $params,
            $requestOptions,
        );
        $externalAccountID = $parsed['externalAccountID'];
        unset($parsed['externalAccountID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'marketing/v3/marketing-events/associations/%1$s/%2$s/lists',
                $externalAccountID,
                $externalEventID,
            ],
            options: $options,
            convert: CollectionResponseWithTotalPublicListNoPaging::class,
        );
    }
}
