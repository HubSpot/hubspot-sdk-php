<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\AssociationsSchema;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicAssociationSpecShape = array{category: string, typeID: int}
 */
final class PublicAssociationSpec implements BaseModel
{
    /** @use SdkModel<PublicAssociationSpecShape> */
    use SdkModel;

    /**
     * Specifies the category of the association, which can be HUBSPOT_DEFINED, INTEGRATOR_DEFINED, or USER_DEFINED.
     */
    #[Required]
    public string $category;

    /**
     * A unique integer identifier for the specific association type within its category.
     */
    #[Required('typeId')]
    public int $typeID;

    /**
     * `new PublicAssociationSpec()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAssociationSpec::with(category: ..., typeID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAssociationSpec)->withCategory(...)->withTypeID(...)
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
     */
    public static function with(string $category, int $typeID): self
    {
        $self = new self;

        $self['category'] = $category;
        $self['typeID'] = $typeID;

        return $self;
    }

    /**
     * Specifies the category of the association, which can be HUBSPOT_DEFINED, INTEGRATOR_DEFINED, or USER_DEFINED.
     */
    public function withCategory(string $category): self
    {
        $self = clone $this;
        $self['category'] = $category;

        return $self;
    }

    /**
     * A unique integer identifier for the specific association type within its category.
     */
    public function withTypeID(int $typeID): self
    {
        $self = clone $this;
        $self['typeID'] = $typeID;

        return $self;
    }
}
