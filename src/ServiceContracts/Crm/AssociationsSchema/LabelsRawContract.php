<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\AssociationsSchema;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\AssociationsSchema\BatchResponsePublicAssociationDefinitionUserConfiguration;
use HubspotSDK\Crm\AssociationsSchema\CollectionResponseAssociationSpecWithLabelNoPaging;
use HubspotSDK\Crm\AssociationsSchema\Labels\LabelBatchCreateParams;
use HubspotSDK\Crm\AssociationsSchema\Labels\LabelCreateLabelParams;
use HubspotSDK\Crm\AssociationsSchema\Labels\LabelDeleteLabelParams;
use HubspotSDK\Crm\AssociationsSchema\Labels\LabelListLabelsParams;
use HubspotSDK\Crm\AssociationsSchema\Labels\LabelUpdateLabelParams;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface LabelsRawContract
{
    /**
     * @api
     *
     * @param string $toObjectType path param: The type of the target object in the association
     * @param array<string,mixed>|LabelBatchCreateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $toObjectType path param: The type of the target object in the association
     * @param array<string,mixed>|LabelCreateLabelParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $associationTypeID the unique identifier for the association type
     * @param array<string,mixed>|LabelDeleteLabelParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $toObjectType the type of the target object in the association
     * @param array<string,mixed>|LabelListLabelsParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $toObjectType path param: The type of the target object in the association
     * @param array<string,mixed>|LabelUpdateLabelParams $params
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
    ): BaseResponse;
}
