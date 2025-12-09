<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExtensionDataShape = array{
 *   extensionStatusMap: array<string,string>,
 *   tags: list<string>,
 *   caseChangeTestExtensionData?: CaseChangeTestExtensionData|null,
 *   optionDecoratorsExtensionData?: OptionDecoratorsExtensionData|null,
 *   requiredPropertiesExtensionData?: RequiredPropertiesExtensionData|null,
 *   softRequiredPropertiesExtensionData?: SoftRequiredPropertiesExtensionData|null,
 * }
 */
final class ExtensionData implements BaseModel
{
    /** @use SdkModel<ExtensionDataShape> */
    use SdkModel;

    /** @var array<string,string> $extensionStatusMap */
    #[Required(map: 'string')]
    public array $extensionStatusMap;

    /** @var list<string> $tags */
    #[Required(list: 'string')]
    public array $tags;

    #[Optional]
    public ?CaseChangeTestExtensionData $caseChangeTestExtensionData;

    #[Optional]
    public ?OptionDecoratorsExtensionData $optionDecoratorsExtensionData;

    #[Optional]
    public ?RequiredPropertiesExtensionData $requiredPropertiesExtensionData;

    #[Optional]
    public ?SoftRequiredPropertiesExtensionData $softRequiredPropertiesExtensionData;

    /**
     * `new ExtensionData()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExtensionData::with(extensionStatusMap: ..., tags: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExtensionData)->withExtensionStatusMap(...)->withTags(...)
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
     * @param array<string,string> $extensionStatusMap
     * @param list<string> $tags
     * @param CaseChangeTestExtensionData|array{
     *   mood: string
     * } $caseChangeTestExtensionData
     * @param OptionDecoratorsExtensionData|array{
     *   optionDecorators: array<string,OptionDecorations>,
     *   optionDecoratorStyle: string,
     * } $optionDecoratorsExtensionData
     * @param RequiredPropertiesExtensionData|array{
     *   isRequiredProperty: bool
     * } $requiredPropertiesExtensionData
     * @param SoftRequiredPropertiesExtensionData|array{
     *   isSoftRequiredProperty: bool
     * } $softRequiredPropertiesExtensionData
     */
    public static function with(
        array $extensionStatusMap,
        array $tags,
        CaseChangeTestExtensionData|array|null $caseChangeTestExtensionData = null,
        OptionDecoratorsExtensionData|array|null $optionDecoratorsExtensionData = null,
        RequiredPropertiesExtensionData|array|null $requiredPropertiesExtensionData = null,
        SoftRequiredPropertiesExtensionData|array|null $softRequiredPropertiesExtensionData = null,
    ): self {
        $self = new self;

        $self['extensionStatusMap'] = $extensionStatusMap;
        $self['tags'] = $tags;

        null !== $caseChangeTestExtensionData && $self['caseChangeTestExtensionData'] = $caseChangeTestExtensionData;
        null !== $optionDecoratorsExtensionData && $self['optionDecoratorsExtensionData'] = $optionDecoratorsExtensionData;
        null !== $requiredPropertiesExtensionData && $self['requiredPropertiesExtensionData'] = $requiredPropertiesExtensionData;
        null !== $softRequiredPropertiesExtensionData && $self['softRequiredPropertiesExtensionData'] = $softRequiredPropertiesExtensionData;

        return $self;
    }

    /**
     * @param array<string,string> $extensionStatusMap
     */
    public function withExtensionStatusMap(array $extensionStatusMap): self
    {
        $self = clone $this;
        $self['extensionStatusMap'] = $extensionStatusMap;

        return $self;
    }

    /**
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }

    /**
     * @param CaseChangeTestExtensionData|array{
     *   mood: string
     * } $caseChangeTestExtensionData
     */
    public function withCaseChangeTestExtensionData(
        CaseChangeTestExtensionData|array $caseChangeTestExtensionData
    ): self {
        $self = clone $this;
        $self['caseChangeTestExtensionData'] = $caseChangeTestExtensionData;

        return $self;
    }

    /**
     * @param OptionDecoratorsExtensionData|array{
     *   optionDecorators: array<string,OptionDecorations>,
     *   optionDecoratorStyle: string,
     * } $optionDecoratorsExtensionData
     */
    public function withOptionDecoratorsExtensionData(
        OptionDecoratorsExtensionData|array $optionDecoratorsExtensionData
    ): self {
        $self = clone $this;
        $self['optionDecoratorsExtensionData'] = $optionDecoratorsExtensionData;

        return $self;
    }

    /**
     * @param RequiredPropertiesExtensionData|array{
     *   isRequiredProperty: bool
     * } $requiredPropertiesExtensionData
     */
    public function withRequiredPropertiesExtensionData(
        RequiredPropertiesExtensionData|array $requiredPropertiesExtensionData
    ): self {
        $self = clone $this;
        $self['requiredPropertiesExtensionData'] = $requiredPropertiesExtensionData;

        return $self;
    }

    /**
     * @param SoftRequiredPropertiesExtensionData|array{
     *   isSoftRequiredProperty: bool
     * } $softRequiredPropertiesExtensionData
     */
    public function withSoftRequiredPropertiesExtensionData(
        SoftRequiredPropertiesExtensionData|array $softRequiredPropertiesExtensionData,
    ): self {
        $self = clone $this;
        $self['softRequiredPropertiesExtensionData'] = $softRequiredPropertiesExtensionData;

        return $self;
    }
}
