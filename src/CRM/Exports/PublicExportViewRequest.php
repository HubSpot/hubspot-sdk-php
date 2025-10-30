<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Exports;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Exports\PublicExportViewRequest\ExportInternalValuesOption;
use HubspotSDK\CRM\Exports\PublicExportViewRequest\ExportType;
use HubspotSDK\CRM\Exports\PublicExportViewRequest\Format;
use HubspotSDK\CRM\Exports\PublicExportViewRequest\Language;

/**
 * @phpstan-type PublicExportViewRequestShape = array{
 *   exportInternalValuesOptions: list<value-of<ExportInternalValuesOption>>,
 *   exportName: string,
 *   exportType: value-of<ExportType>,
 *   format: value-of<Format>,
 *   language: value-of<Language>,
 *   objectProperties: list<string>,
 *   objectType: string,
 *   overrideAssociatedObjectsPerDefinitionPerRowLimit: bool,
 *   associatedObjectType?: string,
 *   publicCRMSearchRequest?: PublicCRMSearchRequest,
 * }
 */
final class PublicExportViewRequest implements BaseModel
{
    /** @use SdkModel<PublicExportViewRequestShape> */
    use SdkModel;

    /**
     * @var list<value-of<ExportInternalValuesOption>> $exportInternalValuesOptions
     */
    #[Api(list: ExportInternalValuesOption::class)]
    public array $exportInternalValuesOptions;

    #[Api]
    public string $exportName;

    /** @var value-of<ExportType> $exportType */
    #[Api(enum: ExportType::class)]
    public string $exportType;

    /** @var value-of<Format> $format */
    #[Api(enum: Format::class)]
    public string $format;

    /** @var value-of<Language> $language */
    #[Api(enum: Language::class)]
    public string $language;

    /** @var list<string> $objectProperties */
    #[Api(list: 'string')]
    public array $objectProperties;

    #[Api]
    public string $objectType;

    #[Api]
    public bool $overrideAssociatedObjectsPerDefinitionPerRowLimit;

    #[Api(optional: true)]
    public ?string $associatedObjectType;

    #[Api('publicCrmSearchRequest', optional: true)]
    public ?PublicCRMSearchRequest $publicCRMSearchRequest;

    /**
     * `new PublicExportViewRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicExportViewRequest::with(
     *   exportInternalValuesOptions: ...,
     *   exportName: ...,
     *   exportType: ...,
     *   format: ...,
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
     *   ->withExportInternalValuesOptions(...)
     *   ->withExportName(...)
     *   ->withExportType(...)
     *   ->withFormat(...)
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
     * @param list<ExportInternalValuesOption|value-of<ExportInternalValuesOption>> $exportInternalValuesOptions
     * @param Format|value-of<Format> $format
     * @param Language|value-of<Language> $language
     * @param list<string> $objectProperties
     * @param ExportType|value-of<ExportType> $exportType
     */
    public static function with(
        array $exportInternalValuesOptions,
        string $exportName,
        Format|string $format,
        Language|string $language,
        array $objectProperties,
        string $objectType,
        bool $overrideAssociatedObjectsPerDefinitionPerRowLimit,
        ExportType|string $exportType = 'VIEW',
        ?string $associatedObjectType = null,
        ?PublicCRMSearchRequest $publicCRMSearchRequest = null,
    ): self {
        $obj = new self;

        $obj['exportInternalValuesOptions'] = $exportInternalValuesOptions;
        $obj->exportName = $exportName;
        $obj['exportType'] = $exportType;
        $obj['format'] = $format;
        $obj['language'] = $language;
        $obj->objectProperties = $objectProperties;
        $obj->objectType = $objectType;
        $obj->overrideAssociatedObjectsPerDefinitionPerRowLimit = $overrideAssociatedObjectsPerDefinitionPerRowLimit;

        null !== $associatedObjectType && $obj->associatedObjectType = $associatedObjectType;
        null !== $publicCRMSearchRequest && $obj->publicCRMSearchRequest = $publicCRMSearchRequest;

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
        $obj->exportName = $exportName;

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
        $obj->objectProperties = $objectProperties;

        return $obj;
    }

    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj->objectType = $objectType;

        return $obj;
    }

    public function withOverrideAssociatedObjectsPerDefinitionPerRowLimit(
        bool $overrideAssociatedObjectsPerDefinitionPerRowLimit
    ): self {
        $obj = clone $this;
        $obj->overrideAssociatedObjectsPerDefinitionPerRowLimit = $overrideAssociatedObjectsPerDefinitionPerRowLimit;

        return $obj;
    }

    public function withAssociatedObjectType(string $associatedObjectType): self
    {
        $obj = clone $this;
        $obj->associatedObjectType = $associatedObjectType;

        return $obj;
    }

    public function withPublicCRMSearchRequest(
        PublicCRMSearchRequest $publicCRMSearchRequest
    ): self {
        $obj = clone $this;
        $obj->publicCRMSearchRequest = $publicCRMSearchRequest;

        return $obj;
    }
}
