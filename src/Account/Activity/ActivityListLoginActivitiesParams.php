<?php

declare(strict_types=1);

namespace HubspotSDK\Account\Activity;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve logs of user actions related to [login activity](https://knowledge.hubspot.com/account-management/view-and-export-account-activity-history#account-login-history).
 *
 * @see HubspotSDK\Services\Account\ActivityService::listLoginActivities()
 *
 * @phpstan-type ActivityListLoginActivitiesParamsShape = array{
 *   after?: string|null, limit?: int|null, userID?: int|null
 * }
 */
final class ActivityListLoginActivitiesParams implements BaseModel
{
    /** @use SdkModel<ActivityListLoginActivitiesParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Optional]
    public ?string $after;

    /**
     * The maximum number of results to display per page. Max value of limit is 200.
     */
    #[Optional]
    public ?int $limit;

    /**
     * The ID of a user, for retrieving user-specific logs.
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
        ?int $limit = null,
        ?int $userID = null
    ): self {
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $limit && $self['limit'] = $limit;
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
     * The maximum number of results to display per page. Max value of limit is 200.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * The ID of a user, for retrieving user-specific logs.
     */
    public function withUserID(int $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }
}
