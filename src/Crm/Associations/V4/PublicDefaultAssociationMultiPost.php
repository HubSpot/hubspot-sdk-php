<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\V4;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicObjectID;

/**
 * @phpstan-import-type PublicObjectIDShape from \HubspotSDK\PublicObjectID
 *
 * @phpstan-type PublicDefaultAssociationMultiPostShape = array{
 *   from: PublicObjectID|PublicObjectIDShape,
 *   to: PublicObjectID|PublicObjectIDShape,
 * }
 */
final class PublicDefaultAssociationMultiPost implements BaseModel
{
    /** @use SdkModel<PublicDefaultAssociationMultiPostShape> */
    use SdkModel;

    #[Required]
    public PublicObjectID $from;

    #[Required]
    public PublicObjectID $to;

    /**
     * `new PublicDefaultAssociationMultiPost()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicDefaultAssociationMultiPost::with(from: ..., to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicDefaultAssociationMultiPost)->withFrom(...)->withTo(...)
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
     * @param PublicObjectIDShape $from
     * @param PublicObjectIDShape $to
     */
    public static function with(
        PublicObjectID|array $from,
        PublicObjectID|array $to
    ): self {
        $self = new self;

        $self['from'] = $from;
        $self['to'] = $to;

        return $self;
    }

    /**
     * @param PublicObjectIDShape $from
     */
    public function withFrom(PublicObjectID|array $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * @param PublicObjectIDShape $to
     */
    public function withTo(PublicObjectID|array $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }
}
