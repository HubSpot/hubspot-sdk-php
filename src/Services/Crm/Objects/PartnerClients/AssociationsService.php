<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects\PartnerClients;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\AssociatedID;
use HubspotSDK\Crm\Objects\PartnerClients\Associations\AssociationDeleteParams;
use HubspotSDK\Crm\Objects\PartnerClients\Associations\AssociationListParams;
use HubspotSDK\Crm\Objects\PartnerClients\Associations\AssociationUpdateParams;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\PartnerClients\AssociationsContract;

final class AssociationsService implements AssociationsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Associate a partner client with another object
     *
     * @param array{
     *   partnerClientId: string, toObjectType: string, toObjectId: string
     * }|AssociationUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $associationType,
        array|AssociationUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations {
        [$parsed, $options] = AssociationUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $partnerClientID = $parsed['partnerClientId'];
        unset($parsed['partnerClientId']);
        $toObjectType = $parsed['toObjectType'];
        unset($parsed['toObjectType']);
        $toObjectID = $parsed['toObjectId'];
        unset($parsed['toObjectId']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: [
                'crm/v3/objects/partner_clients/%1$s/associations/%2$s/%3$s/%4$s',
                $partnerClientID,
                $toObjectType,
                $toObjectID,
                $associationType,
            ],
            options: $options,
            convert: SimplePublicObjectWithAssociations::class,
        );
    }

    /**
     * @api
     *
     * List associations of a partner client by type
     *
     * @param array{
     *   partnerClientId: string, after?: string, includeFA?: bool, limit?: int
     * }|AssociationListParams $params
     *
     * @return Page<AssociatedID>
     *
     * @throws APIException
     */
    public function list(
        string $toObjectType,
        array|AssociationListParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page {
        [$parsed, $options] = AssociationListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $partnerClientID = $parsed['partnerClientId'];
        unset($parsed['partnerClientId']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'crm/v3/objects/partner_clients/%1$s/associations/%2$s',
                $partnerClientID,
                $toObjectType,
            ],
            query: $parsed,
            options: $options,
            convert: AssociatedID::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Remove an association between two partner clients
     *
     * @param array{
     *   partnerClientId: string, toObjectType: string, toObjectId: string
     * }|AssociationDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $associationType,
        array|AssociationDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = AssociationDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $partnerClientID = $parsed['partnerClientId'];
        unset($parsed['partnerClientId']);
        $toObjectType = $parsed['toObjectType'];
        unset($parsed['toObjectType']);
        $toObjectID = $parsed['toObjectId'];
        unset($parsed['toObjectId']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: [
                'crm/v3/objects/partner_clients/%1$s/associations/%2$s/%3$s/%4$s',
                $partnerClientID,
                $toObjectType,
                $toObjectID,
                $associationType,
            ],
            options: $options,
            convert: null,
        );
    }
}
