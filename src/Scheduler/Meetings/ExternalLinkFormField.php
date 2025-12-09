<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalLinkFormFieldShape = array{
 *   fieldType: string,
 *   isCustom: bool,
 *   isRequired: bool,
 *   label: string,
 *   name: string,
 *   options: list<ExternalOption>,
 *   type: string,
 * }
 */
final class ExternalLinkFormField implements BaseModel
{
    /** @use SdkModel<ExternalLinkFormFieldShape> */
    use SdkModel;

    #[Required]
    public string $fieldType;

    #[Required]
    public bool $isCustom;

    #[Required]
    public bool $isRequired;

    #[Required]
    public string $label;

    #[Required]
    public string $name;

    /** @var list<ExternalOption> $options */
    #[Required(list: ExternalOption::class)]
    public array $options;

    #[Required]
    public string $type;

    /**
     * `new ExternalLinkFormField()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalLinkFormField::with(
     *   fieldType: ...,
     *   isCustom: ...,
     *   isRequired: ...,
     *   label: ...,
     *   name: ...,
     *   options: ...,
     *   type: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalLinkFormField)
     *   ->withFieldType(...)
     *   ->withIsCustom(...)
     *   ->withIsRequired(...)
     *   ->withLabel(...)
     *   ->withName(...)
     *   ->withOptions(...)
     *   ->withType(...)
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
     * @param list<ExternalOption|array{
     *   description: string,
     *   displayOrder: int,
     *   doubleData: float,
     *   hidden: bool,
     *   label: string,
     *   readOnly: bool,
     *   value: string,
     * }> $options
     */
    public static function with(
        string $fieldType,
        bool $isCustom,
        bool $isRequired,
        string $label,
        string $name,
        array $options,
        string $type,
    ): self {
        $obj = new self;

        $obj['fieldType'] = $fieldType;
        $obj['isCustom'] = $isCustom;
        $obj['isRequired'] = $isRequired;
        $obj['label'] = $label;
        $obj['name'] = $name;
        $obj['options'] = $options;
        $obj['type'] = $type;

        return $obj;
    }

    public function withFieldType(string $fieldType): self
    {
        $obj = clone $this;
        $obj['fieldType'] = $fieldType;

        return $obj;
    }

    public function withIsCustom(bool $isCustom): self
    {
        $obj = clone $this;
        $obj['isCustom'] = $isCustom;

        return $obj;
    }

    public function withIsRequired(bool $isRequired): self
    {
        $obj = clone $this;
        $obj['isRequired'] = $isRequired;

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

    /**
     * @param list<ExternalOption|array{
     *   description: string,
     *   displayOrder: int,
     *   doubleData: float,
     *   hidden: bool,
     *   label: string,
     *   readOnly: bool,
     *   value: string,
     * }> $options
     */
    public function withOptions(array $options): self
    {
        $obj = clone $this;
        $obj['options'] = $options;

        return $obj;
    }

    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
