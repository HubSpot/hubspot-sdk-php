<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm\AssociationsSchema;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\AssociationsSchema\BatchResponsePublicAssociationDefinitionUserConfiguration;
use HubSpotSDK\Crm\AssociationsSchema\CollectionResponseAssociationSpecWithLabelNoPaging;
use HubSpotSDK\Crm\AssociationsSchema\Labels\LabelBatchCreateParams;
use HubSpotSDK\Crm\AssociationsSchema\Labels\LabelCreateLabelParams;
use HubSpotSDK\Crm\AssociationsSchema\Labels\LabelDeleteLabelParams;
use HubSpotSDK\Crm\AssociationsSchema\Labels\LabelListLabelsParams;
use HubSpotSDK\Crm\AssociationsSchema\Labels\LabelUpdateLabelParams;
use HubSpotSDK\Crm\AssociationsSchema\PublicAssociationDefinitionConfigurationCreateRequest;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\AssociationsSchema\LabelsRawContract;

/**
 * @phpstan-import-type PublicAssociationDefinitionConfigurationCreateRequestShape from \HubSpotSDK\Crm\AssociationsSchema\PublicAssociationDefinitionConfigurationCreateRequest
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class LabelsRawService implements LabelsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Batch configure association limits between two object types.
     *
     * @param string $toObjectType Path param
     * @param array{
     *   fromObjectType: string,
     *   inputs: list<PublicAssociationDefinitionConfigurationCreateRequest|PublicAssociationDefinitionConfigurationCreateRequestShape>,
     * }|LabelBatchCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePublicAssociationDefinitionUserConfiguration>
     *
     * @throws APIException
     */
    public function batchCreate(
        string $toObjectType,
        array|LabelBatchCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LabelBatchCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'crm/associations/2026-03/definitions/configurations/%1$s/%2$s/batch/create',
                $fromObjectType,
                $toObjectType,
            ],
            body: (object) array_diff_key($parsed, array_flip(['fromObjectType'])),
            options: $options,
            convert: BatchResponsePublicAssociationDefinitionUserConfiguration::class,
        );
    }

    /**
     * @api
     *
     * Create a new label that describes the relationship between two specified CRM object types. This can help in categorizing and managing associations more effectively.
     *
     * @param string $toObjectType Path param
     * @param array{
     *   fromObjectType: string, label: string, name: string, inverseLabel?: string
     * }|LabelCreateLabelParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseAssociationSpecWithLabelNoPaging>
     *
     * @throws APIException
     */
    public function createLabel(
        string $toObjectType,
        array|LabelCreateLabelParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LabelCreateLabelParams::parseRequest(
            $params,
            $requestOptions,
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'crm/associations/2026-03/%1$s/%2$s/labels',
                $fromObjectType,
                $toObjectType,
            ],
            body: (object) array_diff_key($parsed, array_flip(['fromObjectType'])),
            options: $options,
            convert: CollectionResponseAssociationSpecWithLabelNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Remove a specific label from the association between two CRM object types.
     *
     * @param array{
     *   fromObjectType: string, toObjectType: string
     * }|LabelDeleteLabelParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteLabel(
        int $associationTypeID,
        array|LabelDeleteLabelParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LabelDeleteLabelParams::parseRequest(
            $params,
            $requestOptions,
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);
        $toObjectType = $parsed['toObjectType'];
        unset($parsed['toObjectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'crm/associations/2026-03/%1$s/%2$s/labels/%3$s',
                $fromObjectType,
                $toObjectType,
                $associationTypeID,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve all labels that describe the relationships between two specified CRM object types. These labels provide context about the nature of the associations.
     *
     * @param array{fromObjectType: string}|LabelListLabelsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseAssociationSpecWithLabelNoPaging>
     *
     * @throws APIException
     */
    public function listLabels(
        string $toObjectType,
        array|LabelListLabelsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LabelListLabelsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'crm/associations/2026-03/%1$s/%2$s/labels',
                $fromObjectType,
                $toObjectType,
            ],
            options: $options,
            convert: CollectionResponseAssociationSpecWithLabelNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Update an existing label that describes the relationship between two specified CRM object types. This allows for modifications to existing association labels to better reflect the nature of the relationship.
     *
     * @param string $toObjectType Path param
     * @param array{
     *   fromObjectType: string,
     *   associationTypeID: int,
     *   label: string,
     *   inverseLabel?: string,
     * }|LabelUpdateLabelParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function updateLabel(
        string $toObjectType,
        array|LabelUpdateLabelParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LabelUpdateLabelParams::parseRequest(
            $params,
            $requestOptions,
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: [
                'crm/associations/2026-03/%1$s/%2$s/labels',
                $fromObjectType,
                $toObjectType,
            ],
            body: (object) array_diff_key($parsed, array_flip(['fromObjectType'])),
            options: $options,
            convert: null,
        );
    }
}
