<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm\Objects;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubSpotSDK\Crm\FilterGroup;
use HubSpotSDK\Crm\Objects\Notes\NoteCreateParams;
use HubSpotSDK\Crm\Objects\Notes\NoteGetParams;
use HubSpotSDK\Crm\Objects\Notes\NoteListParams;
use HubSpotSDK\Crm\Objects\Notes\NoteSearchParams;
use HubSpotSDK\Crm\Objects\Notes\NoteUpdateParams;
use HubSpotSDK\Crm\Objects\PublicAssociationsForObject;
use HubSpotSDK\Crm\Objects\SimplePublicObjectWithAssociations;
use HubSpotSDK\Crm\SimplePublicObject;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\Objects\NotesRawContract;

/**
 * @phpstan-import-type PublicAssociationsForObjectShape from \HubSpotSDK\Crm\Objects\PublicAssociationsForObject
 * @phpstan-import-type FilterGroupShape from \HubSpotSDK\Crm\FilterGroup
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class NotesRawService implements NotesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a note with the given properties and return a copy of the object, including the ID. Documentation and examples for creating standard notes is provided.
     *
     * @param array{
     *   associations: list<PublicAssociationsForObject|PublicAssociationsForObjectShape>,
     *   properties: array<string,string>,
     * }|NoteCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimplePublicObject>
     *
     * @throws APIException
     */
    public function create(
        array|NoteCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NoteCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/objects/2026-03/notes',
            body: (object) $parsed,
            options: $options,
            convert: SimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Perform a partial update of an Object identified by `{noteId}`or optionally a unique property value as specified by the `idProperty` query param. `{noteId}` refers to the internal object ID by default, and the `idProperty` query param refers to a property whose values are unique for the object. Provided property values will be overwritten. Read-only and non-existent properties will result in an error. Properties values can be cleared by passing an empty string.
     *
     * @param string $noteID Path param
     * @param array{
     *   properties: array<string,string>, idProperty?: string
     * }|NoteUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimplePublicObject>
     *
     * @throws APIException
     */
    public function update(
        string $noteID,
        array|NoteUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NoteUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['idProperty']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['crm/objects/2026-03/notes/%1$s', $noteID],
            query: array_intersect_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: SimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Read a page of notes. Control what is returned via the `properties` query param.
     *
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   associations?: list<string>,
     *   limit?: int,
     *   properties?: list<string>,
     *   propertiesWithHistory?: list<string>,
     * }|NoteListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<SimplePublicObjectWithAssociations>>
     *
     * @throws APIException
     */
    public function list(
        array|NoteListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NoteListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm/objects/2026-03/notes',
            query: $parsed,
            options: $options,
            convert: SimplePublicObjectWithAssociations::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Move an Object identified by `{noteId}` to the recycling bin.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $noteID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['crm/objects/2026-03/notes/%1$s', $noteID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Read an Object identified by `{noteId}`. `{noteId}` refers to the internal object ID by default, or optionally any unique property value as specified by the `idProperty` query param.  Control what is returned via the `properties` query param.
     *
     * @param array{
     *   archived?: bool,
     *   associations?: list<string>,
     *   idProperty?: string,
     *   properties?: list<string>,
     *   propertiesWithHistory?: list<string>,
     * }|NoteGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function get(
        string $noteID,
        array|NoteGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NoteGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/objects/2026-03/notes/%1$s', $noteID],
            query: $parsed,
            options: $options,
            convert: SimplePublicObjectWithAssociations::class,
        );
    }

    /**
     * @api
     *
     * Execute a search for notes using filters, sorting options, and other query parameters to refine the results. This endpoint allows for complex queries to locate specific notes within the CRM system.
     *
     * @param array{
     *   after: string,
     *   filterGroups: list<FilterGroup|FilterGroupShape>,
     *   limit: int,
     *   properties: list<string>,
     *   sorts: list<string>,
     *   query?: string,
     * }|NoteSearchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseWithTotalSimplePublicObject>
     *
     * @throws APIException
     */
    public function search(
        array|NoteSearchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NoteSearchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/objects/2026-03/notes/search',
            body: (object) $parsed,
            options: $options,
            convert: CollectionResponseWithTotalSimplePublicObject::class,
        );
    }
}
