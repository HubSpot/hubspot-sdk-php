<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicObjectIDShape from \HubspotSDK\Crm\Objects\PublicObjectID
 * @phpstan-import-type AssociationSpecShape from \HubspotSDK\Crm\Objects\AssociationSpec
 *
 * @phpstan-type PublicAssociationsForObjectShape = array{
 *   to: PublicObjectID|PublicObjectIDShape,
 *   types: list<AssociationSpec|AssociationSpecShape>,
 * }
 */
final class PublicAssociationsForObject implements BaseModel
{
    /** @use SdkModel<PublicAssociationsForObjectShape> */
    use SdkModel;

    /**
     * Contains the Id of a Public Object.
     */
    #[Required]
    public PublicObjectID $to;

    /** @var list<AssociationSpec> $types */
    #[Required(list: AssociationSpec::class)]
    public array $types;

    /**
     * `new PublicAssociationsForObject()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAssociationsForObject::with(to: ..., types: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAssociationsForObject)->withTo(...)->withTypes(...)
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
     * @param PublicObjectID|PublicObjectIDShape $to
     * @param list<AssociationSpec|AssociationSpecShape> $types
     */
    public static function with(PublicObjectID|array $to, array $types): self
    {
        $self = new self;

        $self['to'] = $to;
        $self['types'] = $types;

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
