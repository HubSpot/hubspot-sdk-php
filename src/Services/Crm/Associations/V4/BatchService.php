<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Associations\V4;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Associations\V4\Batch\BatchCreateDefaultParams;
use HubspotSDK\Crm\Associations\V4\Batch\BatchCreateParams;
use HubspotSDK\Crm\Associations\V4\Batch\BatchDeleteLabelsParams;
use HubspotSDK\Crm\Associations\V4\Batch\BatchDeleteParams;
use HubspotSDK\Crm\Associations\V4\Batch\BatchGetParams;
use HubspotSDK\Crm\Associations\V4\BatchResponseLabelsBetweenObjectPair;
use HubspotSDK\Crm\Associations\V4\BatchResponsePublicAssociationMultiWithLabel;
use HubspotSDK\Crm\Associations\V4\BatchResponseVoid;
use HubspotSDK\Crm\BatchResponsePublicDefaultAssociation;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Associations\V4\BatchContract;

final class BatchService implements BatchContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Batch create associations for objects
     *
     * @param array{
     *   fromObjectType: string,
     *   inputs: list<array{
     *     from: array<mixed>|PublicObjectID,
     *     to: array<mixed>|PublicObjectID,
     *     types: list<array<mixed>|AssociationSpec>,
     *   }>,
     * }|BatchCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $toObjectType,
        array|BatchCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseLabelsBetweenObjectPair {
        [$parsed, $options] = BatchCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'crm/v4/associations/%1$s/%2$s/batch/create',
                $fromObjectType,
                $toObjectType,
            ],
            body: (object) array_diff_key($parsed, ['fromObjectType']),
            options: $options,
            convert: BatchResponseLabelsBetweenObjectPair::class,
        );
    }

    /**
     * @api
     *
     * Batch delete associations for objects
     *
     * @param array{
     *   fromObjectType: string,
     *   inputs: list<array{
     *     from: array<mixed>|PublicObjectID, to: list<array<mixed>|PublicObjectID>
     *   }>,
     * }|BatchDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $toObjectType,
        array|BatchDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseVoid {
        [$parsed, $options] = BatchDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'crm/v4/associations/%1$s/%2$s/batch/archive',
                $fromObjectType,
                $toObjectType,
            ],
            body: (object) array_diff_key($parsed, ['fromObjectType']),
            options: $options,
            convert: BatchResponseVoid::class,
        );
    }

    /**
     * @api
     *
     * Create the default (most generic) association type between two object types
     *
     * @param array{
     *   fromObjectType: string,
     *   inputs: list<array{
     *     from: array<mixed>|PublicObjectID, to: array<mixed>|PublicObjectID
     *   }>,
     * }|BatchCreateDefaultParams $params
     *
     * @throws APIException
     */
    public function createDefault(
        string $toObjectType,
        array|BatchCreateDefaultParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicDefaultAssociation {
        [$parsed, $options] = BatchCreateDefaultParams::parseRequest(
            $params,
            $requestOptions,
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'crm/v4/associations/%1$s/%2$s/batch/associate/default',
                $fromObjectType,
                $toObjectType,
            ],
            body: (object) array_diff_key($parsed, ['fromObjectType']),
            options: $options,
            convert: BatchResponsePublicDefaultAssociation::class,
        );
    }

    /**
     * @api
     *
     * Batch delete specific association labels for objects. Deleting an unlabeled association will also delete all labeled associations between those two objects
     *
     * @param array{
     *   fromObjectType: string,
     *   inputs: list<array{
     *     from: array<mixed>|PublicObjectID,
     *     to: array<mixed>|PublicObjectID,
     *     types: list<array<mixed>|AssociationSpec>,
     *   }>,
     * }|BatchDeleteLabelsParams $params
     *
     * @throws APIException
     */
    public function deleteLabels(
        string $toObjectType,
        array|BatchDeleteLabelsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseVoid {
        [$parsed, $options] = BatchDeleteLabelsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'crm/v4/associations/%1$s/%2$s/batch/labels/archive',
                $fromObjectType,
                $toObjectType,
            ],
            body: (object) array_diff_key($parsed, ['fromObjectType']),
            options: $options,
            convert: BatchResponseVoid::class,
        );
    }

    /**
     * @api
     *
     * Batch read associations for objects to specific object type. The 'after' field in a returned paging object  can be added alongside the 'id' to retrieve the next page of associations from that objectId. The 'link' field is deprecated and should be ignored. Note: The 'paging' field will only be present if there are more pages and absent otherwise.
     *
     * @param array{
     *   fromObjectType: string, inputs: list<array{id: string, after?: string}>
     * }|BatchGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $toObjectType,
        array|BatchGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicAssociationMultiWithLabel {
        [$parsed, $options] = BatchGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'crm/v4/associations/%1$s/%2$s/batch/read',
                $fromObjectType,
                $toObjectType,
            ],
            body: (object) array_diff_key($parsed, ['fromObjectType']),
            options: $options,
            convert: BatchResponsePublicAssociationMultiWithLabel::class,
        );
    }
}
