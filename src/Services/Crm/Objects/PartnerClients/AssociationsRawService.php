<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects\PartnerClients;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\AssociatedID;
use HubspotSDK\Crm\Objects\PartnerClients\Associations\AssociationDeleteParams;
use HubspotSDK\Crm\Objects\PartnerClients\Associations\AssociationListParams;
use HubspotSDK\Crm\Objects\PartnerClients\Associations\AssociationUpdateParams;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\PartnerClients\AssociationsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
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
     * Associate a partner client with another object
     *
     * @param array{
     *   partnerClientID: string, toObjectType: string, toObjectID: string
     * }|AssociationUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function update(
        string $associationType,
        array|AssociationUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AssociationUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $partnerClientID = $parsed['partnerClientID'];
        unset($parsed['partnerClientID']);
        $toObjectType = $parsed['toObjectType'];
        unset($parsed['toObjectType']);
        $toObjectID = $parsed['toObjectID'];
        unset($parsed['toObjectID']);

        // @phpstan-ignore-next-line return.type
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
     * @param string $toObjectType Path param
     * @param array{
     *   partnerClientID: string, after?: string, includeFa?: bool, limit?: int
     * }|AssociationListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<AssociatedID>>
     *
     * @throws APIException
     */
    public function list(
        string $toObjectType,
        array|AssociationListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AssociationListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $partnerClientID = $parsed['partnerClientID'];
        unset($parsed['partnerClientID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'crm/v3/objects/partner_clients/%1$s/associations/%2$s',
                $partnerClientID,
                $toObjectType,
            ],
            query: Util::array_transform_keys($parsed, ['includeFa' => 'includeFA']),
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
     *   partnerClientID: string, toObjectType: string, toObjectID: string
     * }|AssociationDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $associationType,
        array|AssociationDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AssociationDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $partnerClientID = $parsed['partnerClientID'];
        unset($parsed['partnerClientID']);
        $toObjectType = $parsed['toObjectType'];
        unset($parsed['toObjectType']);
        $toObjectID = $parsed['toObjectID'];
        unset($parsed['toObjectID']);

        // @phpstan-ignore-next-line return.type
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
