<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\V4;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicObjectID;

/**
 * @phpstan-import-type PublicObjectIDShape from \HubspotSDK\PublicObjectID
 * @phpstan-import-type AssociationSpecShape from \HubspotSDK\AssociationSpec
 *
 * @phpstan-type PublicAssociationMultiPostShape = array{
 *   from: PublicObjectID|PublicObjectIDShape,
 *   to: PublicObjectID|PublicObjectIDShape,
 *   types: list<AssociationSpecShape>,
 * }
 */
final class PublicAssociationMultiPost implements BaseModel
{
    /** @use SdkModel<PublicAssociationMultiPostShape> */
    use SdkModel;

    #[Required]
    public PublicObjectID $from;

    #[Required]
    public PublicObjectID $to;

    /** @var list<AssociationSpec> $types */
    #[Required(list: AssociationSpec::class)]
    public array $types;

    /**
     * `new PublicAssociationMultiPost()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAssociationMultiPost::with(from: ..., to: ..., types: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAssociationMultiPost)->withFrom(...)->withTo(...)->withTypes(...)
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
     * @param list<AssociationSpecShape> $types
     */
    public static function with(
        PublicObjectID|array $from,
        PublicObjectID|array $to,
        array $types
    ): self {
        $self = new self;

        $self['from'] = $from;
        $self['to'] = $to;
        $self['types'] = $types;

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

    /**
     * @param list<AssociationSpecShape> $types
     */
    public function withTypes(array $types): self
    {
        $self = clone $this;
        $self['types'] = $types;

        return $self;
    }
}
