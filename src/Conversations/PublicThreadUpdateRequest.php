<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\PublicThreadUpdateRequest\Status;
use HubspotSDK\Core\Attributes\Api;
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

    #[Api(optional: true)]
    public ?bool $archived;

    /** @var value-of<Status>|null $status */
    #[Api(enum: Status::class, optional: true)]
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
        $obj = new self;

        null !== $archived && $obj->archived = $archived;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
