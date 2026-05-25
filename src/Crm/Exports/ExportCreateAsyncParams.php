<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Exports;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Exports\ExportCreateAsyncParams\ExportInternalValuesOption;
use HubSpotSDK\Crm\Exports\ExportCreateAsyncParams\ExportType;
use HubSpotSDK\Crm\Exports\ExportCreateAsyncParams\Format;
use HubSpotSDK\Crm\Exports\ExportCreateAsyncParams\Language;

/**
 * Begins exporting CRM data for the portal as specified in the request body.
 *
 * @see HubSpotSDK\Services\Crm\ExportsService::createAsync()
 *
 * @phpstan-import-type PublicCrmSearchRequestShape from \HubSpotSDK\Crm\Exports\PublicCrmSearchRequest
 *
 * @phpstan-type ExportCreateAsyncParamsShape = array{
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
 *   listID: string,
 * }
 */
final class ExportCreateAsyncParams implements BaseModel
{
    /** @use SdkModel<ExportCreateAsyncParamsShape> */
    use SdkModel;
    use SdkParams;

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

    #[Required('listId')]
    public string $listID;

    /**
     * `new ExportCreateAsyncParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExportCreateAsyncParams::with(
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
     *   listID: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExportCreateAsyncParams)
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
     *   ->withListID(...)
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
     * @param PublicCrmSearchRequest|PublicCrmSearchRequestShape|null $publicCrmSearchRequest
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
        string $listID,
        ExportType|string $exportType = 'LIST',
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
        $self['listID'] = $listID;

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
     * @param PublicCrmSearchRequest|PublicCrmSearchRequestShape $publicCrmSearchRequest
     */
    public function withPublicCrmSearchRequest(
        PublicCrmSearchRequest|array $publicCrmSearchRequest
    ): self {
        $self = clone $this;
        $self['publicCrmSearchRequest'] = $publicCrmSearchRequest;

        return $self;
    }

    public function withListID(string $listID): self
    {
        $self = clone $this;
        $self['listID'] = $listID;

        return $self;
    }
}
