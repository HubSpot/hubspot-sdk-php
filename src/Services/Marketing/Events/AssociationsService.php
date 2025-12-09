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
use HubspotSDK\ServiceContracts\Marketing\Events\AssociationsContract;

final class AssociationsService implements AssociationsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Gets lists associated with a marketing event by marketing event id
     *
     * @throws APIException
     */
    public function list(
        string $marketingEventID,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalPublicListNoPaging {
        /** @var BaseResponse<CollectionResponseWithTotalPublicListNoPaging> */
        $response = $this->client->request(
            method: 'get',
            path: [
                'marketing/v3/marketing-events/associations/%1$s/lists',
                $marketingEventID,
            ],
            options: $requestOptions,
            convert: CollectionResponseWithTotalPublicListNoPaging::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Disassociates a list from a marketing event by marketing event id and ILS list id
     *
     * @param array{marketingEventId: string}|AssociationDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $listID,
        array|AssociationDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = AssociationDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $marketingEventID = $parsed['marketingEventId'];
        unset($parsed['marketingEventId']);

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: [
                'marketing/v3/marketing-events/associations/%1$s/lists/%2$s',
                $marketingEventID,
                $listID,
            ],
            options: $options,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Associates a list with a marketing event by marketing event id and ILS list id
     *
     * @param array{marketingEventId: string}|AssociationAssociateParams $params
     *
     * @throws APIException
     */
    public function associate(
        string $listID,
        array|AssociationAssociateParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = AssociationAssociateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $marketingEventID = $parsed['marketingEventId'];
        unset($parsed['marketingEventId']);

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'put',
            path: [
                'marketing/v3/marketing-events/associations/%1$s/lists/%2$s',
                $marketingEventID,
                $listID,
            ],
            options: $options,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Associates a list with a marketing event by external account id, external event id, and ILS list id
     *
     * @param array{
     *   externalAccountId: string, externalEventId: string
     * }|AssociationAssociateByExternalAccountParams $params
     *
     * @throws APIException
     */
    public function associateByExternalAccount(
        string $listID,
        array|AssociationAssociateByExternalAccountParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = AssociationAssociateByExternalAccountParams::parseRequest(
            $params,
            $requestOptions,
        );
        $externalAccountID = $parsed['externalAccountId'];
        unset($parsed['externalAccountId']);
        $externalEventID = $parsed['externalEventId'];
        unset($parsed['externalEventId']);

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
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

        return $response->parse();
    }

    /**
     * @api
     *
     * Disassociates a list from a marketing event by external account id, external event id, and ILS list id
     *
     * @param array{
     *   externalAccountId: string, externalEventId: string
     * }|AssociationDeleteByExternalAccountParams $params
     *
     * @throws APIException
     */
    public function deleteByExternalAccount(
        string $listID,
        array|AssociationDeleteByExternalAccountParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = AssociationDeleteByExternalAccountParams::parseRequest(
            $params,
            $requestOptions,
        );
        $externalAccountID = $parsed['externalAccountId'];
        unset($parsed['externalAccountId']);
        $externalEventID = $parsed['externalEventId'];
        unset($parsed['externalEventId']);

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
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

        return $response->parse();
    }

    /**
     * @api
     *
     * Gets lists associated with a marketing event by external account id and external event id
     *
     * @param array{
     *   externalAccountId: string
     * }|AssociationListByExternalAccountParams $params
     *
     * @throws APIException
     */
    public function listByExternalAccount(
        string $externalEventID,
        array|AssociationListByExternalAccountParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalPublicListNoPaging {
        [$parsed, $options] = AssociationListByExternalAccountParams::parseRequest(
            $params,
            $requestOptions,
        );
        $externalAccountID = $parsed['externalAccountId'];
        unset($parsed['externalAccountId']);

        /** @var BaseResponse<CollectionResponseWithTotalPublicListNoPaging> */
        $response = $this->client->request(
            method: 'get',
            path: [
                'marketing/v3/marketing-events/associations/%1$s/%2$s/lists',
                $externalAccountID,
                $externalEventID,
            ],
            options: $options,
            convert: CollectionResponseWithTotalPublicListNoPaging::class,
        );

        return $response->parse();
    }
}
