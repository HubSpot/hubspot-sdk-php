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

/**
 * @phpstan-import-type PublicCrmSearchRequestShape from \HubspotSDK\Crm\Exports\PublicCrmSearchRequest
 *
 * @phpstan-type PublicExportViewRequestShape = array{
 *   associatedObjectType: list<string>,
 *   exportInternalValuesOptions: list<ExportInternalValuesOption|value-of<ExportInternalValuesOption>>,
 *   exportName: string,
 *   exportType: ExportType|value-of<ExportType>,
 *   format: Format|value-of<Format>,
 *   includeLabeledAssociations: bool,
 *   includePrimaryDisplayPropertyForAssociatedObjects: bool,
 *   language: Language|value-of<Language>,
 *   objectProperties: list<string>,
 *   objectType: string,
 *   overrideAssociatedObjectsPerDefinitionPerRowLimit: bool,
 *   publicCrmSearchRequest?: null|PublicCrmSearchRequest|PublicCrmSearchRequestShape,
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
     * @param PublicCrmSearchRequestShape $publicCrmSearchRequest
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
        $self = new self;

        $self['associatedObjectType'] = $associatedObjectType;
        $self['exportInternalValuesOptions'] = $exportInternalValuesOptions;
        $self['exportName'] = $exportName;
        $self['exportType'] = $exportType;
        $self['format'] = $format;
        $self['includeLabeledAssociations'] = $includeLabeledAssociations;
        $self['includePrimaryDisplayPropertyForAssociatedObjects'] = $includePrimaryDisplayPropertyForAssociatedObjects;
        $self['language'] = $language;
        $self['objectProperties'] = $objectProperties;
        $self['objectType'] = $objectType;
        $self['overrideAssociatedObjectsPerDefinitionPerRowLimit'] = $overrideAssociatedObjectsPerDefinitionPerRowLimit;

        null !== $publicCrmSearchRequest && $self['publicCrmSearchRequest'] = $publicCrmSearchRequest;

        return $self;
    }

    /**
     * @param list<string> $associatedObjectType
     */
    public function withAssociatedObjectType(array $associatedObjectType): self
    {
        $self = clone $this;
        $self['associatedObjectType'] = $associatedObjectType;

        return $self;
    }

    /**
     * @param list<ExportInternalValuesOption|value-of<ExportInternalValuesOption>> $exportInternalValuesOptions
     */
    public function withExportInternalValuesOptions(
        array $exportInternalValuesOptions
    ): self {
        $self = clone $this;
        $self['exportInternalValuesOptions'] = $exportInternalValuesOptions;

        return $self;
    }

    public function withExportName(string $exportName): self
    {
        $self = clone $this;
        $self['exportName'] = $exportName;

        return $self;
    }

    /**
     * @param ExportType|value-of<ExportType> $exportType
     */
    public function withExportType(ExportType|string $exportType): self
    {
        $self = clone $this;
        $self['exportType'] = $exportType;

        return $self;
    }

    /**
     * @param Format|value-of<Format> $format
     */
    public function withFormat(Format|string $format): self
    {
        $self = clone $this;
        $self['format'] = $format;

        return $self;
    }

    public function withIncludeLabeledAssociations(
        bool $includeLabeledAssociations
    ): self {
        $self = clone $this;
        $self['includeLabeledAssociations'] = $includeLabeledAssociations;

        return $self;
    }

    public function withIncludePrimaryDisplayPropertyForAssociatedObjects(
        bool $includePrimaryDisplayPropertyForAssociatedObjects
    ): self {
        $self = clone $this;
        $self['includePrimaryDisplayPropertyForAssociatedObjects'] = $includePrimaryDisplayPropertyForAssociatedObjects;

        return $self;
    }

    /**
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * @param list<string> $objectProperties
     */
    public function withObjectProperties(array $objectProperties): self
    {
        $self = clone $this;
        $self['objectProperties'] = $objectProperties;

        return $self;
    }

    public function withObjectType(string $objectType): self
    {
        $self = clone $this;
        $self['objectType'] = $objectType;

        return $self;
    }

    public function withOverrideAssociatedObjectsPerDefinitionPerRowLimit(
        bool $overrideAssociatedObjectsPerDefinitionPerRowLimit
    ): self {
        $self = clone $this;
        $self['overrideAssociatedObjectsPerDefinitionPerRowLimit'] = $overrideAssociatedObjectsPerDefinitionPerRowLimit;

        return $self;
    }

    /**
     * @param PublicCrmSearchRequestShape $publicCrmSearchRequest
     */
    public function withPublicCrmSearchRequest(
        PublicCrmSearchRequest|array $publicCrmSearchRequest
    ): self {
        $self = clone $this;
        $self['publicCrmSearchRequest'] = $publicCrmSearchRequest;

        return $self;
    }
}
