<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type Option1Shape = array{
 *   hidden: bool,
 *   label: string,
 *   value: string,
 *   description?: string|null,
 *   displayOrder?: int|null,
 * }
 */
final class Option1 implements BaseModel
{
    /** @use SdkModel<Option1Shape> */
    use SdkModel;

    #[Api]
    public bool $hidden;

    #[Api]
    public string $label;

    #[Api]
    public string $value;

    #[Api(optional: true)]
    public ?string $description;

    #[Api(optional: true)]
    public ?int $displayOrder;

    /**
     * `new Option1()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Option1::with(hidden: ..., label: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Option1)->withHidden(...)->withLabel(...)->withValue(...)
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
        bool $hidden,
        string $label,
        string $value,
        ?string $description = null,
        ?int $displayOrder = null,
    ): self {
        $obj = new self;

        $obj['hidden'] = $hidden;
        $obj['label'] = $label;
        $obj['value'] = $value;

        null !== $description && $obj['description'] = $description;
        null !== $displayOrder && $obj['displayOrder'] = $displayOrder;

        return $obj;
    }

    public function withHidden(bool $hidden): self
    {
        $obj = clone $this;
        $obj['hidden'] = $hidden;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj['value'] = $value;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj['displayOrder'] = $displayOrder;

        return $obj;
    }
}
