<?php

declare(strict_types=1);

namespace HubspotSDK\Account\Activity;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve activity history for user actions related to approvals, content updates, CRM object updates, security activity, and more (Enterprise only). Learn more about [activities included in audit log exports](https://knowledge.hubspot.com/account-management/view-and-export-account-activity-history-in-a-centralized-audit-log?hubs_content=knowledge.hubspot.com/account-management/view-and-export-account-activity-history&hubs_content-cta=centralized%20audit%20log#data-included-in-the-centralized-audit-log).
 *
 * @see HubspotSDK\Services\Account\ActivityService::listAuditLogs()
 *
 * @phpstan-type ActivityListAuditLogsParamsShape = array{
 *   actingUserId?: list<int>,
 *   after?: string,
 *   limit?: int,
 *   occurredAfter?: \DateTimeInterface,
 *   occurredBefore?: \DateTimeInterface,
 *   sort?: list<string>,
 * }
 */
final class ActivityListAuditLogsParams implements BaseModel
{
    /** @use SdkModel<ActivityListAuditLogsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of a user, for retrieving user-specific logs.
     *
     * @var list<int>|null $actingUserId
     */
    #[Optional(list: 'int')]
    public ?array $actingUserId;

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Optional]
    public ?string $after;

    /**
     * The maximum number of results to display per page.
     */
    #[Optional]
    public ?int $limit;

    /**
     * A timestamp, as a starting point for retrieving activity logs.
     */
    #[Optional]
    public ?\DateTimeInterface $occurredAfter;

    /**
     * A timestamp, as an end point for retrieving activity logs.
     */
    #[Optional]
    public ?\DateTimeInterface $occurredBefore;

    /**
     * Set to `occurredAt` to order results by the time of the event. By default, events are ordered from oldest to newest.
     *
     * @var list<string>|null $sort
     */
    #[Optional(list: 'string')]
    public ?array $sort;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<int> $actingUserId
     * @param list<string> $sort
     */
    public static function with(
        ?array $actingUserId = null,
        ?string $after = null,
        ?int $limit = null,
        ?\DateTimeInterface $occurredAfter = null,
        ?\DateTimeInterface $occurredBefore = null,
        ?array $sort = null,
    ): self {
        $obj = new self;

        null !== $actingUserId && $obj['actingUserId'] = $actingUserId;
        null !== $after && $obj['after'] = $after;
        null !== $limit && $obj['limit'] = $limit;
        null !== $occurredAfter && $obj['occurredAfter'] = $occurredAfter;
        null !== $occurredBefore && $obj['occurredBefore'] = $occurredBefore;
        null !== $sort && $obj['sort'] = $sort;

        return $obj;
    }

    /**
     * The ID of a user, for retrieving user-specific logs.
     *
     * @param list<int> $actingUserID
     */
    public function withActingUserID(array $actingUserID): self
    {
        $obj = clone $this;
        $obj['actingUserId'] = $actingUserID;

        return $obj;
    }

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj['after'] = $after;

        return $obj;
    }

    /**
     * The maximum number of results to display per page.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj['limit'] = $limit;

        return $obj;
    }

    /**
     * A timestamp, as a starting point for retrieving activity logs.
     */
    public function withOccurredAfter(\DateTimeInterface $occurredAfter): self
    {
        $obj = clone $this;
        $obj['occurredAfter'] = $occurredAfter;

        return $obj;
    }

    /**
     * A timestamp, as an end point for retrieving activity logs.
     */
    public function withOccurredBefore(\DateTimeInterface $occurredBefore): self
    {
        $obj = clone $this;
        $obj['occurredBefore'] = $occurredBefore;

        return $obj;
    }

    /**
     * Set to `occurredAt` to order results by the time of the event. By default, events are ordered from oldest to newest.
     *
     * @param list<string> $sort
     */
    public function withSort(array $sort): self
    {
        $obj = clone $this;
        $obj['sort'] = $sort;

        return $obj;
    }
}
