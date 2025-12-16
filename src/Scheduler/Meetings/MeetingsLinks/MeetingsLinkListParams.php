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
 *   after?: string|null,
 *   limit?: int|null,
 *   name?: string|null,
 *   organizerUserID?: string|null,
 *   type?: string|null,
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
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $limit && $self['limit'] = $limit;
        null !== $name && $self['name'] = $name;
        null !== $organizerUserID && $self['organizerUserID'] = $organizerUserID;
        null !== $type && $self['type'] = $type;

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

    /**
     * The maximum number of results to display per page.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Retrieve scheduling pages with a specified name.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Filter the response to scheduling pages created by the specified user.
     */
    public function withOrganizerUserID(string $organizerUserID): self
    {
        $self = clone $this;
        $self['organizerUserID'] = $organizerUserID;

        return $self;
    }

    /**
     * Filter the response to the specific type of meeting.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
