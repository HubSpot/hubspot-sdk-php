<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Lists;

use HubspotSDK\Client;
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

use const HubspotSDK\Core\OMIT as omit;

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
     * @param string $after The paging offset token for the page that comes `after` the previously requested records.
     *
     * If provided, then the records in the response will be the records following the offset, sorted in *ascending* order. Takes precedence over the `before` offset.
     * @param string $before The paging offset token for the page that comes `before` the previously requested records.
     *
     * If provided, then the records in the response will be the records preceding the offset, sorted in *descending* order.
     * @param int $limit The number of records to return in the response. The maximum `limit` is 250.
     *
     * @return Page<JoinTimeAndRecordID>
     *
     * @throws APIException
     */
    public function list(
        string $listID,
        $after = omit,
        $before = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = ['after' => $after, 'before' => $before, 'limit' => $limit];

        return $this->listRaw($listID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<JoinTimeAndRecordID>
     *
     * @throws APIException
     */
    public function listRaw(
        string $listID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = MembershipListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @param list<string> $body
     *
     * @throws APIException
     */
    public function add(
        string $listID,
        $body,
        ?RequestOptions $requestOptions = null
    ): MembershipsUpdateResponse {
        $params = ['body' => $body];

        return $this->addRaw($listID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function addRaw(
        string $listID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): MembershipsUpdateResponse {
        [$parsed, $options] = MembershipAddParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @param string $listID
     *
     * @throws APIException
     */
    public function addAllFromList(
        string $sourceListID,
        $listID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['listID' => $listID];

        return $this->addAllFromListRaw($sourceListID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function addAllFromListRaw(
        string $sourceListID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = MembershipAddAllFromListParams::parseRequest(
            $params,
            $requestOptions
        );
        $listID = $parsed['listID'];
        unset($parsed['listID']);

        // @phpstan-ignore-next-line;
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
     * @param list<string> $recordIDsToAdd
     * @param list<string> $recordIDsToRemove
     *
     * @throws APIException
     */
    public function addAndRemove(
        string $listID,
        $recordIDsToAdd,
        $recordIDsToRemove,
        ?RequestOptions $requestOptions = null,
    ): MembershipsUpdateResponse {
        $params = [
            'recordIDsToAdd' => $recordIDsToAdd,
            'recordIDsToRemove' => $recordIDsToRemove,
        ];

        return $this->addAndRemoveRaw($listID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function addAndRemoveRaw(
        string $listID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): MembershipsUpdateResponse {
        [$parsed, $options] = MembershipAddAndRemoveParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @param string $objectTypeID
     *
     * @throws APIException
     */
    public function getLists(
        string $recordID,
        $objectTypeID,
        ?RequestOptions $requestOptions = null
    ): APICollectionResponseRecordListMembershipNoPaging {
        $params = ['objectTypeID' => $objectTypeID];

        return $this->getListsRaw($recordID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getListsRaw(
        string $recordID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): APICollectionResponseRecordListMembershipNoPaging {
        [$parsed, $options] = MembershipGetListsParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectTypeID = $parsed['objectTypeID'];
        unset($parsed['objectTypeID']);

        // @phpstan-ignore-next-line;
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
     * @param string $after The paging offset token for the page that comes `after` the previously requested records.
     *
     * If provided, then the records in the response will be the records following the offset, sorted in *ascending* order. Takes precedence over the `before` offset.
     * @param string $before The paging offset token for the page that comes `before` the previously requested records.
     *
     * If provided, then the records in the response will be the records preceding the offset, sorted in *descending* order.
     * @param int $limit The number of records to return in the response. The maximum `limit` is 250.
     *
     * @return Page<JoinTimeAndRecordID>
     *
     * @throws APIException
     */
    public function getPageOrderedByAddedToListDate(
        string $listID,
        $after = omit,
        $before = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = ['after' => $after, 'before' => $before, 'limit' => $limit];

        return $this->getPageOrderedByAddedToListDateRaw(
            $listID,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<JoinTimeAndRecordID>
     *
     * @throws APIException
     */
    public function getPageOrderedByAddedToListDateRaw(
        string $listID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [
            $parsed, $options,
        ] = MembershipGetPageOrderedByAddedToListDateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @param list<string> $body
     *
     * @throws APIException
     */
    public function remove(
        string $listID,
        $body,
        ?RequestOptions $requestOptions = null
    ): MembershipsUpdateResponse {
        $params = ['body' => $body];

        return $this->removeRaw($listID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function removeRaw(
        string $listID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): MembershipsUpdateResponse {
        [$parsed, $options] = MembershipRemoveParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function removeAll(
        string $listID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['crm/v3/lists/%1$s/memberships', $listID],
            options: $requestOptions,
            convert: null,
        );
    }
}
