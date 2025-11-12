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
     */
    public static function with(
        array $extensionStatusMap,
        array $tags,
        ?CaseChangeTestExtensionData $caseChangeTestExtensionData = null,
        ?OptionDecoratorsExtensionData $optionDecoratorsExtensionData = null,
        ?RequiredPropertiesExtensionData $requiredPropertiesExtensionData = null,
        ?SoftRequiredPropertiesExtensionData $softRequiredPropertiesExtensionData = null,
    ): self {
        $obj = new self;

        $obj->extensionStatusMap = $extensionStatusMap;
        $obj->tags = $tags;

        null !== $caseChangeTestExtensionData && $obj->caseChangeTestExtensionData = $caseChangeTestExtensionData;
        null !== $optionDecoratorsExtensionData && $obj->optionDecoratorsExtensionData = $optionDecoratorsExtensionData;
        null !== $requiredPropertiesExtensionData && $obj->requiredPropertiesExtensionData = $requiredPropertiesExtensionData;
        null !== $softRequiredPropertiesExtensionData && $obj->softRequiredPropertiesExtensionData = $softRequiredPropertiesExtensionData;

        return $obj;
    }

    /**
     * @param array<string,string> $extensionStatusMap
     */
    public function withExtensionStatusMap(array $extensionStatusMap): self
    {
        $obj = clone $this;
        $obj->extensionStatusMap = $extensionStatusMap;

        return $obj;
    }

    /**
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $obj = clone $this;
        $obj->tags = $tags;

        return $obj;
    }

    public function withCaseChangeTestExtensionData(
        CaseChangeTestExtensionData $caseChangeTestExtensionData
    ): self {
        $obj = clone $this;
        $obj->caseChangeTestExtensionData = $caseChangeTestExtensionData;

        return $obj;
    }

    public function withOptionDecoratorsExtensionData(
        OptionDecoratorsExtensionData $optionDecoratorsExtensionData
    ): self {
        $obj = clone $this;
        $obj->optionDecoratorsExtensionData = $optionDecoratorsExtensionData;

        return $obj;
    }

    public function withRequiredPropertiesExtensionData(
        RequiredPropertiesExtensionData $requiredPropertiesExtensionData
    ): self {
        $obj = clone $this;
        $obj->requiredPropertiesExtensionData = $requiredPropertiesExtensionData;

        return $obj;
    }

    public function withSoftRequiredPropertiesExtensionData(
        SoftRequiredPropertiesExtensionData $softRequiredPropertiesExtensionData
    ): self {
        $obj = clone $this;
        $obj->softRequiredPropertiesExtensionData = $softRequiredPropertiesExtensionData;

        return $obj;
    }
}
