<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Account;

use HubspotSDK\Account\Activity\HydratedCriticalAction;
use HubspotSDK\Account\Activity\PublicAPIUserActionEvent;
use HubspotSDK\Account\Activity\PublicLoginAudit;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface ActivityContract
{
    /**
     * @api
     *
     * @param list<int> $actingUserID
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $sort
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<PublicAPIUserActionEvent>
     *
     * @throws APIException
     */
    public function listAuditLogs(
        ?array $actingUserID = null,
        ?string $after = null,
        ?bool $fillFinalTimestamp = null,
        ?int $limit = null,
        ?\DateTimeInterface $occurredAfter = null,
        ?\DateTimeInterface $occurredBefore = null,
        ?array $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit The maximum number of results to display per page. Max value of limit is 200.
     * @param int $userID Identifier of user to retrieve activities for
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<PublicLoginAudit>
     *
     * @throws APIException
     */
    public function listLoginActivities(
        ?string $after = null,
        ?int $limit = null,
        ?int $userID = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $fromTimestamp limit to activities created after this epoch timestamp
     * @param int $limit The maximum number of results to display per page. Max value of limit is 200.
     * @param int $toTimestamp limit to activities created before this epoch timestamp
     * @param int $userID Identifier of user to retrieve activities for
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<HydratedCriticalAction>
     *
     * @throws APIException
     */
    public function listSecurityActivities(
        ?string $after = null,
        ?int $fromTimestamp = null,
        ?int $limit = null,
        ?int $toTimestamp = null,
        ?int $userID = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page;
}
