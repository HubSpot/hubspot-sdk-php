<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Associations\Schema\V4;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Associations\Schema\V4\CollectionResponseAssociationSpecWithLabel;
use HubspotSDK\Crm\Associations\Schema\V4\Definitions\DefinitionCreateLabelParams;
use HubspotSDK\Crm\Associations\Schema\V4\Definitions\DefinitionDeleteLabelParams;
use HubspotSDK\Crm\Associations\Schema\V4\Definitions\DefinitionListLabelsParams;
use HubspotSDK\Crm\Associations\Schema\V4\Definitions\DefinitionUpdateLabelParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Associations\Schema\V4\DefinitionsRawContract;

final class DefinitionsRawService implements DefinitionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param string $toObjectType Path param:
     * @param array{
     *   fromObjectType: string, label: string, name: string, inverseLabel?: string
     * }|DefinitionCreateLabelParams $params
     *
     * @return BaseResponse<CollectionResponseAssociationSpecWithLabel>
     *
     * @throws APIException
     */
    public function createLabel(
        string $toObjectType,
        array|DefinitionCreateLabelParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DefinitionCreateLabelParams::parseRequest(
            $params,
            $requestOptions,
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'crm/associations/v4/%1$s/%2$s/labels', $fromObjectType, $toObjectType,
            ],
            body: (object) array_diff_key($parsed, array_flip(['fromObjectType'])),
            options: $options,
            convert: CollectionResponseAssociationSpecWithLabel::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   fromObjectType: string, toObjectType: string
     * }|DefinitionDeleteLabelParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteLabel(
        int $associationTypeID,
        array|DefinitionDeleteLabelParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DefinitionDeleteLabelParams::parseRequest(
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
                'crm/associations/v4/%1$s/%2$s/labels/%3$s',
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
     * @param array{fromObjectType: string}|DefinitionListLabelsParams $params
     *
     * @return BaseResponse<CollectionResponseAssociationSpecWithLabel>
     *
     * @throws APIException
     */
    public function listLabels(
        string $toObjectType,
        array|DefinitionListLabelsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DefinitionListLabelsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'crm/associations/v4/%1$s/%2$s/labels', $fromObjectType, $toObjectType,
            ],
            options: $options,
            convert: CollectionResponseAssociationSpecWithLabel::class,
        );
    }

    /**
     * @api
     *
     * @param string $toObjectType Path param:
     * @param array{
     *   fromObjectType: string,
     *   associationTypeID: int,
     *   label: string,
     *   inverseLabel?: string,
     * }|DefinitionUpdateLabelParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function updateLabel(
        string $toObjectType,
        array|DefinitionUpdateLabelParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DefinitionUpdateLabelParams::parseRequest(
            $params,
            $requestOptions,
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: [
                'crm/associations/v4/%1$s/%2$s/labels', $fromObjectType, $toObjectType,
            ],
            body: (object) array_diff_key($parsed, array_flip(['fromObjectType'])),
            options: $options,
            convert: null,
        );
    }
}
