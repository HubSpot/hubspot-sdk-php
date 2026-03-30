<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type FlagsForAppResponseShape = array{flagsForApp: list<string>}
 */
final class FlagsForAppResponse implements BaseModel
{
    /** @use SdkModel<FlagsForAppResponseShape> */
    use SdkModel;

    /** @var list<string> $flagsForApp */
    #[Required(list: 'string')]
    public array $flagsForApp;

    /**
     * `new FlagsForAppResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FlagsForAppResponse::with(flagsForApp: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FlagsForAppResponse)->withFlagsForApp(...)
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
     * @param list<string> $flagsForApp
     */
    public static function with(array $flagsForApp): self
    {
        $self = new self;

        $self['flagsForApp'] = $flagsForApp;

        return $self;
    }

    /**
     * @param list<string> $flagsForApp
     */
    public function withFlagsForApp(array $flagsForApp): self
    {
        $self = clone $this;
        $self['flagsForApp'] = $flagsForApp;

        return $self;
    }
}
