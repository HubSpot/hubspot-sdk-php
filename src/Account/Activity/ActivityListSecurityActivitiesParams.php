<?php

declare(strict_types=1);

namespace HubspotSDK\Account\Activity;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve logs of user actions related to [security activity](https://knowledge.hubspot.com/account-management/view-and-export-account-activity-history#security-activity-history).
 *
 * @see HubspotSDK\Services\Account\ActivityService::listSecurityActivities()
 *
 * @phpstan-type ActivityListSecurityActivitiesParamsShape = array{
 *   after?: string|null,
 *   fromTimestamp?: int|null,
 *   limit?: int|null,
 *   toTimestamp?: int|null,
 *   userID?: int|null,
 * }
 */
final class ActivityListSecurityActivitiesParams implements BaseModel
{
    /** @use SdkModel<ActivityListSecurityActivitiesParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Optional]
    public ?string $after;

    #[Optional]
    public ?int $fromTimestamp;

    /**
     * The maximum number of results to display per page.
     */
    #[Optional]
    public ?int $limit;

    #[Optional]
    public ?int $toTimestamp;

    #[Optional]
    public ?int $userID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $after = null,
        ?int $fromTimestamp = null,
        ?int $limit = null,
        ?int $toTimestamp = null,
        ?int $userID = null,
    ): self {
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $fromTimestamp && $self['fromTimestamp'] = $fromTimestamp;
        null !== $limit && $self['limit'] = $limit;
        null !== $toTimestamp && $self['toTimestamp'] = $toTimestamp;
        null !== $userID && $self['userID'] = $userID;

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

    public function withFromTimestamp(int $fromTimestamp): self
    {
        $self = clone $this;
        $self['fromTimestamp'] = $fromTimestamp;

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

    public function withToTimestamp(int $toTimestamp): self
    {
        $self = clone $this;
        $self['toTimestamp'] = $toTimestamp;

        return $self;
    }

    public function withUserID(int $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }
}
