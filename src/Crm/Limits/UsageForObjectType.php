<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Limits;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type UsageForObjectTypeShape = array{
 *   objectTypeID: string, pluralLabel: string, singularLabel: string, usage: int
 * }
 */
final class UsageForObjectType implements BaseModel
{
    /** @use SdkModel<UsageForObjectTypeShape> */
    use SdkModel;

    /**
     * The unique identifier for the object type.
     */
    #[Required('objectTypeId')]
    public string $objectTypeID;

    /**
     * The plural form of the label for the object type.
     */
    #[Required]
    public string $pluralLabel;

    /**
     * The singular form of the label for the object type.
     */
    #[Required]
    public string $singularLabel;

    /**
     * The number of records used for the object type.
     */
    #[Required]
    public int $usage;

    /**
     * `new UsageForObjectType()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UsageForObjectType::with(
     *   objectTypeID: ..., pluralLabel: ..., singularLabel: ..., usage: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UsageForObjectType)
     *   ->withObjectTypeID(...)
     *   ->withPluralLabel(...)
     *   ->withSingularLabel(...)
     *   ->withUsage(...)
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
    public static function with(
        string $objectTypeID,
        string $pluralLabel,
        string $singularLabel,
        int $usage
    ): self {
        $obj = new self;

        $obj['objectTypeID'] = $objectTypeID;
        $obj['pluralLabel'] = $pluralLabel;
        $obj['singularLabel'] = $singularLabel;
        $obj['usage'] = $usage;

        return $obj;
    }

    /**
     * The unique identifier for the object type.
     */
    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj['objectTypeID'] = $objectTypeID;

        return $obj;
    }

    /**
     * The plural form of the label for the object type.
     */
    public function withPluralLabel(string $pluralLabel): self
    {
        $obj = clone $this;
        $obj['pluralLabel'] = $pluralLabel;

        return $obj;
    }

    /**
     * The singular form of the label for the object type.
     */
    public function withSingularLabel(string $singularLabel): self
    {
        $obj = clone $this;
        $obj['singularLabel'] = $singularLabel;

        return $obj;
    }

    /**
     * The number of records used for the object type.
     */
    public function withUsage(int $usage): self
    {
        $obj = clone $this;
        $obj['usage'] = $usage;

        return $obj;
    }
}
