<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Associations;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Associations\Schema\CollectionResponsePublicAssociationDefinitionNoPaging;
use HubspotSDK\Crm\Associations\Schema\SchemaListParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Associations\SchemaRawContract;

final class SchemaRawService implements SchemaRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{fromObjectType: string}|SchemaListParams $params
     *
     * @return BaseResponse<CollectionResponsePublicAssociationDefinitionNoPaging>
     *
     * @throws APIException
     */
    public function list(
        string $toObjectType,
        array|SchemaListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SchemaListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'crm/v3/associations/%1$s/%2$s/types', $fromObjectType, $toObjectType,
            ],
            options: $options,
            convert: CollectionResponsePublicAssociationDefinitionNoPaging::class,
        );
    }
}
