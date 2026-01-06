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
        $obj = new self;

        $obj['templateID'] = $templateID;
        $obj['templateType'] = $templateType;

        return $obj;
    }

    public function withTemplateID(int $templateID): self
    {
        $obj = clone $this;
        $obj['templateID'] = $templateID;

        return $obj;
    }

    /**
     * @param TemplateType|value-of<TemplateType> $templateType
     */
    public function withTemplateType(TemplateType|string $templateType): self
    {
        $obj = clone $this;
        $obj['templateType'] = $templateType;

        return $obj;
    }
}
