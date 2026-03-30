<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Associations;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Associations\BatchResponsePublicAssociationMultiWithLabel;
use HubspotSDK\Crm\Associations\PublicAssociationMultiArchive;
use HubspotSDK\Crm\Associations\PublicAssociationMultiPost;
use HubspotSDK\Crm\Associations\PublicDefaultAssociationMultiPost;
use HubspotSDK\Crm\Associations\PublicFetchAssociationsBatchRequest;
use HubspotSDK\Crm\BatchResponsePublicDefaultAssociation;
use HubspotSDK\Crm\BatchResponseVoid;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Associations\BatchContract;

/**
 * @phpstan-import-type PublicAssociationMultiArchiveShape from \HubspotSDK\Crm\Associations\PublicAssociationMultiArchive
 * @phpstan-import-type PublicDefaultAssociationMultiPostShape from \HubspotSDK\Crm\Associations\PublicDefaultAssociationMultiPost
 * @phpstan-import-type PublicAssociationMultiPostShape from \HubspotSDK\Crm\Associations\PublicAssociationMultiPost
 * @phpstan-import-type PublicFetchAssociationsBatchRequestShape from \HubspotSDK\Crm\Associations\PublicFetchAssociationsBatchRequest
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class BatchService implements BatchContract
{
    /**
     * @api
     */
    public BatchRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BatchRawService($client);
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $toObjectID,
        string $fromObjectType,
        string $fromObjectID,
        string $toObjectType,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponsePublicDefaultAssociation {
        $params = Util::removeNulls(
            [
                'fromObjectType' => $fromObjectType,
                'fromObjectID' => $fromObjectID,
                'toObjectType' => $toObjectType,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($toObjectID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Batch delete associations for objects
     *
     * @param string $toObjectType Path param
     * @param string $fromObjectType Path param
     * @param list<PublicAssociationMultiArchive|PublicAssociationMultiArchiveShape> $inputs Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $toObjectType,
        string $fromObjectType,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseVoid {
        $params = Util::removeNulls(
            ['fromObjectType' => $fromObjectType, 'inputs' => $inputs]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($toObjectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create the default (most generic) association type between two object types
     *
     * @param string $toObjectType Path param
     * @param string $fromObjectType Path param
     * @param list<PublicDefaultAssociationMultiPost|PublicDefaultAssociationMultiPostShape> $inputs Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createDefault(
        string $toObjectType,
        string $fromObjectType,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponsePublicDefaultAssociation {
        $params = Util::removeNulls(
            ['fromObjectType' => $fromObjectType, 'inputs' => $inputs]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createDefault($toObjectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Batch delete specific association labels for objects. Deleting an unlabeled association will also delete all labeled associations between those two objects
     *
     * @param string $toObjectType Path param
     * @param string $fromObjectType Path param
     * @param list<PublicAssociationMultiPost|PublicAssociationMultiPostShape> $inputs Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteLabels(
        string $toObjectType,
        string $fromObjectType,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseVoid {
        $params = Util::removeNulls(
            ['fromObjectType' => $fromObjectType, 'inputs' => $inputs]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteLabels($toObjectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Batch read associations for objects to specific object type. The 'after' field in a returned paging object  can be added alongside the 'id' to retrieve the next page of associations from that objectId. The 'link' field is deprecated and should be ignored. Note: The 'paging' field will only be present if there are more pages and absent otherwise.
     *
     * @param string $toObjectType Path param
     * @param string $fromObjectType Path param
     * @param list<PublicFetchAssociationsBatchRequest|PublicFetchAssociationsBatchRequestShape> $inputs Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $toObjectType,
        string $fromObjectType,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponsePublicAssociationMultiWithLabel {
        $params = Util::removeNulls(
            ['fromObjectType' => $fromObjectType, 'inputs' => $inputs]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($toObjectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
