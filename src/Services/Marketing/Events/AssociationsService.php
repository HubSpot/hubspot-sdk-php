<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Events;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\CollectionResponseWithTotalPublicListNoPaging;
use HubspotSDK\Marketing\Events\Associations\AssociationAssociateByExternalAccountParams;
use HubspotSDK\Marketing\Events\Associations\AssociationAssociateParams;
use HubspotSDK\Marketing\Events\Associations\AssociationDeleteByExternalAccountParams;
use HubspotSDK\Marketing\Events\Associations\AssociationDeleteParams;
use HubspotSDK\Marketing\Events\Associations\AssociationListByExternalAccountParams;
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
        // @phpstan-ignore-next-line;
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
     * @param string $marketingEventID
     *
     * @throws APIException
     */
    public function delete(
        string $listID,
        $marketingEventID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['marketingEventID' => $marketingEventID];

        return $this->deleteRaw($listID, $params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = AssociationDeleteParams::parseRequest(
            $params,
            $requestOptions
        );
        $marketingEventID = $parsed['marketingEventID'];
        unset($parsed['marketingEventID']);

        // @phpstan-ignore-next-line;
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
     * @param string $marketingEventID
     *
     * @throws APIException
     */
    public function associate(
        string $listID,
        $marketingEventID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['marketingEventID' => $marketingEventID];

        return $this->associateRaw($listID, $params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = AssociationAssociateParams::parseRequest(
            $params,
            $requestOptions
        );
        $marketingEventID = $parsed['marketingEventID'];
        unset($parsed['marketingEventID']);

        // @phpstan-ignore-next-line;
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
    ): mixed {
        $params = [
            'externalAccountID' => $externalAccountID,
            'externalEventID' => $externalEventID,
        ];

        return $this->associateByExternalAccountRaw(
            $listID,
            $params,
            $requestOptions
        );
    }

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
    ): mixed {
        [
            $parsed, $options,
        ] = AssociationAssociateByExternalAccountParams::parseRequest(
            $params,
            $requestOptions
        );
        $externalAccountID = $parsed['externalAccountID'];
        unset($parsed['externalAccountID']);
        $externalEventID = $parsed['externalEventID'];
        unset($parsed['externalEventID']);

        // @phpstan-ignore-next-line;
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
    ): mixed {
        $params = [
            'externalAccountID' => $externalAccountID,
            'externalEventID' => $externalEventID,
        ];

        return $this->deleteByExternalAccountRaw($listID, $params, $requestOptions);
    }

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
    ): mixed {
        [
            $parsed, $options,
        ] = AssociationDeleteByExternalAccountParams::parseRequest(
            $params,
            $requestOptions
        );
        $externalAccountID = $parsed['externalAccountID'];
        unset($parsed['externalAccountID']);
        $externalEventID = $parsed['externalEventID'];
        unset($parsed['externalEventID']);

        // @phpstan-ignore-next-line;
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
     * @param string $externalAccountID
     *
     * @throws APIException
     */
    public function listByExternalAccount(
        string $externalEventID,
        $externalAccountID,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalPublicListNoPaging {
        $params = ['externalAccountID' => $externalAccountID];

        return $this->listByExternalAccountRaw(
            $externalEventID,
            $params,
            $requestOptions
        );
    }

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
    ): CollectionResponseWithTotalPublicListNoPaging {
        [$parsed, $options] = AssociationListByExternalAccountParams::parseRequest(
            $params,
            $requestOptions
        );
        $externalAccountID = $parsed['externalAccountID'];
        unset($parsed['externalAccountID']);

        // @phpstan-ignore-next-line;
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
