<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\CreatedResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\Meetings\MeetingCreateParams;
use HubspotSDK\Crm\Objects\Meetings\MeetingGetParams;
use HubspotSDK\Crm\Objects\Meetings\MeetingListParams;
use HubspotSDK\Crm\Objects\Meetings\MeetingSearchParams;
use HubspotSDK\Crm\Objects\Meetings\MeetingUpdateParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\MeetingsRawContract;

final class MeetingsRawService implements MeetingsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a meeting with the given properties and return a copy of the object, including the ID. Documentation and examples for creating standard meetings is provided.
     *
     * @param array{
     *   associations: list<array{
     *     to: array<mixed>|PublicObjectID, types: list<array<mixed>|AssociationSpec>
     *   }>,
     *   properties: array<string,string>,
     * }|MeetingCreateParams $params
     *
     * @return BaseResponse<CreatedResponseSimplePublicObject>
     *
     * @throws APIException
     */
    public function create(
        array|MeetingCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = MeetingCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/meetings',
            body: (object) $parsed,
            options: $options,
            convert: CreatedResponseSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Perform a partial update of an Object identified by `{meetingId}`or optionally a unique property value as specified by the `idProperty` query param. `{meetingId}` refers to the internal object ID by default, and the `idProperty` query param refers to a property whose values are unique for the object. Provided property values will be overwritten. Read-only and non-existent properties will result in an error. Properties values can be cleared by passing an empty string.
     *
     * @param string $meetingID Path param:
     * @param array{
     *   properties: array<string,string>, idProperty?: string
     * }|MeetingUpdateParams $params
     *
     * @return BaseResponse<SimplePublicObject>
     *
     * @throws APIException
     */
    public function update(
        string $meetingID,
        array|MeetingUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MeetingUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['idProperty']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['crm/v3/objects/meetings/%1$s', $meetingID],
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: SimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Read a page of meetings. Control what is returned via the `properties` query param.
     *
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   associations?: list<string>,
     *   limit?: int,
     *   properties?: list<string>,
     *   propertiesWithHistory?: list<string>,
     * }|MeetingListParams $params
     *
     * @return BaseResponse<Page<SimplePublicObjectWithAssociations>>
     *
     * @throws APIException
     */
    public function list(
        array|MeetingListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = MeetingListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm/v3/objects/meetings',
            query: $parsed,
            options: $options,
            convert: SimplePublicObjectWithAssociations::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Move an Object identified by `{meetingId}` to the recycling bin.
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $meetingID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['crm/v3/objects/meetings/%1$s', $meetingID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Read an Object identified by `{meetingId}`. `{meetingId}` refers to the internal object ID by default, or optionally any unique property value as specified by the `idProperty` query param.  Control what is returned via the `properties` query param.
     *
     * @param array{
     *   archived?: bool,
     *   associations?: list<string>,
     *   idProperty?: string,
     *   properties?: list<string>,
     *   propertiesWithHistory?: list<string>,
     * }|MeetingGetParams $params
     *
     * @return BaseResponse<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function get(
        string $meetingID,
        array|MeetingGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MeetingGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/objects/meetings/%1$s', $meetingID],
            query: $parsed,
            options: $options,
            convert: SimplePublicObjectWithAssociations::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   after: string,
     *   filterGroups: list<array{filters: list<array<mixed>>}>,
     *   limit: int,
     *   properties: list<string>,
     *   sorts: list<string>,
     *   query?: string,
     * }|MeetingSearchParams $params
     *
     * @return BaseResponse<CollectionResponseWithTotalSimplePublicObject>
     *
     * @throws APIException
     */
    public function search(
        array|MeetingSearchParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = MeetingSearchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/meetings/search',
            body: (object) $parsed,
            options: $options,
            convert: CollectionResponseWithTotalSimplePublicObject::class,
        );
    }
}
