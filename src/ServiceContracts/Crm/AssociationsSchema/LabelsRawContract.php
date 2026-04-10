<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm\AssociationsSchema;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\AssociationsSchema\BatchResponsePublicAssociationDefinitionUserConfiguration;
use HubSpotSDK\Crm\AssociationsSchema\CollectionResponseAssociationSpecWithLabelNoPaging;
use HubSpotSDK\Crm\AssociationsSchema\Labels\LabelBatchCreateParams;
use HubSpotSDK\Crm\AssociationsSchema\Labels\LabelCreateLabelParams;
use HubSpotSDK\Crm\AssociationsSchema\Labels\LabelDeleteLabelParams;
use HubSpotSDK\Crm\AssociationsSchema\Labels\LabelListLabelsParams;
use HubSpotSDK\Crm\AssociationsSchema\Labels\LabelUpdateLabelParams;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface LabelsRawContract
{
    /**
     * @api
     *
     * @param string $toObjectType Path param
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
     * @param string $toObjectType Path param
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
     * @param string $toObjectType Path param
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
