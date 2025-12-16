<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ExternalOptionShape from \HubspotSDK\Scheduler\Meetings\ExternalOption
 *
 * @phpstan-type ExternalLinkFormFieldShape = array{
 *   fieldType: string,
 *   isCustom: bool,
 *   isRequired: bool,
 *   label: string,
 *   name: string,
 *   options: list<ExternalOptionShape>,
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
     * @param list<ExternalOptionShape> $options
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
        $self = new self;

        $self['fieldType'] = $fieldType;
        $self['isCustom'] = $isCustom;
        $self['isRequired'] = $isRequired;
        $self['label'] = $label;
        $self['name'] = $name;
        $self['options'] = $options;
        $self['type'] = $type;

        return $self;
    }

    public function withFieldType(string $fieldType): self
    {
        $self = clone $this;
        $self['fieldType'] = $fieldType;

        return $self;
    }

    public function withIsCustom(bool $isCustom): self
    {
        $self = clone $this;
        $self['isCustom'] = $isCustom;

        return $self;
    }

    public function withIsRequired(bool $isRequired): self
    {
        $self = clone $this;
        $self['isRequired'] = $isRequired;

        return $self;
    }

    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param list<ExternalOptionShape> $options
     */
    public function withOptions(array $options): self
    {
        $self = clone $this;
        $self['options'] = $options;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
