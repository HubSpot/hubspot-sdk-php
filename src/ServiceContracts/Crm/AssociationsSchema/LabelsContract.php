<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\AssociationsSchema;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\AssociationsSchema\BatchResponsePublicAssociationDefinitionUserConfiguration;
use HubspotSDK\Crm\AssociationsSchema\CollectionResponseAssociationSpecWithLabelNoPaging;
use HubspotSDK\Crm\AssociationsSchema\PublicAssociationDefinitionConfigurationCreateRequest;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type PublicAssociationDefinitionConfigurationCreateRequestShape from \HubspotSDK\Crm\AssociationsSchema\PublicAssociationDefinitionConfigurationCreateRequest
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface LabelsContract
{
    /**
     * @api
     *
     * @param string $toObjectType Path param
     * @param string $fromObjectType Path param
     * @param list<PublicAssociationDefinitionConfigurationCreateRequest|PublicAssociationDefinitionConfigurationCreateRequestShape> $inputs Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function batchCreate(
        string $toObjectType,
        string $fromObjectType,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponsePublicAssociationDefinitionUserConfiguration;

    /**
     * @api
     *
     * @param string $toObjectType Path param
     * @param string $fromObjectType Path param
     * @param string $label body param: A descriptor that provides context about the relationship between two associated CRM objects
     * @param string $name body param: The unique identifier for the association definition
     * @param string $inverseLabel body param: An optional descriptor that clarifies the reverse relationship in the association
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
    ): CollectionResponseAssociationSpecWithLabelNoPaging;

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
    ): CollectionResponseAssociationSpecWithLabelNoPaging;

    /**
     * @api
     *
     * @param string $toObjectType Path param
     * @param string $fromObjectType Path param
     * @param int $associationTypeID body param: The unique identifier for the association type
     * @param string $label body param: A descriptor that provides context about the relationship between associated records
     * @param string $inverseLabel body param: An optional descriptor for the inverse relationship between associated records
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
