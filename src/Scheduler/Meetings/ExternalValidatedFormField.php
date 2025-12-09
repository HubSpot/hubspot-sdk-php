<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalValidatedFormFieldShape = array{
 *   isCustom: bool,
 *   label: string,
 *   name: string,
 *   value: string,
 *   fieldType?: string|null,
 *   translatedLabel?: string|null,
 *   valueLabel?: string|null,
 * }
 */
final class ExternalValidatedFormField implements BaseModel
{
    /** @use SdkModel<ExternalValidatedFormFieldShape> */
    use SdkModel;

    #[Required]
    public bool $isCustom;

    #[Required]
    public string $label;

    #[Required]
    public string $name;

    #[Required]
    public string $value;

    #[Optional]
    public ?string $fieldType;

    #[Optional]
    public ?string $translatedLabel;

    #[Optional]
    public ?string $valueLabel;

    /**
     * `new ExternalValidatedFormField()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalValidatedFormField::with(
     *   isCustom: ..., label: ..., name: ..., value: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalValidatedFormField)
     *   ->withIsCustom(...)
     *   ->withLabel(...)
     *   ->withName(...)
     *   ->withValue(...)
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
        bool $isCustom,
        string $label,
        string $name,
        string $value,
        ?string $fieldType = null,
        ?string $translatedLabel = null,
        ?string $valueLabel = null,
    ): self {
        $obj = new self;

        $obj['isCustom'] = $isCustom;
        $obj['label'] = $label;
        $obj['name'] = $name;
        $obj['value'] = $value;

        null !== $fieldType && $obj['fieldType'] = $fieldType;
        null !== $translatedLabel && $obj['translatedLabel'] = $translatedLabel;
        null !== $valueLabel && $obj['valueLabel'] = $valueLabel;

        return $obj;
    }

    public function withIsCustom(bool $isCustom): self
    {
        $obj = clone $this;
        $obj['isCustom'] = $isCustom;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj['value'] = $value;

        return $obj;
    }

    public function withFieldType(string $fieldType): self
    {
        $obj = clone $this;
        $obj['fieldType'] = $fieldType;

        return $obj;
    }

    public function withTranslatedLabel(string $translatedLabel): self
    {
        $obj = clone $this;
        $obj['translatedLabel'] = $translatedLabel;

        return $obj;
    }

    public function withValueLabel(string $valueLabel): self
    {
        $obj = clone $this;
        $obj['valueLabel'] = $valueLabel;

        return $obj;
    }
}
