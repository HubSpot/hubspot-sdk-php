<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\CreatedResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\Projects\ProjectCreateParams;
use HubspotSDK\Crm\Objects\Projects\ProjectGetParams;
use HubspotSDK\Crm\Objects\Projects\ProjectListParams;
use HubspotSDK\Crm\Objects\Projects\ProjectMergeParams;
use HubspotSDK\Crm\Objects\Projects\ProjectSearchParams;
use HubspotSDK\Crm\Objects\Projects\ProjectUpdateParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\ProjectsContract;
use HubspotSDK\Services\Crm\Objects\Projects\AssociationsService;
use HubspotSDK\Services\Crm\Objects\Projects\BatchService;

final class ProjectsService implements ProjectsContract
{
    /**
     * @api
     */
    public AssociationsService $associations;

    /**
     * @api
     */
    public BatchService $batch;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->associations = new AssociationsService($client);
        $this->batch = new BatchService($client);
    }

    /**
     * @api
     *
     * Create a project with the given properties and return a copy of the object, including the ID.
     *
     * @param array{
     *   associations: list<array{
     *     to: array<mixed>|PublicObjectID, types: list<array<mixed>|AssociationSpec>
     *   }>,
     *   properties: array<string,string>,
     * }|ProjectCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|ProjectCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): CreatedResponseSimplePublicObject {
        [$parsed, $options] = ProjectCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/objects/v3/projects',
            body: (object) $parsed,
            options: $options,
            convert: CreatedResponseSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Perform a partial update of an Object identified by `{projectId}`or optionally a unique property value as specified by the `idProperty` query param. `{projectId}` refers to the internal object ID by default, and the `idProperty` query param refers to a property whose values are unique for the object. Provided property values will be overwritten. Read-only and non-existent properties will result in an error. Properties values can be cleared by passing an empty string.
     *
     * @param array{
     *   properties: array<string,string>, idProperty?: string
     * }|ProjectUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $projectID,
        array|ProjectUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject {
        [$parsed, $options] = ProjectUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = ['idProperty'];

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['crm/objects/v3/projects/%1$s', $projectID],
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: SimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Read a page of projects. Control what is returned via the `properties` query param.
     *
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   associations?: list<string>,
     *   limit?: int,
     *   properties?: list<string>,
     *   propertiesWithHistory?: list<string>,
     * }|ProjectListParams $params
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        array|ProjectListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = ProjectListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm/objects/v3/projects',
            query: $parsed,
            options: $options,
            convert: SimplePublicObjectWithAssociations::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Move an Object identified by `{projectId}` to the recycling bin.
     *
     * @throws APIException
     */
    public function delete(
        string $projectID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['crm/objects/v3/projects/%1$s', $projectID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Read an Object identified by `{projectId}`. `{projectId}` refers to the internal object ID by default, or optionally any unique property value as specified by the `idProperty` query param.  Control what is returned via the `properties` query param.
     *
     * @param array{
     *   archived?: bool,
     *   associations?: list<string>,
     *   idProperty?: string,
     *   properties?: list<string>,
     *   propertiesWithHistory?: list<string>,
     * }|ProjectGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $projectID,
        array|ProjectGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations {
        [$parsed, $options] = ProjectGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/objects/v3/projects/%1$s', $projectID],
            query: $parsed,
            options: $options,
            convert: SimplePublicObjectWithAssociations::class,
        );
    }

    /**
     * @api
     *
     * Merge two project records. Learn more about [merging records](https://knowledge.hubspot.com/records/merge-records).
     *
     * @param array{
     *   objectIdToMerge: string, primaryObjectId: string
     * }|ProjectMergeParams $params
     *
     * @throws APIException
     */
    public function merge(
        array|ProjectMergeParams $params,
        ?RequestOptions $requestOptions = null
    ): SimplePublicObject {
        [$parsed, $options] = ProjectMergeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/objects/v3/projects/merge',
            body: (object) $parsed,
            options: $options,
            convert: SimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Search for projects by filtering on properties, searching through associations, and sorting results. Learn more about [CRM search](https://developers.hubspot.com/docs/guides/api/crm/search#make-a-search-request).
     *
     * @param array{
     *   after: string,
     *   filterGroups: list<array{filters: list<array<mixed>>}>,
     *   limit: int,
     *   properties: list<string>,
     *   sorts: list<string>,
     *   query?: string,
     * }|ProjectSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        array|ProjectSearchParams $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalSimplePublicObject {
        [$parsed, $options] = ProjectSearchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/objects/v3/projects/search',
            body: (object) $parsed,
            options: $options,
            convert: CollectionResponseWithTotalSimplePublicObject::class,
        );
    }
}
