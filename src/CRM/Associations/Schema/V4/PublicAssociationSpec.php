<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\Schema\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_association_spec = array{category: string, typeID: int}
 */
final class PublicAssociationSpec implements BaseModel
{
    /** @use SdkModel<public_association_spec> */
    use SdkModel;

    #[Api]
    public string $category;

    #[Api('typeId')]
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
        $obj = new self;

        $obj->category = $category;
        $obj->typeID = $typeID;

        return $obj;
    }

    public function withCategory(string $category): self
    {
        $obj = clone $this;
        $obj->category = $category;

        return $obj;
    }

    public function withTypeID(int $typeID): self
    {
        $obj = clone $this;
        $obj->typeID = $typeID;

        return $obj;
    }
}
