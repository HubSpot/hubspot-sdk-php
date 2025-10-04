<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Associations\AssociationCreateParams;
use HubspotSDK\CRM\Associations\AssociationDeleteParams;
use HubspotSDK\CRM\Associations\AssociationReadParams;
use HubspotSDK\CRM\Associations\CRMAssociationsBatchResponsePublicAssociation;
use HubspotSDK\CRM\Associations\CRMAssociationsBatchResponsePublicAssociationMulti;
use HubspotSDK\CRM\Associations\CRMAssociationsPublicAssociation;
use HubspotSDK\CRM\CRMPublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\AssociationsContract;
use HubspotSDK\Services\CRM\Associations\V4Service;

final class AssociationsService implements AssociationsContract
{
    /**
     * @@api
     */
    public V4Service $v4;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->v4 = new V4Service($client);
    }

    /**
     * @api
     *
     * Create a batch of associations
     *
     * @param string $fromObjectType
     * @param list<CRMAssociationsPublicAssociation> $inputs
     *
     * @throws APIException
     */
    public function create(
        string $toObjectType,
        $fromObjectType,
        $inputs,
        ?RequestOptions $requestOptions = null,
    ): CRMAssociationsBatchResponsePublicAssociation {
        $params = ['fromObjectType' => $fromObjectType, 'inputs' => $inputs];

        return $this->createRaw($toObjectType, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CRMAssociationsBatchResponsePublicAssociation {
        [$parsed, $options] = AssociationCreateParams::parseRequest(
            $params,
            $requestOptions
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'crm/v3/associations/%1$s/%2$s/batch/create',
                $fromObjectType,
                $toObjectType,
            ],
            body: (object) array_diff_key($parsed, ['fromObjectType']),
            options: $options,
            convert: CRMAssociationsBatchResponsePublicAssociation::class,
        );
    }

    /**
     * @api
     *
     * Archive a batch of associations
     *
     * @param string $fromObjectType
     * @param list<CRMAssociationsPublicAssociation> $inputs
     *
     * @throws APIException
     */
    public function delete(
        string $toObjectType,
        $fromObjectType,
        $inputs,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = ['fromObjectType' => $fromObjectType, 'inputs' => $inputs];

        return $this->deleteRaw($toObjectType, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = AssociationDeleteParams::parseRequest(
            $params,
            $requestOptions
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'crm/v3/associations/%1$s/%2$s/batch/archive',
                $fromObjectType,
                $toObjectType,
            ],
            body: (object) array_diff_key($parsed, ['fromObjectType']),
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Read a batch of associations
     *
     * @param string $fromObjectType
     * @param list<CRMPublicObjectID> $inputs
     *
     * @throws APIException
     */
    public function read(
        string $toObjectType,
        $fromObjectType,
        $inputs,
        ?RequestOptions $requestOptions = null,
    ): CRMAssociationsBatchResponsePublicAssociationMulti {
        $params = ['fromObjectType' => $fromObjectType, 'inputs' => $inputs];

        return $this->readRaw($toObjectType, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function readRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CRMAssociationsBatchResponsePublicAssociationMulti {
        [$parsed, $options] = AssociationReadParams::parseRequest(
            $params,
            $requestOptions
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'crm/v3/associations/%1$s/%2$s/batch/read',
                $fromObjectType,
                $toObjectType,
            ],
            body: (object) array_diff_key($parsed, ['fromObjectType']),
            options: $options,
            convert: CRMAssociationsBatchResponsePublicAssociationMulti::class,
        );
    }
}
