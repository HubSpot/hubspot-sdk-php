<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm;

use HubSpotSDK\AssociationSpec;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\PublicObjectID;

/**
 * @phpstan-import-type PublicObjectIDShape from \HubSpotSDK\PublicObjectID
 * @phpstan-import-type AssociationSpecShape from \HubSpotSDK\AssociationSpec
 *
 * @phpstan-type PublicAssociationMultiPostShape = array{
 *   from: PublicObjectID|PublicObjectIDShape,
 *   to: PublicObjectID|PublicObjectIDShape,
 *   types: list<AssociationSpec|AssociationSpecShape>,
 * }
 */
final class PublicAssociationMultiPost implements BaseModel
{
    /** @use SdkModel<PublicAssociationMultiPostShape> */
    use SdkModel;

    /**
     * Contains the Id of a Public Object.
     */
    #[Required]
    public PublicObjectID $from;

    /**
     * Contains the Id of a Public Object.
     */
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
     * @param PublicObjectID|PublicObjectIDShape $from
     * @param PublicObjectID|PublicObjectIDShape $to
     * @param list<AssociationSpec|AssociationSpecShape> $types
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
     * Contains the Id of a Public Object.
     *
     * @param PublicObjectID|PublicObjectIDShape $from
     */
    public function withFrom(PublicObjectID|array $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * Contains the Id of a Public Object.
     *
     * @param PublicObjectID|PublicObjectIDShape $to
     */
    public function withTo(PublicObjectID|array $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * @param list<AssociationSpec|AssociationSpecShape> $types
     */
    public function withTypes(array $types): self
    {
        $self = clone $this;
        $self['types'] = $types;

        return $self;
    }
}
