<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm\AssociationsSchema;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Crm\AssociationsSchema\BatchResponsePublicAssociationDefinitionUserConfiguration;
use HubSpotSDK\Crm\AssociationsSchema\CollectionResponseAssociationSpecWithLabelNoPaging;
use HubSpotSDK\Crm\AssociationsSchema\PublicAssociationDefinitionConfigurationCreateRequest;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\AssociationsSchema\LabelsContract;

/**
 * @phpstan-import-type PublicAssociationDefinitionConfigurationCreateRequestShape from \HubSpotSDK\Crm\AssociationsSchema\PublicAssociationDefinitionConfigurationCreateRequest
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class LabelsService implements LabelsContract
{
    /**
     * @api
     */
    public LabelsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new LabelsRawService($client);
    }

    /**
     * @api
     *
     * Batch configure association limits between two object types.
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
    ): BatchResponsePublicAssociationDefinitionUserConfiguration {
        $params = Util::removeNulls(
            ['fromObjectType' => $fromObjectType, 'inputs' => $inputs]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->batchCreate($toObjectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a new label that describes the relationship between two specified CRM object types. This can help in categorizing and managing associations more effectively.
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
    ): CollectionResponseAssociationSpecWithLabelNoPaging {
        $params = Util::removeNulls(
            [
                'fromObjectType' => $fromObjectType,
                'label' => $label,
                'name' => $name,
                'inverseLabel' => $inverseLabel,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createLabel($toObjectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Remove a specific label from the association between two CRM object types.
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
    ): mixed {
        $params = Util::removeNulls(
            ['fromObjectType' => $fromObjectType, 'toObjectType' => $toObjectType]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteLabel($associationTypeID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve all labels that describe the relationships between two specified CRM object types. These labels provide context about the nature of the associations.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listLabels(
        string $toObjectType,
        string $fromObjectType,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponseAssociationSpecWithLabelNoPaging {
        $params = Util::removeNulls(['fromObjectType' => $fromObjectType]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listLabels($toObjectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an existing label that describes the relationship between two specified CRM object types. This allows for modifications to existing association labels to better reflect the nature of the relationship.
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
    ): mixed {
        $params = Util::removeNulls(
            [
                'fromObjectType' => $fromObjectType,
                'associationTypeID' => $associationTypeID,
                'label' => $label,
                'inverseLabel' => $inverseLabel,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateLabel($toObjectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
