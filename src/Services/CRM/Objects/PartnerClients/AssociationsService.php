<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Objects\PartnerClients;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\AssociatedID;
use HubspotSDK\CRM\Objects\PartnerClients\Associations\AssociationDeleteParams;
use HubspotSDK\CRM\Objects\PartnerClients\Associations\AssociationListParams;
use HubspotSDK\CRM\Objects\PartnerClients\Associations\AssociationUpdateParams;
use HubspotSDK\CRM\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\Objects\PartnerClients\AssociationsContract;

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
     * Associate a partner client with another object
     *
     * @param string $partnerClientID
     * @param string $toObjectType
     * @param string $toObjectID
     *
     * @throws APIException
     */
    public function update(
        string $associationType,
        $partnerClientID,
        $toObjectType,
        $toObjectID,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations {
        $params = [
            'partnerClientID' => $partnerClientID,
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
        $partnerClientID = $parsed['partnerClientID'];
        unset($parsed['partnerClientID']);
        $toObjectType = $parsed['toObjectType'];
        unset($parsed['toObjectType']);
        $toObjectID = $parsed['toObjectID'];
        unset($parsed['toObjectID']);

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
     * @param string $partnerClientID
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
        $partnerClientID,
        $after = omit,
        $includeFa = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = [
            'partnerClientID' => $partnerClientID,
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
        $partnerClientID = $parsed['partnerClientID'];
        unset($parsed['partnerClientID']);

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
     * @param string $partnerClientID
     * @param string $toObjectType
     * @param string $toObjectID
     *
     * @throws APIException
     */
    public function delete(
        string $associationType,
        $partnerClientID,
        $toObjectType,
        $toObjectID,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'partnerClientID' => $partnerClientID,
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
        $partnerClientID = $parsed['partnerClientID'];
        unset($parsed['partnerClientID']);
        $toObjectType = $parsed['toObjectType'];
        unset($parsed['toObjectType']);
        $toObjectID = $parsed['toObjectID'];
        unset($parsed['toObjectID']);

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
