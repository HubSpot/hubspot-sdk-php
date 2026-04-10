<?php

declare(strict_types=1);

namespace HubSpotSDK\Scheduler\Meetings;

use HubSpotSDK\AssociationSpec;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\PublicObjectID;

/**
 * @phpstan-import-type PublicObjectIDShape from \HubSpotSDK\PublicObjectID
 * @phpstan-import-type AssociationSpecShape from \HubSpotSDK\AssociationSpec
 *
 * @phpstan-type ExternalAssociationCreateRequestShape = array{
 *   to: PublicObjectID|PublicObjectIDShape,
 *   types: list<AssociationSpec|AssociationSpecShape>,
 * }
 */
final class ExternalAssociationCreateRequest implements BaseModel
{
    /** @use SdkModel<ExternalAssociationCreateRequestShape> */
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
     * `new ExternalAssociationCreateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalAssociationCreateRequest::with(to: ..., types: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalAssociationCreateRequest)->withTo(...)->withTypes(...)
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
