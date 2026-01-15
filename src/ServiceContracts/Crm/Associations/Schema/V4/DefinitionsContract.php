<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Associations\Schema\V4;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Associations\Schema\V4\CollectionResponseAssociationSpecWithLabel;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface DefinitionsContract
{
    /**
     * @api
     *
     * @param string $toObjectType Path param
     * @param string $fromObjectType Path param
     * @param string $label Body param
     * @param string $name Body param
     * @param string $inverseLabel Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createLabel(
        string $toObjectType,
        string $fromObjectType,
        string $label,
        string $name,
        ?string $inverseLabel = null,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponseAssociationSpecWithLabel;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteLabel(
        int $associationTypeID,
        string $fromObjectType,
        string $toObjectType,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listLabels(
        string $toObjectType,
        string $fromObjectType,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponseAssociationSpecWithLabel;

    /**
     * @api
     *
     * @param string $toObjectType Path param
     * @param string $fromObjectType Path param
     * @param int $associationTypeID Body param
     * @param string $label Body param
     * @param string $inverseLabel Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateLabel(
        string $toObjectType,
        string $fromObjectType,
        int $associationTypeID,
        string $label,
        ?string $inverseLabel = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
