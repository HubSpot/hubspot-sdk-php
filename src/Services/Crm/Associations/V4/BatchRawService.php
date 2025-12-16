<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Associations\V4;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Associations\BatchResponseVoid;
use HubspotSDK\Crm\Associations\V4\Batch\BatchCreateDefaultParams;
use HubspotSDK\Crm\Associations\V4\Batch\BatchCreateParams;
use HubspotSDK\Crm\Associations\V4\Batch\BatchDeleteLabelsParams;
use HubspotSDK\Crm\Associations\V4\Batch\BatchDeleteParams;
use HubspotSDK\Crm\Associations\V4\Batch\BatchGetParams;
use HubspotSDK\Crm\Associations\V4\BatchResponseLabelsBetweenObjectPair;
use HubspotSDK\Crm\Associations\V4\BatchResponsePublicAssociationMultiWithLabel;
use HubspotSDK\Crm\BatchResponsePublicDefaultAssociation;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Associations\V4\BatchRawContract;

final class BatchRawService implements BatchRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Batch create associations for objects
     *
     * @param string $toObjectType Path param: The type of the to Object
     * @param array{
     *   fromObjectType: string,
     *   inputs: list<array{
     *     from: array<string,mixed>|PublicObjectID,
     *     to: array<string,mixed>|PublicObjectID,
     *     types: list<array<string,mixed>|AssociationSpec>,
     *   }>,
     * }|BatchCreateParams $params
     *
     * @return BaseResponse<BatchResponseLabelsBetweenObjectPair>
     *
     * @throws APIException
     */
    public function create(
        string $toObjectType,
        array|BatchCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'crm/v4/associations/%1$s/%2$s/batch/create',
                $fromObjectType,
                $toObjectType,
            ],
            body: (object) array_diff_key($parsed, array_flip(['fromObjectType'])),
            options: $options,
            convert: BatchResponseLabelsBetweenObjectPair::class,
        );
    }

    /**
     * @api
     *
     * Batch delete associations for objects
     *
     * @param string $toObjectType path param: Specifies the type of the target object in the batch association deletion
     * @param array{
     *   fromObjectType: string,
     *   inputs: list<array{
     *     from: array<string,mixed>|PublicObjectID,
     *     to: list<array<string,mixed>|PublicObjectID>,
     *   }>,
     * }|BatchDeleteParams $params
     *
     * @return BaseResponse<BatchResponseVoid>
     *
     * @throws APIException
     */
    public function delete(
        string $toObjectType,
        array|BatchDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'crm/v4/associations/%1$s/%2$s/batch/archive',
                $fromObjectType,
                $toObjectType,
            ],
            body: (object) array_diff_key($parsed, array_flip(['fromObjectType'])),
            options: $options,
            convert: BatchResponseVoid::class,
        );
    }

    /**
     * @api
     *
     * Create the default (most generic) association type between two object types
     *
     * @param string $toObjectType path param: Specifies the type of the target object in the association
     * @param array{
     *   fromObjectType: string,
     *   inputs: list<array{
     *     from: array<string,mixed>|PublicObjectID,
     *     to: array<string,mixed>|PublicObjectID,
     *   }>,
     * }|BatchCreateDefaultParams $params
     *
     * @return BaseResponse<BatchResponsePublicDefaultAssociation>
     *
     * @throws APIException
     */
    public function createDefault(
        string $toObjectType,
        array|BatchCreateDefaultParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchCreateDefaultParams::parseRequest(
            $params,
            $requestOptions,
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'crm/v4/associations/%1$s/%2$s/batch/associate/default',
                $fromObjectType,
                $toObjectType,
            ],
            body: (object) array_diff_key($parsed, array_flip(['fromObjectType'])),
            options: $options,
            convert: BatchResponsePublicDefaultAssociation::class,
        );
    }

    /**
     * @api
     *
     * Batch delete specific association labels for objects. Deleting an unlabeled association will also delete all labeled associations between those two objects
     *
     * @param string $toObjectType Path param: The type of the to Object
     * @param array{
     *   fromObjectType: string,
     *   inputs: list<array{
     *     from: array<string,mixed>|PublicObjectID,
     *     to: array<string,mixed>|PublicObjectID,
     *     types: list<array<string,mixed>|AssociationSpec>,
     *   }>,
     * }|BatchDeleteLabelsParams $params
     *
     * @return BaseResponse<BatchResponseVoid>
     *
     * @throws APIException
     */
    public function deleteLabels(
        string $toObjectType,
        array|BatchDeleteLabelsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchDeleteLabelsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'crm/v4/associations/%1$s/%2$s/batch/labels/archive',
                $fromObjectType,
                $toObjectType,
            ],
            body: (object) array_diff_key($parsed, array_flip(['fromObjectType'])),
            options: $options,
            convert: BatchResponseVoid::class,
        );
    }

    /**
     * @api
     *
     * Batch read associations for objects to specific object type. The 'after' field in a returned paging object  can be added alongside the 'id' to retrieve the next page of associations from that objectId. The 'link' field is deprecated and should be ignored. Note: The 'paging' field will only be present if there are more pages and absent otherwise.
     *
     * @param string $toObjectType Path param: The type of the to Object
     * @param array{
     *   fromObjectType: string, inputs: list<array{id: string, after?: string}>
     * }|BatchGetParams $params
     *
     * @return BaseResponse<BatchResponsePublicAssociationMultiWithLabel>
     *
     * @throws APIException
     */
    public function get(
        string $toObjectType,
        array|BatchGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'crm/v4/associations/%1$s/%2$s/batch/read',
                $fromObjectType,
                $toObjectType,
            ],
            body: (object) array_diff_key($parsed, array_flip(['fromObjectType'])),
            options: $options,
            convert: BatchResponsePublicAssociationMultiWithLabel::class,
        );
    }
}
