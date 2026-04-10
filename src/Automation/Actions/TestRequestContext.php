<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions;

use HubSpotSDK\Automation\Actions\TestRequestContext\Source;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type TestRequestContextShape = array{source: Source|value-of<Source>}
 */
final class TestRequestContext implements BaseModel
{
    /** @use SdkModel<TestRequestContextShape> */
    use SdkModel;

    /**
     * Indicates the source of the test request, with the only accepted value being 'TEST'.
     *
     * @var value-of<Source> $source
     */
    #[Required(enum: Source::class)]
    public string $source;

    /**
     * `new TestRequestContext()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TestRequestContext::with(source: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TestRequestContext)->withSource(...)
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
     * @param Source|value-of<Source> $source
     */
    public static function with(Source|string $source = 'TEST'): self
    {
        $self = new self;

        $self['source'] = $source;

        return $self;
    }

    /**
     * Indicates the source of the test request, with the only accepted value being 'TEST'.
     *
     * @param Source|value-of<Source> $source
     */
    public function withSource(Source|string $source): self
    {
        $self = clone $this;
        $self['source'] = $source;

        return $self;
    }
}
