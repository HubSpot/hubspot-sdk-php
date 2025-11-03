<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects\PartnerServices;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\AssociatedID;
use HubspotSDK\Crm\Objects\PartnerServices\Associations\AssociationDeleteParams;
use HubspotSDK\Crm\Objects\PartnerServices\Associations\AssociationListParams;
use HubspotSDK\Crm\Objects\PartnerServices\Associations\AssociationUpdateParams;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\PartnerServices\AssociationsContract;

use const HubspotSDK\Core\OMIT as omit;

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
     * @param string $partnerServiceID
     * @param string $toObjectType
     * @param string $toObjectID
     *
     * @throws APIException
     */
    public function update(
        string $associationType,
        $partnerServiceID,
        $toObjectType,
        $toObjectID,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations {
        $params = [
            'partnerServiceID' => $partnerServiceID,
            'toObjectType' => $toObjectType,
            'toObjectID' => $toObjectID,
        ];

        return $this->updateRaw($associationType, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $associationType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations {
        [$parsed, $options] = AssociationUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $partnerServiceID = $parsed['partnerServiceID'];
        unset($parsed['partnerServiceID']);
        $toObjectType = $parsed['toObjectType'];
        unset($parsed['toObjectType']);
        $toObjectID = $parsed['toObjectID'];
        unset($parsed['toObjectID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
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
    }

    /**
     * @api
     *
     * List associations of a partner service by type
     *
     * @param string $partnerServiceID
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $includeFa
     * @param int $limit the maximum number of results to display per page
     *
     * @return Page<AssociatedID>
     *
     * @throws APIException
     */
    public function list(
        string $toObjectType,
        $partnerServiceID,
        $after = omit,
        $includeFa = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = [
            'partnerServiceID' => $partnerServiceID,
            'after' => $after,
            'includeFa' => $includeFa,
            'limit' => $limit,
        ];

        return $this->listRaw($toObjectType, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<AssociatedID>
     *
     * @throws APIException
     */
    public function listRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = AssociationListParams::parseRequest(
            $params,
            $requestOptions
        );
        $partnerServiceID = $parsed['partnerServiceID'];
        unset($parsed['partnerServiceID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'crm/v3/objects/partner_services/%1$s/associations/%2$s',
                $partnerServiceID,
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
     * Remove an association between two partner services
     *
     * @param string $partnerServiceID
     * @param string $toObjectType
     * @param string $toObjectID
     *
     * @throws APIException
     */
    public function delete(
        string $associationType,
        $partnerServiceID,
        $toObjectType,
        $toObjectID,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'partnerServiceID' => $partnerServiceID,
            'toObjectType' => $toObjectType,
            'toObjectID' => $toObjectID,
        ];

        return $this->deleteRaw($associationType, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $associationType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = AssociationDeleteParams::parseRequest(
            $params,
            $requestOptions
        );
        $partnerServiceID = $parsed['partnerServiceID'];
        unset($parsed['partnerServiceID']);
        $toObjectType = $parsed['toObjectType'];
        unset($parsed['toObjectType']);
        $toObjectID = $parsed['toObjectID'];
        unset($parsed['toObjectID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
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
    }
}
