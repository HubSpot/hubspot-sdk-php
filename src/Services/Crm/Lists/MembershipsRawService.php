<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Lists;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Lists\APICollectionResponseRecordListMembershipNoPaging;
use HubspotSDK\Crm\Lists\JoinTimeAndRecordID;
use HubspotSDK\Crm\Lists\Memberships\MembershipAddAllFromListParams;
use HubspotSDK\Crm\Lists\Memberships\MembershipAddAndRemoveParams;
use HubspotSDK\Crm\Lists\Memberships\MembershipAddParams;
use HubspotSDK\Crm\Lists\Memberships\MembershipGetListsParams;
use HubspotSDK\Crm\Lists\Memberships\MembershipGetPageOrderedByAddedToListDateParams;
use HubspotSDK\Crm\Lists\Memberships\MembershipListParams;
use HubspotSDK\Crm\Lists\Memberships\MembershipRemoveParams;
use HubspotSDK\Crm\Lists\MembershipsUpdateResponse;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Lists\MembershipsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class MembershipsRawService implements MembershipsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Fetch the memberships of a list in order sorted by the `recordId` of the records in the list.
     *
     * The `recordId`s are sorted in *ascending* order if an `after` offset or no offset is provided. If only a `before` offset is provided, then the records are sorted in *descending* order.
     *
     * The `after` offset parameter will take precedence over the `before` offset in a case where both are provided.
     *
     * @param string $listID the **ILS ID** of the list
     * @param array{
     *   after?: string, before?: string, limit?: int
     * }|MembershipListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<JoinTimeAndRecordID>>
     *
     * @throws APIException
     */
    public function list(
        string $listID,
        array|MembershipListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MembershipListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/lists/%1$s/memberships', $listID],
            query: $parsed,
            options: $options,
            convert: JoinTimeAndRecordID::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Add the records provided to the list. Records that do not exist or that are already members of the list are ignored.
     *
     * This endpoint only works for lists that have a `processingType` of `MANUAL` or `SNAPSHOT`.
     *
     * @param string $listID the **ILS ID** of the `MANUAL` or `SNAPSHOT` list
     * @param array{body: list<string>}|MembershipAddParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MembershipsUpdateResponse>
     *
     * @throws APIException
     */
    public function add(
        string $listID,
        array|MembershipAddParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MembershipAddParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['crm/v3/lists/%1$s/memberships/add', $listID],
            body: $parsed['body'],
            options: $options,
            convert: MembershipsUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Add all of the records from a *source list* (specified by the `sourceListId`) to a *destination list* (specified by the `listId`). Records that are already members of the *destination list* will be ignored. The *destination* and *source list* IDs must be different. The *destination* and *source lists* must contain records of the same type (e.g. contacts, companies, etc.).
     *
     * This endpoint only works for *destination lists* that have a `processingType` of `MANUAL` or `SNAPSHOT`. The *source list* can have any `processingType`.
     *
     * This endpoint only supports a `sourceListId` for lists with less than 100,000 memberships.
     *
     * @param string $sourceListID the **ILS ID** of the *source list* to grab the records from, which are then added to the *destination list*
     * @param array{listID: string}|MembershipAddAllFromListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function addAllFromList(
        string $sourceListID,
        array|MembershipAddAllFromListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MembershipAddAllFromListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $listID = $parsed['listID'];
        unset($parsed['listID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: [
                'crm/v3/lists/%1$s/memberships/add-from/%2$s', $listID, $sourceListID,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Add and/or remove records that have already been created in the system to and/or from a list.
     *
     * This endpoint only works for lists that have a `processingType` of `MANUAL` or `SNAPSHOT`.
     *
     * @param string $listID the **ILS ID** of the `MANUAL` or `SNAPSHOT` list
     * @param array{
     *   recordIDsToAdd: list<string>, recordIDsToRemove: list<string>
     * }|MembershipAddAndRemoveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MembershipsUpdateResponse>
     *
     * @throws APIException
     */
    public function addAndRemove(
        string $listID,
        array|MembershipAddAndRemoveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MembershipAddAndRemoveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['crm/v3/lists/%1$s/memberships/add-and-remove', $listID],
            body: (object) $parsed,
            options: $options,
            convert: MembershipsUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * For given record provide lists this record is member of.
     *
     * @param string $recordID Id of the record
     * @param array{objectTypeID: string}|MembershipGetListsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<APICollectionResponseRecordListMembershipNoPaging>
     *
     * @throws APIException
     */
    public function getLists(
        string $recordID,
        array|MembershipGetListsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MembershipGetListsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectTypeID = $parsed['objectTypeID'];
        unset($parsed['objectTypeID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'crm/v3/lists/records/%1$s/%2$s/memberships', $objectTypeID, $recordID,
            ],
            options: $options,
            convert: APICollectionResponseRecordListMembershipNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Fetch the memberships of a list in order sorted by the time the records were added to the list.
     *
     * The `recordId`s are sorted in *ascending* order if an `after` offset or no offset is provided. If only a `before` offset is provided, then the records are sorted in *descending* order.
     *
     * The `after` offset parameter will take precedence over the `before` offset in a case where both are provided.
     *
     * @param string $listID the **ILS ID** of the list
     * @param array{
     *   after?: string, before?: string, limit?: int
     * }|MembershipGetPageOrderedByAddedToListDateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<JoinTimeAndRecordID>>
     *
     * @throws APIException
     */
    public function getPageOrderedByAddedToListDate(
        string $listID,
        array|MembershipGetPageOrderedByAddedToListDateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MembershipGetPageOrderedByAddedToListDateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/lists/%1$s/memberships/join-order', $listID],
            query: $parsed,
            options: $options,
            convert: JoinTimeAndRecordID::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Remove the records provided from the list. Records that do not exist or that are not members of the list are ignored.
     *
     * This endpoint only works for lists that have a `processingType` of `MANUAL` or `SNAPSHOT`.
     *
     * @param string $listID the **ILS ID** of the `MANUAL` or `SNAPSHOT` list
     * @param array{body: list<string>}|MembershipRemoveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MembershipsUpdateResponse>
     *
     * @throws APIException
     */
    public function remove(
        string $listID,
        array|MembershipRemoveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MembershipRemoveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['crm/v3/lists/%1$s/memberships/remove', $listID],
            body: $parsed['body'],
            options: $options,
            convert: MembershipsUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Remove **all** of the records from a list. ***Note:*** *The list is not deleted.*
     *
     * This endpoint only works for lists that have a `processingType` of `MANUAL` or `SNAPSHOT`.
     *
     * This endpoint only supports lists that have less than 100,000 memberships.
     *
     * @param string $listID the **ILS ID** of the `MANUAL` or `SNAPSHOT` list
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function removeAll(
        string $listID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['crm/v3/lists/%1$s/memberships', $listID],
            options: $requestOptions,
            convert: null,
        );
    }
}
