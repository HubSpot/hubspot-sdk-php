<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings\MeetingsLinks;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get a paged list meeting scheduling pages.
 *
 * @see HubspotSDK\Services\Scheduler\Meetings\MeetingsLinksService::list()
 *
 * @phpstan-type MeetingsLinkListParamsShape = array{
 *   after?: string,
 *   limit?: int,
 *   name?: string,
 *   organizerUserID?: string,
 *   type?: string,
 * }
 */
final class MeetingsLinkListParams implements BaseModel
{
    /** @use SdkModel<MeetingsLinkListParamsShape> */
    use SdkModel;
    use SdkParams;

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
     * Retrieve scheduling pages with a specified name.
     */
    #[Optional]
    public ?string $name;

    /**
     * Filter the response to scheduling pages created by the specified user.
     */
    #[Optional]
    public ?string $organizerUserID;

    /**
     * Filter the response to the specific type of meeting.
     */
    #[Optional]
    public ?string $type;

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
        ?string $name = null,
        ?string $organizerUserID = null,
        ?string $type = null,
    ): self {
        $obj = new self;

        null !== $after && $obj['after'] = $after;
        null !== $limit && $obj['limit'] = $limit;
        null !== $name && $obj['name'] = $name;
        null !== $organizerUserID && $obj['organizerUserID'] = $organizerUserID;
        null !== $type && $obj['type'] = $type;

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
     * Retrieve scheduling pages with a specified name.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Filter the response to scheduling pages created by the specified user.
     */
    public function withOrganizerUserID(string $organizerUserID): self
    {
        $obj = clone $this;
        $obj['organizerUserID'] = $organizerUserID;

        return $obj;
    }

    /**
     * Filter the response to the specific type of meeting.
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
