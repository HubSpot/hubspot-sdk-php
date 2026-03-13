<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Lists;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Lists\APICollectionResponseRecordListMembershipNoPaging;
use HubspotSDK\Crm\Lists\JoinTimeAndRecordID;
use HubspotSDK\Crm\Lists\MembershipsUpdateResponse;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Lists\MembershipsContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class MembershipsService implements MembershipsContract
{
    /**
     * @api
     */
    public MembershipsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MembershipsRawService($client);
    }

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
    ): Page {
        $params = Util::removeNulls(
            ['after' => $after, 'before' => $before, 'limit' => $limit]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($listID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Add the records provided to the list. Records that do not exist or that are already members of the list are ignored.
     *
     * This endpoint only works for lists that have a `processingType` of `MANUAL` or `SNAPSHOT`.
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
    ): MembershipsUpdateResponse {
        $params = Util::removeNulls(['body' => $body]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->add($listID, params: $params, requestOptions: $requestOptions);

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
    ): mixed {
        $params = Util::removeNulls(['listID' => $listID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->addAllFromList($sourceListID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Add and/or remove records that have already been created in the system to and/or from a list.
     *
     * This endpoint only works for lists that have a `processingType` of `MANUAL` or `SNAPSHOT`.
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
    ): MembershipsUpdateResponse {
        $params = Util::removeNulls(
            [
                'recordIDsToAdd' => $recordIDsToAdd,
                'recordIDsToRemove' => $recordIDsToRemove,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->addAndRemove($listID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * For given record provide lists this record is member of.
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
    ): APICollectionResponseRecordListMembershipNoPaging {
        $params = Util::removeNulls(['objectTypeID' => $objectTypeID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getLists($recordID, params: $params, requestOptions: $requestOptions);

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
    ): Page {
        $params = Util::removeNulls(
            ['after' => $after, 'before' => $before, 'limit' => $limit]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getPageOrderedByAddedToListDate($listID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Remove the records provided from the list. Records that do not exist or that are not members of the list are ignored.
     *
     * This endpoint only works for lists that have a `processingType` of `MANUAL` or `SNAPSHOT`.
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
    ): MembershipsUpdateResponse {
        $params = Util::removeNulls(['body' => $body]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->remove($listID, params: $params, requestOptions: $requestOptions);

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
     * @param string $listID the **ILS ID** of the `MANUAL` or `SNAPSHOT` list
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function removeAll(
        string $listID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->removeAll($listID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
