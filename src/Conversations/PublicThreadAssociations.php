<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicThreadAssociationsShape = array{
 *   associatedTicketID?: string|null
 * }
 */
final class PublicThreadAssociations implements BaseModel
{
    /** @use SdkModel<PublicThreadAssociationsShape> */
    use SdkModel;

    #[Optional('associatedTicketId')]
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
        $self = new self;

        null !== $associatedTicketID && $self['associatedTicketID'] = $associatedTicketID;

        return $self;
    }

    public function withAssociatedTicketID(string $associatedTicketID): self
    {
        $self = clone $this;
        $self['associatedTicketID'] = $associatedTicketID;

        return $self;
    }
}
