<?php

declare(strict_types=1);

namespace HubSpotSDK\Scheduler\Meetings\Basic;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Scheduler\Meetings\Basic\BasicListParams\Type;

/**
 * Get a paged list meeting scheduling pages.
 *
 * @see HubSpotSDK\Services\Scheduler\Meetings\BasicService::list()
 *
 * @phpstan-type BasicListParamsShape = array{
 *   after?: string|null,
 *   limit?: int|null,
 *   name?: string|null,
 *   organizerUserID?: string|null,
 *   type?: null|Type|value-of<Type>,
 * }
 */
final class BasicListParams implements BaseModel
{
    /** @use SdkModel<BasicListParamsShape> */
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

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?string $organizerUserID;

    /** @var value-of<Type>|null $type */
    #[Optional(enum: Type::class)]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        ?string $after = null,
        ?int $limit = null,
        ?string $name = null,
        ?string $organizerUserID = null,
        Type|string|null $type = null,
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

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withOrganizerUserID(string $organizerUserID): self
    {
        $self = clone $this;
        $self['organizerUserID'] = $organizerUserID;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
