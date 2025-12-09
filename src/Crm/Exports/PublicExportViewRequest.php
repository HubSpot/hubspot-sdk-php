<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Exports;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Exports\PublicExportViewRequest\ExportInternalValuesOption;
use HubspotSDK\Crm\Exports\PublicExportViewRequest\ExportType;
use HubspotSDK\Crm\Exports\PublicExportViewRequest\Format;
use HubspotSDK\Crm\Exports\PublicExportViewRequest\Language;
use HubspotSDK\Crm\Filter;
use HubspotSDK\Crm\FilterGroup;

/**
 * @phpstan-type PublicExportViewRequestShape = array{
 *   associatedObjectType: list<string>,
 *   exportInternalValuesOptions: list<value-of<ExportInternalValuesOption>>,
 *   exportName: string,
 *   exportType: value-of<ExportType>,
 *   format: value-of<Format>,
 *   includeLabeledAssociations: bool,
 *   includePrimaryDisplayPropertyForAssociatedObjects: bool,
 *   language: value-of<Language>,
 *   objectProperties: list<string>,
 *   objectType: string,
 *   overrideAssociatedObjectsPerDefinitionPerRowLimit: bool,
 *   publicCrmSearchRequest?: PublicCrmSearchRequest|null,
 * }
 */
final class PublicExportViewRequest implements BaseModel
{
    /** @use SdkModel<PublicExportViewRequestShape> */
    use SdkModel;

    /** @var list<string> $associatedObjectType */
    #[Required(list: 'string')]
    public array $associatedObjectType;

    /** @var list<value-of<ExportInternalValuesOption>> $exportInternalValuesOptions */
    #[Required(list: ExportInternalValuesOption::class)]
    public array $exportInternalValuesOptions;

    #[Required]
    public string $exportName;

    /** @var value-of<ExportType> $exportType */
    #[Required(enum: ExportType::class)]
    public string $exportType;

    /** @var value-of<Format> $format */
    #[Required(enum: Format::class)]
    public string $format;

    #[Required]
    public bool $includeLabeledAssociations;

    #[Required]
    public bool $includePrimaryDisplayPropertyForAssociatedObjects;

    /** @var value-of<Language> $language */
    #[Required(enum: Language::class)]
    public string $language;

    /** @var list<string> $objectProperties */
    #[Required(list: 'string')]
    public array $objectProperties;

    #[Required]
    public string $objectType;

    #[Required]
    public bool $overrideAssociatedObjectsPerDefinitionPerRowLimit;

    #[Optional]
    public ?PublicCrmSearchRequest $publicCrmSearchRequest;

    /**
     * `new PublicExportViewRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicExportViewRequest::with(
     *   associatedObjectType: ...,
     *   exportInternalValuesOptions: ...,
     *   exportName: ...,
     *   exportType: ...,
     *   format: ...,
     *   includeLabeledAssociations: ...,
     *   includePrimaryDisplayPropertyForAssociatedObjects: ...,
     *   language: ...,
     *   objectProperties: ...,
     *   objectType: ...,
     *   overrideAssociatedObjectsPerDefinitionPerRowLimit: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicExportViewRequest)
     *   ->withAssociatedObjectType(...)
     *   ->withExportInternalValuesOptions(...)
     *   ->withExportName(...)
     *   ->withExportType(...)
     *   ->withFormat(...)
     *   ->withIncludeLabeledAssociations(...)
     *   ->withIncludePrimaryDisplayPropertyForAssociatedObjects(...)
     *   ->withLanguage(...)
     *   ->withObjectProperties(...)
     *   ->withObjectType(...)
     *   ->withOverrideAssociatedObjectsPerDefinitionPerRowLimit(...)
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
     * @param list<string> $associatedObjectType
     * @param list<ExportInternalValuesOption|value-of<ExportInternalValuesOption>> $exportInternalValuesOptions
     * @param Format|value-of<Format> $format
     * @param Language|value-of<Language> $language
     * @param list<string> $objectProperties
     * @param ExportType|value-of<ExportType> $exportType
     * @param PublicCrmSearchRequest|array{
     *   filterGroups: list<FilterGroup>,
     *   filters: list<Filter>,
     *   sorts: list<string>,
     *   query?: string|null,
     * } $publicCrmSearchRequest
     */
    public static function with(
        array $associatedObjectType,
        array $exportInternalValuesOptions,
        string $exportName,
        Format|string $format,
        bool $includeLabeledAssociations,
        bool $includePrimaryDisplayPropertyForAssociatedObjects,
        Language|string $language,
        array $objectProperties,
        string $objectType,
        bool $overrideAssociatedObjectsPerDefinitionPerRowLimit,
        ExportType|string $exportType = 'VIEW',
        PublicCrmSearchRequest|array|null $publicCrmSearchRequest = null,
    ): self {
        $obj = new self;

        $obj['associatedObjectType'] = $associatedObjectType;
        $obj['exportInternalValuesOptions'] = $exportInternalValuesOptions;
        $obj['exportName'] = $exportName;
        $obj['exportType'] = $exportType;
        $obj['format'] = $format;
        $obj['includeLabeledAssociations'] = $includeLabeledAssociations;
        $obj['includePrimaryDisplayPropertyForAssociatedObjects'] = $includePrimaryDisplayPropertyForAssociatedObjects;
        $obj['language'] = $language;
        $obj['objectProperties'] = $objectProperties;
        $obj['objectType'] = $objectType;
        $obj['overrideAssociatedObjectsPerDefinitionPerRowLimit'] = $overrideAssociatedObjectsPerDefinitionPerRowLimit;

        null !== $publicCrmSearchRequest && $obj['publicCrmSearchRequest'] = $publicCrmSearchRequest;

        return $obj;
    }

    /**
     * @param list<string> $associatedObjectType
     */
    public function withAssociatedObjectType(array $associatedObjectType): self
    {
        $obj = clone $this;
        $obj['associatedObjectType'] = $associatedObjectType;

        return $obj;
    }

    /**
     * @param list<ExportInternalValuesOption|value-of<ExportInternalValuesOption>> $exportInternalValuesOptions
     */
    public function withExportInternalValuesOptions(
        array $exportInternalValuesOptions
    ): self {
        $obj = clone $this;
        $obj['exportInternalValuesOptions'] = $exportInternalValuesOptions;

        return $obj;
    }

    public function withExportName(string $exportName): self
    {
        $obj = clone $this;
        $obj['exportName'] = $exportName;

        return $obj;
    }

    /**
     * @param ExportType|value-of<ExportType> $exportType
     */
    public function withExportType(ExportType|string $exportType): self
    {
        $obj = clone $this;
        $obj['exportType'] = $exportType;

        return $obj;
    }

    /**
     * @param Format|value-of<Format> $format
     */
    public function withFormat(Format|string $format): self
    {
        $obj = clone $this;
        $obj['format'] = $format;

        return $obj;
    }

    public function withIncludeLabeledAssociations(
        bool $includeLabeledAssociations
    ): self {
        $obj = clone $this;
        $obj['includeLabeledAssociations'] = $includeLabeledAssociations;

        return $obj;
    }

    public function withIncludePrimaryDisplayPropertyForAssociatedObjects(
        bool $includePrimaryDisplayPropertyForAssociatedObjects
    ): self {
        $obj = clone $this;
        $obj['includePrimaryDisplayPropertyForAssociatedObjects'] = $includePrimaryDisplayPropertyForAssociatedObjects;

        return $obj;
    }

    /**
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $obj = clone $this;
        $obj['language'] = $language;

        return $obj;
    }

    /**
     * @param list<string> $objectProperties
     */
    public function withObjectProperties(array $objectProperties): self
    {
        $obj = clone $this;
        $obj['objectProperties'] = $objectProperties;

        return $obj;
    }

    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj['objectType'] = $objectType;

        return $obj;
    }

    public function withOverrideAssociatedObjectsPerDefinitionPerRowLimit(
        bool $overrideAssociatedObjectsPerDefinitionPerRowLimit
    ): self {
        $obj = clone $this;
        $obj['overrideAssociatedObjectsPerDefinitionPerRowLimit'] = $overrideAssociatedObjectsPerDefinitionPerRowLimit;

        return $obj;
    }

    /**
     * @param PublicCrmSearchRequest|array{
     *   filterGroups: list<FilterGroup>,
     *   filters: list<Filter>,
     *   sorts: list<string>,
     *   query?: string|null,
     * } $publicCrmSearchRequest
     */
    public function withPublicCrmSearchRequest(
        PublicCrmSearchRequest|array $publicCrmSearchRequest
    ): self {
        $obj = clone $this;
        $obj['publicCrmSearchRequest'] = $publicCrmSearchRequest;

        return $obj;
    }
}
