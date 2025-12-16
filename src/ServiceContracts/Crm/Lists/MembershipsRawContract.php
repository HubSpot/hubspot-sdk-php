<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Lists;

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

interface MembershipsRawContract
{
    /**
     * @api
     *
     * @param string $listID the **ILS ID** of the list
     * @param array<string,mixed>|MembershipListParams $params
     *
     * @return BaseResponse<Page<JoinTimeAndRecordID>>
     *
     * @throws APIException
     */
    public function list(
        string $listID,
        array|MembershipListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $listID the **ILS ID** of the `MANUAL` or `SNAPSHOT` list
     * @param array<string,mixed>|MembershipAddParams $params
     *
     * @return BaseResponse<MembershipsUpdateResponse>
     *
     * @throws APIException
     */
    public function add(
        string $listID,
        array|MembershipAddParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $sourceListID the **ILS ID** of the *source list* to grab the records from, which are then added to the *destination list*
     * @param array<string,mixed>|MembershipAddAllFromListParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function addAllFromList(
        string $sourceListID,
        array|MembershipAddAllFromListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $listID the **ILS ID** of the `MANUAL` or `SNAPSHOT` list
     * @param array<string,mixed>|MembershipAddAndRemoveParams $params
     *
     * @return BaseResponse<MembershipsUpdateResponse>
     *
     * @throws APIException
     */
    public function addAndRemove(
        string $listID,
        array|MembershipAddAndRemoveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $recordID Id of the record
     * @param array<string,mixed>|MembershipGetListsParams $params
     *
     * @return BaseResponse<APICollectionResponseRecordListMembershipNoPaging>
     *
     * @throws APIException
     */
    public function getLists(
        string $recordID,
        array|MembershipGetListsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $listID the **ILS ID** of the list
     * @param array<string,mixed>|MembershipGetPageOrderedByAddedToListDateParams $params
     *
     * @return BaseResponse<Page<JoinTimeAndRecordID>>
     *
     * @throws APIException
     */
    public function getPageOrderedByAddedToListDate(
        string $listID,
        array|MembershipGetPageOrderedByAddedToListDateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $listID the **ILS ID** of the `MANUAL` or `SNAPSHOT` list
     * @param array<string,mixed>|MembershipRemoveParams $params
     *
     * @return BaseResponse<MembershipsUpdateResponse>
     *
     * @throws APIException
     */
    public function remove(
        string $listID,
        array|MembershipRemoveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $listID the **ILS ID** of the `MANUAL` or `SNAPSHOT` list
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function removeAll(
        string $listID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
