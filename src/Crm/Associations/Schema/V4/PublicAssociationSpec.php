<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\Schema\V4;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicAssociationSpecShape = array{category: string, typeId: int}
 */
final class PublicAssociationSpec implements BaseModel
{
    /** @use SdkModel<PublicAssociationSpecShape> */
    use SdkModel;

    #[Required]
    public string $category;

    #[Required]
    public int $typeId;

    /**
     * `new PublicAssociationSpec()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAssociationSpec::with(category: ..., typeId: ...)
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
    public static function with(string $category, int $typeId): self
    {
        $obj = new self;

        $obj['category'] = $category;
        $obj['typeId'] = $typeId;

        return $obj;
    }

    public function withCategory(string $category): self
    {
        $obj = clone $this;
        $obj['category'] = $category;

        return $obj;
    }

    public function withTypeID(int $typeID): self
    {
        $obj = clone $this;
        $obj['typeId'] = $typeID;

        return $obj;
    }
}
