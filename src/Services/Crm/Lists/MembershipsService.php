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
use HubspotSDK\ServiceContracts\Crm\Lists\MembershipsContract;

final class MembershipsService implements MembershipsContract
{
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
     * @param array{
     *   after?: string, before?: string, limit?: int
     * }|MembershipListParams $params
     *
     * @return Page<JoinTimeAndRecordID>
     *
     * @throws APIException
     */
    public function list(
        string $listID,
        array|MembershipListParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page {
        [$parsed, $options] = MembershipListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<Page<JoinTimeAndRecordID>> */
        $response = $this->client->request(
            method: 'get',
            path: ['crm/v3/lists/%1$s/memberships', $listID],
            query: $parsed,
            options: $options,
            convert: JoinTimeAndRecordID::class,
            page: Page::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Add the records provided to the list. Records that do not exist or that are already members of the list are ignored.
     *
     * This endpoint only works for lists that have a `processingType` of `MANUAL` or `SNAPSHOT`.
     *
     * @param list<string> $params
     *
     * @throws APIException
     */
    public function add(
        string $listID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): MembershipsUpdateResponse {
        [$parsed, $options] = MembershipAddParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<MembershipsUpdateResponse> */
        $response = $this->client->request(
            method: 'put',
            path: ['crm/v3/lists/%1$s/memberships/add', $listID],
            body: $parsed['body'],
            options: $options,
            convert: MembershipsUpdateResponse::class,
        );

        return $response->parse();
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
     * @param array{listId: string}|MembershipAddAllFromListParams $params
     *
     * @throws APIException
     */
    public function addAllFromList(
        string $sourceListID,
        array|MembershipAddAllFromListParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = MembershipAddAllFromListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $listID = $parsed['listId'];
        unset($parsed['listId']);

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'put',
            path: [
                'crm/v3/lists/%1$s/memberships/add-from/%2$s', $listID, $sourceListID,
            ],
            options: $options,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Add and/or remove records that have already been created in the system to and/or from a list.
     *
     * This endpoint only works for lists that have a `processingType` of `MANUAL` or `SNAPSHOT`.
     *
     * @param array{
     *   recordIdsToAdd: list<string>, recordIdsToRemove: list<string>
     * }|MembershipAddAndRemoveParams $params
     *
     * @throws APIException
     */
    public function addAndRemove(
        string $listID,
        array|MembershipAddAndRemoveParams $params,
        ?RequestOptions $requestOptions = null,
    ): MembershipsUpdateResponse {
        [$parsed, $options] = MembershipAddAndRemoveParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<MembershipsUpdateResponse> */
        $response = $this->client->request(
            method: 'put',
            path: ['crm/v3/lists/%1$s/memberships/add-and-remove', $listID],
            body: (object) $parsed,
            options: $options,
            convert: MembershipsUpdateResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * For given record provide lists this record is member of.
     *
     * @param array{objectTypeId: string}|MembershipGetListsParams $params
     *
     * @throws APIException
     */
    public function getLists(
        string $recordID,
        array|MembershipGetListsParams $params,
        ?RequestOptions $requestOptions = null,
    ): APICollectionResponseRecordListMembershipNoPaging {
        [$parsed, $options] = MembershipGetListsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectTypeID = $parsed['objectTypeId'];
        unset($parsed['objectTypeId']);

        /** @var BaseResponse<APICollectionResponseRecordListMembershipNoPaging> */
        $response = $this->client->request(
            method: 'get',
            path: [
                'crm/v3/lists/records/%1$s/%2$s/memberships', $objectTypeID, $recordID,
            ],
            options: $options,
            convert: APICollectionResponseRecordListMembershipNoPaging::class,
        );

        return $response->parse();
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
     * @param array{
     *   after?: string, before?: string, limit?: int
     * }|MembershipGetPageOrderedByAddedToListDateParams $params
     *
     * @return Page<JoinTimeAndRecordID>
     *
     * @throws APIException
     */
    public function getPageOrderedByAddedToListDate(
        string $listID,
        array|MembershipGetPageOrderedByAddedToListDateParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page {
        [$parsed, $options] = MembershipGetPageOrderedByAddedToListDateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<Page<JoinTimeAndRecordID>> */
        $response = $this->client->request(
            method: 'get',
            path: ['crm/v3/lists/%1$s/memberships/join-order', $listID],
            query: $parsed,
            options: $options,
            convert: JoinTimeAndRecordID::class,
            page: Page::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Remove the records provided from the list. Records that do not exist or that are not members of the list are ignored.
     *
     * This endpoint only works for lists that have a `processingType` of `MANUAL` or `SNAPSHOT`.
     *
     * @param list<string> $params
     *
     * @throws APIException
     */
    public function remove(
        string $listID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): MembershipsUpdateResponse {
        [$parsed, $options] = MembershipRemoveParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<MembershipsUpdateResponse> */
        $response = $this->client->request(
            method: 'put',
            path: ['crm/v3/lists/%1$s/memberships/remove', $listID],
            body: $parsed['body'],
            options: $options,
            convert: MembershipsUpdateResponse::class,
        );

        return $response->parse();
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
     * @throws APIException
     */
    public function removeAll(
        string $listID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['crm/v3/lists/%1$s/memberships', $listID],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
    }
}
