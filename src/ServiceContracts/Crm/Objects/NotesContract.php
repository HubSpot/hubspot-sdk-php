<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

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

interface NotesContract
{
    /**
     * @api
     *
     * @param array<mixed>|NoteCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|NoteCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): CreatedResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|NoteUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $noteID,
        array|NoteUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|NoteListParams $params
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        array|NoteListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $noteID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|NoteGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $noteID,
        array|NoteGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param array<mixed>|NoteSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        array|NoteSearchParams $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalSimplePublicObject;
}
