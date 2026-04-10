<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Cms\MediaBridge\CaseChangeTestExtensionData\Mood;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CaseChangeTestExtensionDataShape = array{
 *   mood: Mood|value-of<Mood>
 * }
 */
final class CaseChangeTestExtensionData implements BaseModel
{
    /** @use SdkModel<CaseChangeTestExtensionDataShape> */
    use SdkModel;

    /** @var value-of<Mood> $mood */
    #[Required(enum: Mood::class)]
    public string $mood;

    /**
     * `new CaseChangeTestExtensionData()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CaseChangeTestExtensionData::with(mood: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CaseChangeTestExtensionData)->withMood(...)
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
     * @param Mood|value-of<Mood> $mood
     */
    public static function with(Mood|string $mood): self
    {
        $self = new self;

        $self['mood'] = $mood;

        return $self;
    }

    /**
     * @param Mood|value-of<Mood> $mood
     */
    public function withMood(Mood|string $mood): self
    {
        $self = clone $this;
        $self['mood'] = $mood;

        return $self;
    }
}
