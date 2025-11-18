<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Associations\Schema\V4;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Associations\Schema\V4\CollectionResponseAssociationSpecWithLabel;
use HubspotSDK\Crm\Associations\Schema\V4\Definitions\DefinitionCreateLabelParams;
use HubspotSDK\Crm\Associations\Schema\V4\Definitions\DefinitionDeleteLabelParams;
use HubspotSDK\Crm\Associations\Schema\V4\Definitions\DefinitionListLabelsParams;
use HubspotSDK\Crm\Associations\Schema\V4\Definitions\DefinitionUpdateLabelParams;
use HubspotSDK\RequestOptions;

interface DefinitionsContract
{
    /**
     * @api
     *
     * @param array<mixed>|DefinitionCreateLabelParams $params
     *
     * @throws APIException
     */
    public function createLabel(
        string $toObjectType,
        array|DefinitionCreateLabelParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseAssociationSpecWithLabel;

    /**
     * @api
     *
     * @param array<mixed>|DefinitionDeleteLabelParams $params
     *
     * @throws APIException
     */
    public function deleteLabel(
        int $associationTypeID,
        array|DefinitionDeleteLabelParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|DefinitionListLabelsParams $params
     *
     * @throws APIException
     */
    public function listLabels(
        string $toObjectType,
        array|DefinitionListLabelsParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseAssociationSpecWithLabel;

    /**
     * @api
     *
     * @param array<mixed>|DefinitionUpdateLabelParams $params
     *
     * @throws APIException
     */
    public function updateLabel(
        string $toObjectType,
        array|DefinitionUpdateLabelParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
