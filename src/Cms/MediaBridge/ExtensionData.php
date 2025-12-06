<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Api;
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
    #[Api(map: 'string')]
    public array $extensionStatusMap;

    /** @var list<string> $tags */
    #[Api(list: 'string')]
    public array $tags;

    #[Api(optional: true)]
    public ?CaseChangeTestExtensionData $caseChangeTestExtensionData;

    #[Api(optional: true)]
    public ?OptionDecoratorsExtensionData $optionDecoratorsExtensionData;

    #[Api(optional: true)]
    public ?RequiredPropertiesExtensionData $requiredPropertiesExtensionData;

    #[Api(optional: true)]
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
        $obj = new self;

        $obj['extensionStatusMap'] = $extensionStatusMap;
        $obj['tags'] = $tags;

        null !== $caseChangeTestExtensionData && $obj['caseChangeTestExtensionData'] = $caseChangeTestExtensionData;
        null !== $optionDecoratorsExtensionData && $obj['optionDecoratorsExtensionData'] = $optionDecoratorsExtensionData;
        null !== $requiredPropertiesExtensionData && $obj['requiredPropertiesExtensionData'] = $requiredPropertiesExtensionData;
        null !== $softRequiredPropertiesExtensionData && $obj['softRequiredPropertiesExtensionData'] = $softRequiredPropertiesExtensionData;

        return $obj;
    }

    /**
     * @param array<string,string> $extensionStatusMap
     */
    public function withExtensionStatusMap(array $extensionStatusMap): self
    {
        $obj = clone $this;
        $obj['extensionStatusMap'] = $extensionStatusMap;

        return $obj;
    }

    /**
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $obj = clone $this;
        $obj['tags'] = $tags;

        return $obj;
    }

    /**
     * @param CaseChangeTestExtensionData|array{
     *   mood: string
     * } $caseChangeTestExtensionData
     */
    public function withCaseChangeTestExtensionData(
        CaseChangeTestExtensionData|array $caseChangeTestExtensionData
    ): self {
        $obj = clone $this;
        $obj['caseChangeTestExtensionData'] = $caseChangeTestExtensionData;

        return $obj;
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
        $obj = clone $this;
        $obj['optionDecoratorsExtensionData'] = $optionDecoratorsExtensionData;

        return $obj;
    }

    /**
     * @param RequiredPropertiesExtensionData|array{
     *   isRequiredProperty: bool
     * } $requiredPropertiesExtensionData
     */
    public function withRequiredPropertiesExtensionData(
        RequiredPropertiesExtensionData|array $requiredPropertiesExtensionData
    ): self {
        $obj = clone $this;
        $obj['requiredPropertiesExtensionData'] = $requiredPropertiesExtensionData;

        return $obj;
    }

    /**
     * @param SoftRequiredPropertiesExtensionData|array{
     *   isSoftRequiredProperty: bool
     * } $softRequiredPropertiesExtensionData
     */
    public function withSoftRequiredPropertiesExtensionData(
        SoftRequiredPropertiesExtensionData|array $softRequiredPropertiesExtensionData,
    ): self {
        $obj = clone $this;
        $obj['softRequiredPropertiesExtensionData'] = $softRequiredPropertiesExtensionData;

        return $obj;
    }
}
