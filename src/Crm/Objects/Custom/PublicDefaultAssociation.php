<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Custom;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicObjectID;

/**
 * @phpstan-import-type AssociationSpecShape from \HubspotSDK\AssociationSpec
 * @phpstan-import-type PublicObjectIDShape from \HubspotSDK\PublicObjectID
 *
 * @phpstan-type PublicDefaultAssociationShape = array{
 *   associationSpec: AssociationSpec|AssociationSpecShape,
 *   from: PublicObjectID|PublicObjectIDShape,
 *   to: PublicObjectID|PublicObjectIDShape,
 * }
 */
final class PublicDefaultAssociation implements BaseModel
{
    /** @use SdkModel<PublicDefaultAssociationShape> */
    use SdkModel;

    /**
     * Defines the type, direction, and details of the relationship between two CRM objects.
     */
    #[Required]
    public AssociationSpec $associationSpec;

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

    /**
     * `new PublicDefaultAssociation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicDefaultAssociation::with(associationSpec: ..., from: ..., to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicDefaultAssociation)
     *   ->withAssociationSpec(...)
     *   ->withFrom(...)
     *   ->withTo(...)
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
     * @param AssociationSpec|AssociationSpecShape $associationSpec
     * @param PublicObjectID|PublicObjectIDShape $from
     * @param PublicObjectID|PublicObjectIDShape $to
     */
    public static function with(
        AssociationSpec|array $associationSpec,
        PublicObjectID|array $from,
        PublicObjectID|array $to,
    ): self {
        $self = new self;

        $self['associationSpec'] = $associationSpec;
        $self['from'] = $from;
        $self['to'] = $to;

        return $self;
    }

    /**
     * Defines the type, direction, and details of the relationship between two CRM objects.
     *
     * @param AssociationSpec|AssociationSpecShape $associationSpec
     */
    public function withAssociationSpec(
        AssociationSpec|array $associationSpec
    ): self {
        $self = clone $this;
        $self['associationSpec'] = $associationSpec;

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
}
