<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Associations;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Associations\V4\V4CreateDefaultAssociationParams;
use HubspotSDK\CRM\Associations\V4\V4DeleteAssociationParams;
use HubspotSDK\CRM\Associations\V4\V4ListAssociationsByTypeParams;
use HubspotSDK\CRM\Associations\V4\V4UpdateAssociationLabelsParams;
use HubspotSDK\CRM\BatchResponsePublicDefaultAssociation;
use HubspotSDK\CRM\CollectionResponseMultiAssociatedObjectWithLabel;
use HubspotSDK\CRM\CreatedResponseLabelsBetweenObjectPair;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\Associations\V4Contract;
use HubspotSDK\Services\CRM\Associations\V4\BatchService;
use HubspotSDK\Services\CRM\Associations\V4\ReportService;

use const HubspotSDK\Core\OMIT as omit;

final class V4Service implements V4Contract
{
    /**
     * @@api
     */
    public BatchService $batch;

    /**
     * @@api
     */
    public ReportService $report;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->batch = new BatchService($client);
        $this->report = new ReportService($client);
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
    public function createDefaultAssociation(
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

        return $this->createDefaultAssociationRaw(
            $toObjectID,
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
    public function createDefaultAssociationRaw(
        string $toObjectID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicDefaultAssociation {
        [$parsed, $options] = V4CreateDefaultAssociationParams::parseRequest(
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
     * deletes all associations between two records.
     *
     * @param string $objectType
     * @param string $objectID
     * @param string $toObjectType
     *
     * @throws APIException
     */
    public function deleteAssociation(
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

        return $this->deleteAssociationRaw($toObjectID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteAssociationRaw(
        string $toObjectID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = V4DeleteAssociationParams::parseRequest(
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
     * List all associations of an object by object type. Limit 500 per call.
     *
     * @param string $objectType
     * @param string $objectID
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     *
     * @throws APIException
     */
    public function listAssociationsByType(
        string $toObjectType,
        $objectType,
        $objectID,
        $after = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseMultiAssociatedObjectWithLabel {
        $params = [
            'objectType' => $objectType,
            'objectID' => $objectID,
            'after' => $after,
            'limit' => $limit,
        ];

        return $this->listAssociationsByTypeRaw(
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
    public function listAssociationsByTypeRaw(
        string $toObjectType,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseMultiAssociatedObjectWithLabel {
        [$parsed, $options] = V4ListAssociationsByTypeParams::parseRequest(
            $params,
            $requestOptions
        );
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
            convert: CollectionResponseMultiAssociatedObjectWithLabel::class,
        );
    }

    /**
     * @api
     *
     * Set association labels between two records.
     *
     * @param string $objectType
     * @param string $objectID
     * @param string $toObjectType
     * @param list<AssociationSpec> $body
     *
     * @throws APIException
     */
    public function updateAssociationLabels(
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

        return $this->updateAssociationLabelsRaw(
            $toObjectID,
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
    public function updateAssociationLabelsRaw(
        string $toObjectID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CreatedResponseLabelsBetweenObjectPair {
        [$parsed, $options] = V4UpdateAssociationLabelsParams::parseRequest(
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
}
