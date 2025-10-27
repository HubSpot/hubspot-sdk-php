<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_thread_associations = array{associatedTicketID?: string}
 */
final class PublicThreadAssociations implements BaseModel
{
    /** @use SdkModel<public_thread_associations> */
    use SdkModel;

    #[Api('associatedTicketId', optional: true)]
    public ?string $associatedTicketID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $associatedTicketID = null): self
    {
        $obj = new self;

        null !== $associatedTicketID && $obj->associatedTicketID = $associatedTicketID;

        return $obj;
    }

    public function withAssociatedTicketID(string $associatedTicketID): self
    {
        $obj = clone $this;
        $obj->associatedTicketID = $associatedTicketID;

        return $obj;
    }
}
