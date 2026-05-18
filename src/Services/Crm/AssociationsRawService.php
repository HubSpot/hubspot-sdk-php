<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm;

use HubSpotSDK\AssociationSpec;
use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Associations\AssociationCreateParams;
use HubSpotSDK\Crm\Associations\AssociationDeleteParams;
use HubSpotSDK\Crm\Associations\AssociationListParams;
use HubSpotSDK\Crm\Associations\AssociationSearchParams;
use HubSpotSDK\Crm\Associations\AssociationUpdateLabelsParams;
use HubSpotSDK\Crm\BatchResponsePublicDefaultAssociation;
use HubSpotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubSpotSDK\Crm\FilterGroup;
use HubSpotSDK\Crm\LabelsBetweenObjectPair;
use HubSpotSDK\Crm\MultiAssociatedObjectWithLabel;
use HubSpotSDK\Crm\ReportCreationResponse;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\AssociationsRawContract;

/**
 * @phpstan-import-type FilterGroupShape from \HubSpotSDK\Crm\FilterGroup
 * @phpstan-import-type AssociationSpecShape from \HubSpotSDK\AssociationSpec
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class AssociationsRawService implements AssociationsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create the default (most generic) association type between two object types
     *
     * @param array{
     *   fromObjectType: string, fromObjectID: string, toObjectType: string
     * }|AssociationCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePublicDefaultAssociation>
     *
     * @throws APIException
     */
    public function create(
        string $toObjectID,
        array|AssociationCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AssociationCreateParams::parseRequest(
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
     * Retrieve all associations between a specific record and an object type. Limit 500 per call.
     *
     * @param string $toObjectType Path param
     * @param array{
     *   objectType: string, objectID: string, after?: string, limit?: int
     * }|AssociationListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<MultiAssociatedObjectWithLabel>>
     *
     * @throws APIException
     */
    public function list(
        string $toObjectType,
        array|AssociationListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AssociationListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'crm/objects/2026-03/%1$s/%2$s/associations/%3$s',
                $objectType,
                $objectID,
                $toObjectType,
            ],
            query: $parsed,
            options: $options,
            convert: MultiAssociatedObjectWithLabel::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * deletes all associations between two records.
     *
     * @param array{
     *   objectType: string, objectID: string, toObjectType: string
     * }|AssociationDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $toObjectID,
        array|AssociationDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AssociationDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);
        $toObjectType = $parsed['toObjectType'];
        unset($parsed['toObjectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'crm/objects/2026-03/%1$s/%2$s/associations/%3$s/%4$s',
                $objectType,
                $objectID,
                $toObjectType,
                $toObjectID,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Requests a report of all objects in the portal which have a high usage of associations
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReportCreationResponse>
     *
     * @throws APIException
     */
    public function requestHighUsageReport(
        int $userID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['crm/associations/2026-03/usage/high-usage-report/%1$s', $userID],
            options: $requestOptions,
            convert: ReportCreationResponse::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   after: string,
     *   filterGroups: list<FilterGroup|FilterGroupShape>,
     *   limit: int,
     *   properties: list<string>,
     *   sorts: list<string>,
     *   query?: string,
     * }|AssociationSearchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseWithTotalSimplePublicObject>
     *
     * @throws APIException
     */
    public function search(
        string $objectType,
        array|AssociationSearchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AssociationSearchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['crm/objects/2026-03/%1$s/search', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: CollectionResponseWithTotalSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Set association labels between two records.
     *
     * @param string $toObjectID Path param
     * @param array{
     *   objectType: string,
     *   objectID: string,
     *   toObjectType: string,
     *   body: list<AssociationSpec|AssociationSpecShape>,
     * }|AssociationUpdateLabelsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LabelsBetweenObjectPair>
     *
     * @throws APIException
     */
    public function updateLabels(
        string $toObjectID,
        array|AssociationUpdateLabelsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AssociationUpdateLabelsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);
        $toObjectType = $parsed['toObjectType'];
        unset($parsed['toObjectType']);

        /** @var array<string,mixed> */
        $body = $parsed['body'];

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: [
                'crm/objects/2026-03/%1$s/%2$s/associations/%3$s/%4$s',
                $objectType,
                $objectID,
                $toObjectType,
                $toObjectID,
            ],
            body: array_diff_key(
                $body,
                array_flip(['objectType', 'objectID', 'toObjectType'])
            ),
            options: $options,
            convert: LabelsBetweenObjectPair::class,
        );
    }
}
