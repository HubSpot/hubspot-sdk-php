<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type QuickReplyShape = array{
 *   value: string, valueType: string, label?: string|null
 * }
 */
final class QuickReply implements BaseModel
{
    /** @use SdkModel<QuickReplyShape> */
    use SdkModel;

    #[Api]
    public string $value;

    #[Api]
    public string $valueType;

    #[Api(optional: true)]
    public ?string $label;

    /**
     * `new QuickReply()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * QuickReply::with(value: ..., valueType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new QuickReply)->withValue(...)->withValueType(...)
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
        string $value,
        string $valueType,
        ?string $label = null
    ): self {
        $obj = new self;

        $obj->value = $value;
        $obj->valueType = $valueType;

        null !== $label && $obj->label = $label;

        return $obj;
    }

    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }

    public function withValueType(string $valueType): self
    {
        $obj = clone $this;
        $obj->valueType = $valueType;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }
}
