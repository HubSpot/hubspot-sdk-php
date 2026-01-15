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

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface MembershipsRawContract
{
    /**
     * @api
     *
     * @param string $listID the **ILS ID** of the list
     * @param array<string,mixed>|MembershipListParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $listID the **ILS ID** of the `MANUAL` or `SNAPSHOT` list
     * @param array<string,mixed>|MembershipAddParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $sourceListID the **ILS ID** of the *source list* to grab the records from, which are then added to the *destination list*
     * @param array<string,mixed>|MembershipAddAllFromListParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $listID the **ILS ID** of the `MANUAL` or `SNAPSHOT` list
     * @param array<string,mixed>|MembershipAddAndRemoveParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $recordID Id of the record
     * @param array<string,mixed>|MembershipGetListsParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $listID the **ILS ID** of the list
     * @param array<string,mixed>|MembershipGetPageOrderedByAddedToListDateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $listID the **ILS ID** of the `MANUAL` or `SNAPSHOT` list
     * @param array<string,mixed>|MembershipRemoveParams $params
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;
}
