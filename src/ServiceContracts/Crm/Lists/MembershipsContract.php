<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Lists;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Lists\APICollectionResponseRecordListMembershipNoPaging;
use HubspotSDK\Crm\Lists\JoinTimeAndRecordID;
use HubspotSDK\Crm\Lists\Memberships\MembershipAddAllFromListParams;
use HubspotSDK\Crm\Lists\Memberships\MembershipAddAndRemoveParams;
use HubspotSDK\Crm\Lists\Memberships\MembershipGetListsParams;
use HubspotSDK\Crm\Lists\Memberships\MembershipGetPageOrderedByAddedToListDateParams;
use HubspotSDK\Crm\Lists\Memberships\MembershipListParams;
use HubspotSDK\Crm\Lists\MembershipsUpdateResponse;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface MembershipsContract
{
    /**
     * @api
     *
     * @param array<mixed>|MembershipListParams $params
     *
     * @return Page<JoinTimeAndRecordID>
     *
     * @throws APIException
     */
    public function list(
        string $listID,
        array|MembershipListParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param list<string> $params
     *
     * @throws APIException
     */
    public function add(
        string $listID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): MembershipsUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|MembershipAddAllFromListParams $params
     *
     * @throws APIException
     */
    public function addAllFromList(
        string $sourceListID,
        array|MembershipAddAllFromListParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|MembershipAddAndRemoveParams $params
     *
     * @throws APIException
     */
    public function addAndRemove(
        string $listID,
        array|MembershipAddAndRemoveParams $params,
        ?RequestOptions $requestOptions = null,
    ): MembershipsUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|MembershipGetListsParams $params
     *
     * @throws APIException
     */
    public function getLists(
        string $recordID,
        array|MembershipGetListsParams $params,
        ?RequestOptions $requestOptions = null,
    ): APICollectionResponseRecordListMembershipNoPaging;

    /**
     * @api
     *
     * @param array<mixed>|MembershipGetPageOrderedByAddedToListDateParams $params
     *
     * @return Page<JoinTimeAndRecordID>
     *
     * @throws APIException
     */
    public function getPageOrderedByAddedToListDate(
        string $listID,
        array|MembershipGetPageOrderedByAddedToListDateParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param list<string> $params
     *
     * @throws APIException
     */
    public function remove(
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
