<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\PublicThreadUpdateRequest\Status;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicThreadUpdateRequestShape = array{
 *   archived?: bool|null, status?: value-of<Status>|null
 * }
 */
final class PublicThreadUpdateRequest implements BaseModel
{
    /** @use SdkModel<PublicThreadUpdateRequestShape> */
    use SdkModel;

    #[Optional]
    public ?bool $archived;

    /** @var value-of<Status>|null $status */
    #[Optional(enum: Status::class)]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?bool $archived = null,
        Status|string|null $status = null
    ): self {
        $self = new self;

        null !== $archived && $self['archived'] = $archived;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
