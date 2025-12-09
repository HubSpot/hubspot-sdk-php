<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicObjectID;

/**
 * @phpstan-type PublicAssociationShape = array{
 *   from: PublicObjectID, to: PublicObjectID, type: string
 * }
 */
final class PublicAssociation implements BaseModel
{
    /** @use SdkModel<PublicAssociationShape> */
    use SdkModel;

    #[Required]
    public PublicObjectID $from;

    #[Required]
    public PublicObjectID $to;

    /**
     * The type of association between the 'from' and 'to' objects.
     */
    #[Required]
    public string $type;

    /**
     * `new PublicAssociation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAssociation::with(from: ..., to: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAssociation)->withFrom(...)->withTo(...)->withType(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PublicObjectID|array{id: string} $from
     * @param PublicObjectID|array{id: string} $to
     */
    public static function with(
        PublicObjectID|array $from,
        PublicObjectID|array $to,
        string $type
    ): self {
        $self = new self;

        $self['from'] = $from;
        $self['to'] = $to;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param PublicObjectID|array{id: string} $from
     */
    public function withFrom(PublicObjectID|array $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * @param PublicObjectID|array{id: string} $to
     */
    public function withTo(PublicObjectID|array $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * The type of association between the 'from' and 'to' objects.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
