<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Associations;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Associations\Schema\CollectionResponsePublicAssociationDefinitionNoPaging;
use HubspotSDK\Crm\Associations\Schema\SchemaListParams;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface SchemaRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SchemaListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePublicAssociationDefinitionNoPaging>
     *
     * @throws APIException
     */
    public function list(
        string $toObjectType,
        array|SchemaListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
