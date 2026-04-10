<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm\Associations;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Associations\Batch\BatchCreateDefaultParams;
use HubSpotSDK\Crm\Associations\Batch\BatchCreateParams;
use HubSpotSDK\Crm\Associations\Batch\BatchDeleteLabelsParams;
use HubSpotSDK\Crm\Associations\Batch\BatchDeleteParams;
use HubSpotSDK\Crm\Associations\Batch\BatchGetParams;
use HubSpotSDK\Crm\Associations\BatchResponsePublicAssociationMultiWithLabel;
use HubSpotSDK\Crm\Associations\PublicAssociationMultiArchive;
use HubSpotSDK\Crm\Associations\PublicAssociationMultiPost;
use HubSpotSDK\Crm\Associations\PublicDefaultAssociationMultiPost;
use HubSpotSDK\Crm\Associations\PublicFetchAssociationsBatchRequest;
use HubSpotSDK\Crm\BatchResponsePublicDefaultAssociation;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\Associations\BatchRawContract;

/**
 * @phpstan-import-type PublicAssociationMultiArchiveShape from \HubSpotSDK\Crm\Associations\PublicAssociationMultiArchive
 * @phpstan-import-type PublicDefaultAssociationMultiPostShape from \HubSpotSDK\Crm\Associations\PublicDefaultAssociationMultiPost
 * @phpstan-import-type PublicAssociationMultiPostShape from \HubSpotSDK\Crm\Associations\PublicAssociationMultiPost
 * @phpstan-import-type PublicFetchAssociationsBatchRequestShape from \HubSpotSDK\Crm\Associations\PublicFetchAssociationsBatchRequest
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
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
     * @param array{
     *   fromObjectType: string, fromObjectID: string, toObjectType: string
     * }|BatchCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePublicDefaultAssociation>
     *
     * @throws APIException
     */
    public function create(
        string $toObjectID,
        array|BatchCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);
        $fromObjectID = $parsed['fromObjectID'];
        unset($parsed['fromObjectID']);
        $toObjectType = $parsed['toObjectType'];
        unset($parsed['toObjectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: [
                'crm/objects/2026-03/%1$s/%2$s/associations/default/%3$s/%4$s',
                $fromObjectType,
                $fromObjectID,
                $toObjectType,
                $toObjectID,
            ],
            options: $options,
            convert: BatchResponsePublicDefaultAssociation::class,
        );
    }

    /**
     * @api
     *
     * Batch delete associations for objects
     *
     * @param string $toObjectType Path param
     * @param array{
     *   fromObjectType: string,
     *   inputs: list<PublicAssociationMultiArchive|PublicAssociationMultiArchiveShape>,
     * }|BatchDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $toObjectType,
        array|BatchDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
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
                'crm/associations/2026-03/%1$s/%2$s/batch/archive',
                $fromObjectType,
                $toObjectType,
            ],
            body: (object) array_diff_key($parsed, array_flip(['fromObjectType'])),
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Create the default (most generic) association type between two object types
     *
     * @param string $toObjectType Path param
     * @param array{
     *   fromObjectType: string,
     *   inputs: list<PublicDefaultAssociationMultiPost|PublicDefaultAssociationMultiPostShape>,
     * }|BatchCreateDefaultParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePublicDefaultAssociation>
     *
     * @throws APIException
     */
    public function createDefault(
        string $toObjectType,
        array|BatchCreateDefaultParams $params,
        RequestOptions|array|null $requestOptions = null,
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
                'crm/associations/2026-03/%1$s/%2$s/batch/associate/default',
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
     * @param string $toObjectType Path param
     * @param array{
     *   fromObjectType: string,
     *   inputs: list<PublicAssociationMultiPost|PublicAssociationMultiPostShape>,
     * }|BatchDeleteLabelsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteLabels(
        string $toObjectType,
        array|BatchDeleteLabelsParams $params,
        RequestOptions|array|null $requestOptions = null,
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
                'crm/associations/2026-03/%1$s/%2$s/batch/labels/archive',
                $fromObjectType,
                $toObjectType,
            ],
            body: (object) array_diff_key($parsed, array_flip(['fromObjectType'])),
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Batch read associations for objects to specific object type. The 'after' field in a returned paging object  can be added alongside the 'id' to retrieve the next page of associations from that objectId. The 'link' field is deprecated and should be ignored. Note: The 'paging' field will only be present if there are more pages and absent otherwise.
     *
     * @param string $toObjectType Path param
     * @param array{
     *   fromObjectType: string,
     *   inputs: list<PublicFetchAssociationsBatchRequest|PublicFetchAssociationsBatchRequestShape>,
     * }|BatchGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePublicAssociationMultiWithLabel>
     *
     * @throws APIException
     */
    public function get(
        string $toObjectType,
        array|BatchGetParams $params,
        RequestOptions|array|null $requestOptions = null,
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
                'crm/associations/2026-03/%1$s/%2$s/batch/read',
                $fromObjectType,
                $toObjectType,
            ],
            body: (object) array_diff_key($parsed, array_flip(['fromObjectType'])),
            options: $options,
            convert: BatchResponsePublicAssociationMultiWithLabel::class,
        );
    }
}
