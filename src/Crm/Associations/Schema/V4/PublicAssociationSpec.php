<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\Schema\V4;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicAssociationSpecShape = array{category: string, typeID: int}
 */
final class PublicAssociationSpec implements BaseModel
{
    /** @use SdkModel<PublicAssociationSpecShape> */
    use SdkModel;

    #[Required]
    public string $category;

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

    public function withCategory(string $category): self
    {
        $self = clone $this;
        $self['category'] = $category;

        return $self;
    }

    public function withTypeID(int $typeID): self
    {
        $self = clone $this;
        $self['typeID'] = $typeID;

        return $self;
    }
}
