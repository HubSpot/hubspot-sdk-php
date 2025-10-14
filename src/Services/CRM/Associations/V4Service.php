<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Associations;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Associations\V4\AssociationSpec1;
use HubspotSDK\CRM\Associations\V4\BatchResponseVoid;
use HubspotSDK\CRM\Associations\V4\PublicAssociationMultiPost;
use HubspotSDK\CRM\Associations\V4\ReportCreationResponse;
use HubspotSDK\CRM\Associations\V4\V4ArchiveLabelsParams;
use HubspotSDK\CRM\Associations\V4\V4CreateDefaultParams;
use HubspotSDK\CRM\Associations\V4\V4CreateParams;
use HubspotSDK\CRM\Associations\V4\V4DeleteParams;
use HubspotSDK\CRM\Associations\V4\V4ListParams;
use HubspotSDK\CRM\BatchResponsePublicDefaultAssociation;
use HubspotSDK\CRM\CreatedResponseLabelsBetweenObjectPair;
use HubspotSDK\CRM\MultiAssociatedObjectWithLabel;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\Associations\V4Contract;

use const HubspotSDK\Core\OMIT as omit;

final class V4Service implements V4Contract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Set association labels between two records.
     *
     * @param string $objectType
     * @param string $objectID
     * @param string $toObjectType
     * @param list<AssociationSpec1> $body
     *
     * @throws APIException
     */
    public function create(
        string $toObjectID,
        $objectType,
        $objectID,
        $toObjectType,
        $body,
        ?RequestOptions $requestOptions = null,
    ): CreatedResponseLabelsBetweenObjectPair {
        $params = [
            'objectType' => $objectType,
            'objectID' => $objectID,
            'toObjectType' => $toObjectType,
            'body' => $body,
        ];

        return $this->createRaw($toObjectID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        string $toObjectID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CreatedResponseLabelsBetweenObjectPair {
        [$parsed, $options] = V4CreateParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);
        $toObjectType = $parsed['toObjectType'];
        unset($parsed['toObjectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: [
                'crm/v4/objects/%1$s/%2$s/associations/%3$s/%4$s',
                $objectType,
                $objectID,
                $toObjectType,
                $toObjectID,
            ],
            body: array_diff_key(
                $parsed['body'],
                array_flip(['objectType', 'objectID', 'toObjectType'])
            ),
            options: $options,
            convert: CreatedResponseLabelsBetweenObjectPair::class,
        );
    }

    /**
     * @api
     *
     * List all associations of an object by object type. Limit 500 per call.
     *
     * @param string $objectType
     * @param string $objectID
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     *
     * @return Page<MultiAssociatedObjectWithLabel>
     *
     * @throws APIException
     */
    public function list(
        string $toObjectType,
        $objectType,
        $objectID,
        $after = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = [
            'objectType' => $objectType,
            'objectID' => $objectID,
            'after' => $after,
            'limit' => $limit,
        ];

        return $this->listRaw($toObjectType, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<MultiAssociatedObjectWithLabel>
     *
     * @throws APIException
     */
    public function listRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = V4ListParams::parseRequest($params, $requestOptions);
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'crm/v4/objects/%1$s/%2$s/associations/%3$s',
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
     * @param string $objectType
     * @param string $objectID
     * @param string $toObjectType
     *
     * @throws APIException
     */
    public function delete(
        string $toObjectID,
        $objectType,
        $objectID,
        $toObjectType,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'objectType' => $objectType,
            'objectID' => $objectID,
            'toObjectType' => $toObjectType,
        ];

        return $this->deleteRaw($toObjectID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $toObjectID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = V4DeleteParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);
        $toObjectType = $parsed['toObjectType'];
        unset($parsed['toObjectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: [
                'crm/v4/objects/%1$s/%2$s/associations/%3$s/%4$s',
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
     * Batch delete specific association labels for objects. Deleting an unlabeled association will also delete all labeled associations between those two objects
     *
     * @param string $fromObjectType
     * @param list<PublicAssociationMultiPost> $inputs
     *
     * @throws APIException
     */
    public function archiveLabels(
        string $toObjectType,
        $fromObjectType,
        $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseVoid {
        $params = ['fromObjectType' => $fromObjectType, 'inputs' => $inputs];

        return $this->archiveLabelsRaw($toObjectType, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function archiveLabelsRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseVoid {
        [$parsed, $options] = V4ArchiveLabelsParams::parseRequest(
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
     * Create the default (most generic) association type between two object types
     *
     * @param string $fromObjectType
     * @param string $fromObjectID
     * @param string $toObjectType
     *
     * @throws APIException
     */
    public function createDefault(
        string $toObjectID,
        $fromObjectType,
        $fromObjectID,
        $toObjectType,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicDefaultAssociation {
        $params = [
            'fromObjectType' => $fromObjectType,
            'fromObjectID' => $fromObjectID,
            'toObjectType' => $toObjectType,
        ];

        return $this->createDefaultRaw($toObjectID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createDefaultRaw(
        string $toObjectID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicDefaultAssociation {
        [$parsed, $options] = V4CreateDefaultParams::parseRequest(
            $params,
            $requestOptions
        );
        $fromObjectType = $parsed['fromObjectType'];
        unset($parsed['fromObjectType']);
        $fromObjectID = $parsed['fromObjectID'];
        unset($parsed['fromObjectID']);
        $toObjectType = $parsed['toObjectType'];
        unset($parsed['toObjectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: [
                'crm/v4/objects/%1$s/%2$s/associations/default/%3$s/%4$s',
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
     * Requests a report of all objects in the portal which have a high usage of associations
     *
     * @throws APIException
     */
    public function request(
        int $userID,
        ?RequestOptions $requestOptions = null
    ): ReportCreationResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['crm/v4/associations/usage/high-usage-report/%1$s', $userID],
            options: $requestOptions,
            convert: ReportCreationResponse::class,
        );
    }
}
