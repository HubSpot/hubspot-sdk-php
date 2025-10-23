<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM\Associations\Schema\V4;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Associations\Schema\V4\CollectionResponseAssociationSpecWithLabelNoPaging;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface DefinitionsContract
{
    /**
     * @api
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
    ): CollectionResponseAssociationSpecWithLabelNoPaging;

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
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseAssociationSpecWithLabelNoPaging;

    /**
     * @api
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
    ): mixed;

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
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $fromObjectType
     *
     * @throws APIException
     */
    public function list(
        string $toObjectType,
        $fromObjectType,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseAssociationSpecWithLabelNoPaging;

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
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseAssociationSpecWithLabelNoPaging;

    /**
     * @api
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
    ): mixed;

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
    ): mixed;
}
