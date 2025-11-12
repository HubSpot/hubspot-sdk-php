<?php

declare(strict_types=1);

namespace HubspotSDK\Account\Activity;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve logs of user actions related to [security activity](https://knowledge.hubspot.com/account-management/view-and-export-account-activity-history#security-activity-history).
 *
 * @see HubspotSDK\Account\Activity->listSecurityActivities
 *
 * @phpstan-type ActivityListSecurityActivitiesParamsShape = array{
 *   after?: string,
 *   fromTimestamp?: int,
 *   limit?: int,
 *   toTimestamp?: int,
 *   userId?: int,
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
    #[Api(optional: true)]
    public ?string $after;

    /**
     * The start time, for retrieving logs within a specific timeframe.
     */
    #[Api(optional: true)]
    public ?int $fromTimestamp;

    /**
     * The maximum number of results to display per page. Max value of limit is 200.
     */
    #[Api(optional: true)]
    public ?int $limit;

    /**
     * The end time, for retrieving logs within a specific timeframe.
     */
    #[Api(optional: true)]
    public ?int $toTimestamp;

    /**
     * The ID of a user, for retrieving user-specific logs.
     */
    #[Api(optional: true)]
    public ?int $userId;

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
        ?int $userId = null,
    ): self {
        $obj = new self;

        null !== $after && $obj->after = $after;
        null !== $fromTimestamp && $obj->fromTimestamp = $fromTimestamp;
        null !== $limit && $obj->limit = $limit;
        null !== $toTimestamp && $obj->toTimestamp = $toTimestamp;
        null !== $userId && $obj->userId = $userId;

        return $obj;
    }

    /**
     * The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    /**
     * The start time, for retrieving logs within a specific timeframe.
     */
    public function withFromTimestamp(int $fromTimestamp): self
    {
        $obj = clone $this;
        $obj->fromTimestamp = $fromTimestamp;

        return $obj;
    }

    /**
     * The maximum number of results to display per page. Max value of limit is 200.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    /**
     * The end time, for retrieving logs within a specific timeframe.
     */
    public function withToTimestamp(int $toTimestamp): self
    {
        $obj = clone $this;
        $obj->toTimestamp = $toTimestamp;

        return $obj;
    }

    /**
     * The ID of a user, for retrieving user-specific logs.
     */
    public function withUserID(int $userID): self
    {
        $obj = clone $this;
        $obj->userId = $userID;

        return $obj;
    }
}
