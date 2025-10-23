<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Associations\Schema\V4;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Associations\Schema\V4\CollectionResponseAssociationSpecWithLabelNoPaging;
use HubspotSDK\CRM\Associations\Schema\V4\Definitions\DefinitionCreateParams;
use HubspotSDK\CRM\Associations\Schema\V4\Definitions\DefinitionDeleteParams;
use HubspotSDK\CRM\Associations\Schema\V4\Definitions\DefinitionListParams;
use HubspotSDK\CRM\Associations\Schema\V4\Definitions\DefinitionUpdateParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\Associations\Schema\V4\DefinitionsContract;

use const HubspotSDK\Core\OMIT as omit;

final class DefinitionsService implements DefinitionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a user defined association definition
     *
     * @param string $fromObjectType
     * @param string $label
     * @param string $name
     * @param string $inverseLabel
     *
     * @throws APIException
     */
    public function create(
        string $toObjectType,
        $fromObjectType,
        $label,
        $name,
        $inverseLabel = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseAssociationSpecWithLabelNoPaging {
        $params = [
            'fromObjectType' => $fromObjectType,
            'label' => $label,
            'name' => $name,
            'inverseLabel' => $inverseLabel,
        ];

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
    ): CollectionResponseAssociationSpecWithLabelNoPaging {
        [$parsed, $options] = DefinitionCreateParams::parseRequest(
            $params,
            $requestOptions
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'crm/v4/associations/%1$s/%2$s/labels', $fromObjectType, $toObjectType,
            ],
            body: (object) array_diff_key($parsed, ['fromObjectType']),
            options: $options,
            convert: CollectionResponseAssociationSpecWithLabelNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Update a user defined association definition
     *
     * @param string $fromObjectType
     * @param int $associationTypeID
     * @param string $label
     * @param string $inverseLabel
     *
     * @throws APIException
     */
    public function update(
        string $toObjectType,
        $fromObjectType,
        $associationTypeID,
        $label,
        $inverseLabel = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'fromObjectType' => $fromObjectType,
            'associationTypeID' => $associationTypeID,
            'label' => $label,
            'inverseLabel' => $inverseLabel,
        ];

        return $this->updateRaw($toObjectType, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = DefinitionUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: [
                'crm/v4/associations/%1$s/%2$s/labels', $fromObjectType, $toObjectType,
            ],
            body: (object) array_diff_key($parsed, ['fromObjectType']),
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Returns all association types between two object types
     *
     * @param string $fromObjectType
     *
     * @throws APIException
     */
    public function list(
        string $toObjectType,
        $fromObjectType,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseAssociationSpecWithLabelNoPaging {
        $params = ['fromObjectType' => $fromObjectType];

        return $this->listRaw($toObjectType, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseAssociationSpecWithLabelNoPaging {
        [$parsed, $options] = DefinitionListParams::parseRequest(
            $params,
            $requestOptions
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'crm/v4/associations/%1$s/%2$s/labels', $fromObjectType, $toObjectType,
            ],
            options: $options,
            convert: CollectionResponseAssociationSpecWithLabelNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Deletes an association definition
     *
     * @param string $fromObjectType
     * @param string $toObjectType
     *
     * @throws APIException
     */
    public function delete(
        int $associationTypeID,
        $fromObjectType,
        $toObjectType,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'fromObjectType' => $fromObjectType, 'toObjectType' => $toObjectType,
        ];

        return $this->deleteRaw($associationTypeID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        int $associationTypeID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = DefinitionDeleteParams::parseRequest(
            $params,
            $requestOptions
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);
        $toObjectType = $parsed['toObjectType'];
        unset($parsed['toObjectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: [
                'crm/v4/associations/%1$s/%2$s/labels/%3$s',
                $fromObjectType,
                $toObjectType,
                $associationTypeID,
            ],
            options: $options,
            convert: null,
        );
    }
}
