<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Associations\Schema\V4;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Associations\Schema\V4\CollectionResponseAssociationSpecWithLabel;
use HubspotSDK\Crm\Associations\Schema\V4\Definitions\DefinitionCreateLabelParams;
use HubspotSDK\Crm\Associations\Schema\V4\Definitions\DefinitionDeleteLabelParams;
use HubspotSDK\Crm\Associations\Schema\V4\Definitions\DefinitionListLabelsParams;
use HubspotSDK\Crm\Associations\Schema\V4\Definitions\DefinitionUpdateLabelParams;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface DefinitionsRawContract
{
    /**
     * @api
     *
     * @param string $toObjectType Path param
     * @param array<string,mixed>|DefinitionCreateLabelParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseAssociationSpecWithLabel>
     *
     * @throws APIException
     */
    public function createLabel(
        string $toObjectType,
        array|DefinitionCreateLabelParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|DefinitionDeleteLabelParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteLabel(
        int $associationTypeID,
        array|DefinitionDeleteLabelParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|DefinitionListLabelsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseAssociationSpecWithLabel>
     *
     * @throws APIException
     */
    public function listLabels(
        string $toObjectType,
        array|DefinitionListLabelsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $toObjectType Path param
     * @param array<string,mixed>|DefinitionUpdateLabelParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function updateLabel(
        string $toObjectType,
        array|DefinitionUpdateLabelParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
