<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Associations\V4;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Associations\V4\Batch\BatchBatchAssociateDefaultParams;
use HubspotSDK\CRM\Associations\V4\Batch\BatchBatchCreateParams;
use HubspotSDK\CRM\Associations\V4\Batch\BatchBatchDeleteLabelsParams;
use HubspotSDK\CRM\Associations\V4\Batch\BatchBatchDeleteParams;
use HubspotSDK\CRM\Associations\V4\Batch\BatchBatchReadParams;
use HubspotSDK\CRM\Associations\V4\BatchResponseLabelsBetweenObjectPair;
use HubspotSDK\CRM\Associations\V4\BatchResponsePublicAssociationMultiWithLabel;
use HubspotSDK\CRM\Associations\V4\BatchResponseVoid;
use HubspotSDK\CRM\Associations\V4\PublicAssociationMultiArchive;
use HubspotSDK\CRM\Associations\V4\PublicAssociationMultiPost;
use HubspotSDK\CRM\Associations\V4\PublicDefaultAssociationMultiPost;
use HubspotSDK\CRM\Associations\V4\PublicFetchAssociationsBatchRequest;
use HubspotSDK\CRM\BatchResponsePublicDefaultAssociation;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\Associations\V4\BatchContract;

final class BatchService implements BatchContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create the default (most generic) association type between two object types
     *
     * @param string $fromObjectType
     * @param list<PublicDefaultAssociationMultiPost> $inputs
     *
     * @throws APIException
     */
    public function batchAssociateDefault(
        string $toObjectType,
        $fromObjectType,
        $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicDefaultAssociation {
        $params = ['fromObjectType' => $fromObjectType, 'inputs' => $inputs];

        return $this->batchAssociateDefaultRaw(
            $toObjectType,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchAssociateDefaultRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicDefaultAssociation {
        [$parsed, $options] = BatchBatchAssociateDefaultParams::parseRequest(
            $params,
            $requestOptions
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
     * Batch create associations for objects
     *
     * @param string $fromObjectType
     * @param list<PublicAssociationMultiPost> $inputs
     *
     * @throws APIException
     */
    public function batchCreate(
        string $toObjectType,
        $fromObjectType,
        $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseLabelsBetweenObjectPair {
        $params = ['fromObjectType' => $fromObjectType, 'inputs' => $inputs];

        return $this->batchCreateRaw($toObjectType, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchCreateRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseLabelsBetweenObjectPair {
        [$parsed, $options] = BatchBatchCreateParams::parseRequest(
            $params,
            $requestOptions
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
     * @param string $fromObjectType
     * @param list<PublicAssociationMultiArchive> $inputs
     *
     * @throws APIException
     */
    public function batchDelete(
        string $toObjectType,
        $fromObjectType,
        $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseVoid {
        $params = ['fromObjectType' => $fromObjectType, 'inputs' => $inputs];

        return $this->batchDeleteRaw($toObjectType, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchDeleteRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseVoid {
        [$parsed, $options] = BatchBatchDeleteParams::parseRequest(
            $params,
            $requestOptions
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
     * Batch delete specific association labels for objects. Deleting an unlabeled association will also delete all labeled associations between those two objects
     *
     * @param string $fromObjectType
     * @param list<PublicAssociationMultiPost> $inputs
     *
     * @throws APIException
     */
    public function batchDeleteLabels(
        string $toObjectType,
        $fromObjectType,
        $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseVoid {
        $params = ['fromObjectType' => $fromObjectType, 'inputs' => $inputs];

        return $this->batchDeleteLabelsRaw($toObjectType, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchDeleteLabelsRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseVoid {
        [$parsed, $options] = BatchBatchDeleteLabelsParams::parseRequest(
            $params,
            $requestOptions
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
     * @param string $fromObjectType
     * @param list<PublicFetchAssociationsBatchRequest> $inputs
     *
     * @throws APIException
     */
    public function batchRead(
        string $toObjectType,
        $fromObjectType,
        $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicAssociationMultiWithLabel {
        $params = ['fromObjectType' => $fromObjectType, 'inputs' => $inputs];

        return $this->batchReadRaw($toObjectType, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchReadRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicAssociationMultiWithLabel {
        [$parsed, $options] = BatchBatchReadParams::parseRequest(
            $params,
            $requestOptions
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
