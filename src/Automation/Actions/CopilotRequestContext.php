<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions;

use HubSpotSDK\Automation\Actions\CopilotRequestContext\Source;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CopilotRequestContextShape = array{
 *   source: Source|value-of<Source>, trajectoryID?: string|null
 * }
 */
final class CopilotRequestContext implements BaseModel
{
    /** @use SdkModel<CopilotRequestContextShape> */
    use SdkModel;

    /**
     * Indicates the source of the request, with the default value being 'COPILOT'.
     *
     * @var value-of<Source> $source
     */
    #[Required(enum: Source::class)]
    public string $source;

    /**
     * The unique identifier for the trajectory.
     */
    #[Optional('trajectoryId')]
    public ?string $trajectoryID;

    /**
     * `new CopilotRequestContext()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CopilotRequestContext::with(source: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CopilotRequestContext)->withSource(...)
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
    public static function with(
        Source|string $source = 'COPILOT',
        ?string $trajectoryID = null
    ): self {
        $self = new self;

        $self['source'] = $source;

        null !== $trajectoryID && $self['trajectoryID'] = $trajectoryID;

        return $self;
    }

    /**
     * Indicates the source of the request, with the default value being 'COPILOT'.
     *
     * @param Source|value-of<Source> $source
     */
    public function withSource(Source|string $source): self
    {
        $self = clone $this;
        $self['source'] = $source;

        return $self;
    }

    /**
     * The unique identifier for the trajectory.
     */
    public function withTrajectoryID(string $trajectoryID): self
    {
        $self = clone $this;
        $self['trajectoryID'] = $trajectoryID;

        return $self;
    }
}
