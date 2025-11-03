<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Lists;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Lists\APICollectionResponseRecordListMembershipNoPaging;
use HubspotSDK\Crm\Lists\JoinTimeAndRecordID;
use HubspotSDK\Crm\Lists\MembershipsUpdateResponse;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface MembershipsContract
{
    /**
     * @api
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
    ): Page;

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
    ): Page;

    /**
     * @api
     *
     * @param list<string> $body
     *
     * @throws APIException
     */
    public function add(
        string $listID,
        $body,
        ?RequestOptions $requestOptions = null
    ): MembershipsUpdateResponse;

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
    ): MembershipsUpdateResponse;

    /**
     * @api
     *
     * @param string $listID
     *
     * @throws APIException
     */
    public function addAllFromList(
        string $sourceListID,
        $listID,
        ?RequestOptions $requestOptions = null
    ): mixed;

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
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
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
    ): MembershipsUpdateResponse;

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
    ): MembershipsUpdateResponse;

    /**
     * @api
     *
     * @param string $objectTypeID
     *
     * @throws APIException
     */
    public function getLists(
        string $recordID,
        $objectTypeID,
        ?RequestOptions $requestOptions = null
    ): APICollectionResponseRecordListMembershipNoPaging;

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
    ): APICollectionResponseRecordListMembershipNoPaging;

    /**
     * @api
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
    ): Page;

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
    ): Page;

    /**
     * @api
     *
     * @param list<string> $body
     *
     * @throws APIException
     */
    public function remove(
        string $listID,
        $body,
        ?RequestOptions $requestOptions = null
    ): MembershipsUpdateResponse;

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
    ): MembershipsUpdateResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function removeAll(
        string $listID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
