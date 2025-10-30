<?php

declare(strict_types=1);

namespace HubspotSDK\Account\Activity;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve logs of user actions related to [login activity](https://knowledge.hubspot.com/account-management/view-and-export-account-activity-history#account-login-history).
 *
 * @see HubspotSDK\Account\Activity->listLoginActivities
 *
 * @phpstan-type ActivityListLoginActivitiesParamsShape = array{
 *   after?: string, limit?: int, userID?: int
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
    #[Api(optional: true)]
    public ?string $after;

    /**
     * The maximum number of results to display per page. Max value of limit is 200.
     */
    #[Api(optional: true)]
    public ?int $limit;

    /**
     * The ID of a user, for retrieving user-specific logs.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $after && $obj->after = $after;
        null !== $limit && $obj->limit = $limit;
        null !== $userID && $obj->userID = $userID;

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
     * The maximum number of results to display per page. Max value of limit is 200.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    /**
     * The ID of a user, for retrieving user-specific logs.
     */
    public function withUserID(int $userID): self
    {
        $obj = clone $this;
        $obj->userID = $userID;

        return $obj;
    }
}
