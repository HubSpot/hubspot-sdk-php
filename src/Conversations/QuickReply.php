<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
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

    #[Required]
    public string $value;

    #[Required]
    public string $valueType;

    #[Optional]
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
        $self = new self;

        $self['value'] = $value;
        $self['valueType'] = $valueType;

        null !== $label && $self['label'] = $label;

        return $self;
    }

    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }

    public function withValueType(string $valueType): self
    {
        $self = clone $this;
        $self['valueType'] = $valueType;

        return $self;
    }

    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }
}
