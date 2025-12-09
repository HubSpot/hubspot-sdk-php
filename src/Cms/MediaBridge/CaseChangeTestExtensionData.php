<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CaseChangeTestExtensionDataShape = array{mood: string}
 */
final class CaseChangeTestExtensionData implements BaseModel
{
    /** @use SdkModel<CaseChangeTestExtensionDataShape> */
    use SdkModel;

    #[Required]
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
     */
    public static function with(string $mood): self
    {
        $self = new self;

        $self['mood'] = $mood;

        return $self;
    }

    public function withMood(string $mood): self
    {
        $self = clone $this;
        $self['mood'] = $mood;

        return $self;
    }
}
