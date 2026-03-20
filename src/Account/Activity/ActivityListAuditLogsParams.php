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
 *   actingUserID?: list<int>|null,
 *   after?: string|null,
 *   fillFinalTimestamp?: bool|null,
 *   limit?: int|null,
 *   occurredAfter?: \DateTimeInterface|null,
 *   occurredBefore?: \DateTimeInterface|null,
 *   sort?: list<string>|null,
 * }
 */
final class ActivityListAuditLogsParams implements BaseModel
{
    /** @use SdkModel<ActivityListAuditLogsParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<int>|null $actingUserID */
    #[Optional(list: 'int')]
    public ?array $actingUserID;

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Optional]
    public ?string $after;

    #[Optional]
    public ?bool $fillFinalTimestamp;

    /**
     * The maximum number of results to display per page.
     */
    #[Optional]
    public ?int $limit;

    #[Optional]
    public ?\DateTimeInterface $occurredAfter;

    #[Optional]
    public ?\DateTimeInterface $occurredBefore;

    /** @var list<string>|null $sort */
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
     * @param list<int>|null $actingUserID
     * @param list<string>|null $sort
     */
    public static function with(
        ?array $actingUserID = null,
        ?string $after = null,
        ?bool $fillFinalTimestamp = null,
        ?int $limit = null,
        ?\DateTimeInterface $occurredAfter = null,
        ?\DateTimeInterface $occurredBefore = null,
        ?array $sort = null,
    ): self {
        $self = new self;

        null !== $actingUserID && $self['actingUserID'] = $actingUserID;
        null !== $after && $self['after'] = $after;
        null !== $fillFinalTimestamp && $self['fillFinalTimestamp'] = $fillFinalTimestamp;
        null !== $limit && $self['limit'] = $limit;
        null !== $occurredAfter && $self['occurredAfter'] = $occurredAfter;
        null !== $occurredBefore && $self['occurredBefore'] = $occurredBefore;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * @param list<int> $actingUserID
     */
    public function withActingUserID(array $actingUserID): self
    {
        $self = clone $this;
        $self['actingUserID'] = $actingUserID;

        return $self;
    }

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    public function withFillFinalTimestamp(bool $fillFinalTimestamp): self
    {
        $self = clone $this;
        $self['fillFinalTimestamp'] = $fillFinalTimestamp;

        return $self;
    }

    /**
     * The maximum number of results to display per page.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    public function withOccurredAfter(\DateTimeInterface $occurredAfter): self
    {
        $self = clone $this;
        $self['occurredAfter'] = $occurredAfter;

        return $self;
    }

    public function withOccurredBefore(\DateTimeInterface $occurredBefore): self
    {
        $self = clone $this;
        $self['occurredBefore'] = $occurredBefore;

        return $self;
    }

    /**
     * @param list<string> $sort
     */
    public function withSort(array $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }
}
