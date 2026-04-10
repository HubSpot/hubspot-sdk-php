<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Marketing\MarketingEvents;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Marketing\MarketingEvents\CollectionResponseWithTotalPublicList;
use HubSpotSDK\Marketing\MarketingEvents\ListAssociations\ListAssociationAssociateByExternalAccountParams;
use HubSpotSDK\Marketing\MarketingEvents\ListAssociations\ListAssociationAssociateParams;
use HubSpotSDK\Marketing\MarketingEvents\ListAssociations\ListAssociationDeleteByExternalAccountParams;
use HubSpotSDK\Marketing\MarketingEvents\ListAssociations\ListAssociationDeleteParams;
use HubSpotSDK\Marketing\MarketingEvents\ListAssociations\ListAssociationListByExternalAccountParams;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Marketing\MarketingEvents\ListAssociationsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class ListAssociationsRawService implements ListAssociationsRawContract
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseWithTotalPublicList>
     *
     * @throws APIException
     */
    public function list(
        string $marketingEventID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'marketing/marketing-events/2026-03/associations/%1$s/lists',
                $marketingEventID,
            ],
            options: $requestOptions,
            convert: CollectionResponseWithTotalPublicList::class,
        );
    }

    /**
     * @api
     *
     * Disassociates a list from a marketing event by marketing event id and ILS list id
     *
     * @param string $listID the ILS ID of the list
     * @param array{marketingEventID: string}|ListAssociationDeleteParams $params
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
    ): BaseResponse {
        [$parsed, $options] = ListAssociationDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $marketingEventID = $parsed['marketingEventID'];
        unset($parsed['marketingEventID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'marketing/marketing-events/2026-03/associations/%1$s/lists/%2$s',
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
     * @param array{marketingEventID: string}|ListAssociationAssociateParams $params
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
    ): BaseResponse {
        [$parsed, $options] = ListAssociationAssociateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $marketingEventID = $parsed['marketingEventID'];
        unset($parsed['marketingEventID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: [
                'marketing/marketing-events/2026-03/associations/%1$s/lists/%2$s',
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
     * }|ListAssociationAssociateByExternalAccountParams $params
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
    ): BaseResponse {
        [$parsed, $options] = ListAssociationAssociateByExternalAccountParams::parseRequest(
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
                'marketing/marketing-events/2026-03/associations/%1$s/%2$s/lists/%3$s',
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
     * }|ListAssociationDeleteByExternalAccountParams $params
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
    ): BaseResponse {
        [$parsed, $options] = ListAssociationDeleteByExternalAccountParams::parseRequest(
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
                'marketing/marketing-events/2026-03/associations/%1$s/%2$s/lists/%3$s',
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
     * }|ListAssociationListByExternalAccountParams $params
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
    ): BaseResponse {
        [$parsed, $options] = ListAssociationListByExternalAccountParams::parseRequest(
            $params,
            $requestOptions,
        );
        $externalAccountID = $parsed['externalAccountID'];
        unset($parsed['externalAccountID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'marketing/marketing-events/2026-03/associations/%1$s/%2$s/lists',
                $externalAccountID,
                $externalEventID,
            ],
            options: $options,
            convert: CollectionResponseWithTotalPublicList::class,
        );
    }
}
