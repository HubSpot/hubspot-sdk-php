<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects\PartnerServices;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\AssociatedID;
use HubspotSDK\Crm\Objects\PartnerServices\Associations\AssociationDeleteParams;
use HubspotSDK\Crm\Objects\PartnerServices\Associations\AssociationListParams;
use HubspotSDK\Crm\Objects\PartnerServices\Associations\AssociationUpdateParams;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\PartnerServices\AssociationsContract;

final class AssociationsService implements AssociationsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Associate a partner service with another object
     *
     * @param array{
     *   partnerServiceID: string, toObjectType: string, toObjectID: string
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
        $partnerServiceID = $parsed['partnerServiceID'];
        unset($parsed['partnerServiceID']);
        $toObjectType = $parsed['toObjectType'];
        unset($parsed['toObjectType']);
        $toObjectID = $parsed['toObjectID'];
        unset($parsed['toObjectID']);

        /** @var BaseResponse<SimplePublicObjectWithAssociations> */
        $response = $this->client->request(
            method: 'put',
            path: [
                'crm/v3/objects/partner_services/%1$s/associations/%2$s/%3$s/%4$s',
                $partnerServiceID,
                $toObjectType,
                $toObjectID,
                $associationType,
            ],
            options: $options,
            convert: SimplePublicObjectWithAssociations::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * List associations of a partner service by type
     *
     * @param array{
     *   partnerServiceID: string, after?: string, includeFa?: bool, limit?: int
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
        $partnerServiceID = $parsed['partnerServiceID'];
        unset($parsed['partnerServiceID']);

        /** @var BaseResponse<Page<AssociatedID>> */
        $response = $this->client->request(
            method: 'get',
            path: [
                'crm/v3/objects/partner_services/%1$s/associations/%2$s',
                $partnerServiceID,
                $toObjectType,
            ],
            query: Util::array_transform_keys($parsed, ['includeFa' => 'includeFA']),
            options: $options,
            convert: AssociatedID::class,
            page: Page::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Remove an association between two partner services
     *
     * @param array{
     *   partnerServiceID: string, toObjectType: string, toObjectID: string
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
        $partnerServiceID = $parsed['partnerServiceID'];
        unset($parsed['partnerServiceID']);
        $toObjectType = $parsed['toObjectType'];
        unset($parsed['toObjectType']);
        $toObjectID = $parsed['toObjectID'];
        unset($parsed['toObjectID']);

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: [
                'crm/v3/objects/partner_services/%1$s/associations/%2$s/%3$s/%4$s',
                $partnerServiceID,
                $toObjectType,
                $toObjectID,
                $associationType,
            ],
            options: $options,
            convert: null,
        );

        return $response->parse();
    }
}
