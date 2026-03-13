<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Lists;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Lists\APICollectionResponseRecordListMembershipNoPaging;
use HubspotSDK\Crm\Lists\JoinTimeAndRecordID;
use HubspotSDK\Crm\Lists\MembershipsUpdateResponse;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface MembershipsContract
{
    /**
     * @api
     *
     * @param string $listID the **ILS ID** of the list
     * @param string $after The paging offset token for the page that comes `after` the previously requested records.
     *
     * If provided, then the records in the response will be the records following the offset, sorted in *ascending* order. Takes precedence over the `before` offset.
     * @param string $before The paging offset token for the page that comes `before` the previously requested records.
     *
     * If provided, then the records in the response will be the records preceding the offset, sorted in *descending* order.
     * @param int $limit The number of records to return in the response. The maximum `limit` is 250.
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<JoinTimeAndRecordID>
     *
     * @throws APIException
     */
    public function list(
        string $listID,
        ?string $after = null,
        ?string $before = null,
        int $limit = 100,
        RequestOptions|array|null $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param string $listID the **ILS ID** of the `MANUAL` or `SNAPSHOT` list
     * @param list<string> $body
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function add(
        string $listID,
        array $body,
        RequestOptions|array|null $requestOptions = null,
    ): MembershipsUpdateResponse;

    /**
     * @api
     *
     * @param string $sourceListID the **ILS ID** of the *source list* to grab the records from, which are then added to the *destination list*
     * @param string $listID the **ILS ID** of the `MANUAL` or `SNAPSHOT` *destination list*, which the *source list* records are added to
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function addAllFromList(
        string $sourceListID,
        string $listID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $listID the **ILS ID** of the `MANUAL` or `SNAPSHOT` list
     * @param list<string> $recordIDsToAdd
     * @param list<string> $recordIDsToRemove
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function addAndRemove(
        string $listID,
        array $recordIDsToAdd,
        array $recordIDsToRemove,
        RequestOptions|array|null $requestOptions = null,
    ): MembershipsUpdateResponse;

    /**
     * @api
     *
     * @param string $recordID Id of the record
     * @param string $objectTypeID Object type id of the record
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getLists(
        string $recordID,
        string $objectTypeID,
        RequestOptions|array|null $requestOptions = null,
    ): APICollectionResponseRecordListMembershipNoPaging;

    /**
     * @api
     *
     * @param string $listID the **ILS ID** of the list
     * @param string $after The paging offset token for the page that comes `after` the previously requested records.
     *
     * If provided, then the records in the response will be the records following the offset, sorted in *ascending* order. Takes precedence over the `before` offset.
     * @param string $before The paging offset token for the page that comes `before` the previously requested records.
     *
     * If provided, then the records in the response will be the records preceding the offset, sorted in *descending* order.
     * @param int $limit The number of records to return in the response. The maximum `limit` is 250.
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<JoinTimeAndRecordID>
     *
     * @throws APIException
     */
    public function getPageOrderedByAddedToListDate(
        string $listID,
        ?string $after = null,
        ?string $before = null,
        int $limit = 100,
        RequestOptions|array|null $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param string $listID the **ILS ID** of the `MANUAL` or `SNAPSHOT` list
     * @param list<string> $body
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function remove(
        string $listID,
        array $body,
        RequestOptions|array|null $requestOptions = null,
    ): MembershipsUpdateResponse;

    /**
     * @api
     *
     * @param string $listID the **ILS ID** of the `MANUAL` or `SNAPSHOT` list
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function removeAll(
        string $listID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
