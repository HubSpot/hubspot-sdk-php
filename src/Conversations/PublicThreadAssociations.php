<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicThreadAssociationsShape = array{
 *   associatedTicketId?: string|null
 * }
 */
final class PublicThreadAssociations implements BaseModel
{
    /** @use SdkModel<PublicThreadAssociationsShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $associatedTicketId;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $associatedTicketId = null): self
    {
        $obj = new self;

        null !== $associatedTicketId && $obj->associatedTicketId = $associatedTicketId;

        return $obj;
    }

    public function withAssociatedTicketID(string $associatedTicketID): self
    {
        $obj = clone $this;
        $obj->associatedTicketId = $associatedTicketID;

        return $obj;
    }
}
