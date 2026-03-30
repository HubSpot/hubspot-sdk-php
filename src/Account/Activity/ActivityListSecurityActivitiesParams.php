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
     * The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Optional]
    public ?string $after;

    /**
     * Limit to activities created after this epoch timestamp.
     */
    #[Optional]
    public ?int $fromTimestamp;

    /**
     * The maximum number of results to display per page. Max value of limit is 200.
     */
    #[Optional]
    public ?int $limit;

    /**
     * Limit to activities created before this epoch timestamp.
     */
    #[Optional]
    public ?int $toTimestamp;

    /**
     * Identifier of user to retrieve activities for.
     */
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
     * The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    /**
     * Limit to activities created after this epoch timestamp.
     */
    public function withFromTimestamp(int $fromTimestamp): self
    {
        $self = clone $this;
        $self['fromTimestamp'] = $fromTimestamp;

        return $self;
    }

    /**
     * The maximum number of results to display per page. Max value of limit is 200.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Limit to activities created before this epoch timestamp.
     */
    public function withToTimestamp(int $toTimestamp): self
    {
        $self = clone $this;
        $self['toTimestamp'] = $toTimestamp;

        return $self;
    }

    /**
     * Identifier of user to retrieve activities for.
     */
    public function withUserID(int $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }
}
