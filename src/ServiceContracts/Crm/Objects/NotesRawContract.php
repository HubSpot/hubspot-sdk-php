<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\CreatedResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\Notes\NoteCreateParams;
use HubspotSDK\Crm\Objects\Notes\NoteGetParams;
use HubspotSDK\Crm\Objects\Notes\NoteListParams;
use HubspotSDK\Crm\Objects\Notes\NoteSearchParams;
use HubspotSDK\Crm\Objects\Notes\NoteUpdateParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface NotesRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|NoteCreateParams $params
     *
     * @return BaseResponse<CreatedResponseSimplePublicObject>
     *
     * @throws APIException
     */
    public function create(
        array|NoteCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $noteID Path param:
     * @param array<mixed>|NoteUpdateParams $params
     *
     * @return BaseResponse<SimplePublicObject>
     *
     * @throws APIException
     */
    public function update(
        string $noteID,
        array|NoteUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|NoteListParams $params
     *
     * @return BaseResponse<Page<SimplePublicObjectWithAssociations>>
     *
     * @throws APIException
     */
    public function list(
        array|NoteListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $noteID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|NoteGetParams $params
     *
     * @return BaseResponse<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function get(
        string $noteID,
        array|NoteGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|NoteSearchParams $params
     *
     * @return BaseResponse<CollectionResponseWithTotalSimplePublicObject>
     *
     * @throws APIException
     */
    public function search(
        array|NoteSearchParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
