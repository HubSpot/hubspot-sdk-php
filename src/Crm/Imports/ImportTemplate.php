<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Imports;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Imports\ImportTemplate\TemplateType;

/**
 * @phpstan-type ImportTemplateShape = array{
 *   templateID: int, templateType: value-of<TemplateType>
 * }
 */
final class ImportTemplate implements BaseModel
{
    /** @use SdkModel<ImportTemplateShape> */
    use SdkModel;

    #[Required('templateId')]
    public int $templateID;

    /** @var value-of<TemplateType> $templateType */
    #[Required(enum: TemplateType::class)]
    public string $templateType;

    /**
     * `new ImportTemplate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ImportTemplate::with(templateID: ..., templateType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ImportTemplate)->withTemplateID(...)->withTemplateType(...)
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
     * @param TemplateType|value-of<TemplateType> $templateType
     */
    public static function with(
        int $templateID,
        TemplateType|string $templateType
    ): self {
        $self = new self;

        $self['templateID'] = $templateID;
        $self['templateType'] = $templateType;

        return $self;
    }

    public function withTemplateID(int $templateID): self
    {
        $self = clone $this;
        $self['templateID'] = $templateID;

        return $self;
    }

    /**
     * @param TemplateType|value-of<TemplateType> $templateType
     */
    public function withTemplateType(TemplateType|string $templateType): self
    {
        $self = clone $this;
        $self['templateType'] = $templateType;

        return $self;
    }
}
