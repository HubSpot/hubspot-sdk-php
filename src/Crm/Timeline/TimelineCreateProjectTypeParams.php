<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Timeline;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @see HubSpotSDK\Services\Crm\TimelineService::createProjectType()
 *
 * @phpstan-type TimelineCreateProjectTypeParamsShape = array{
 *   developerSymbol: string, projectName: string
 * }
 */
final class TimelineCreateProjectTypeParams implements BaseModel
{
    /** @use SdkModel<TimelineCreateProjectTypeParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $developerSymbol;

    #[Required]
    public string $projectName;

    /**
     * `new TimelineCreateProjectTypeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TimelineCreateProjectTypeParams::with(developerSymbol: ..., projectName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TimelineCreateProjectTypeParams)
     *   ->withDeveloperSymbol(...)
     *   ->withProjectName(...)
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
    public static function with(
        string $developerSymbol,
        string $projectName
    ): self {
        $self = new self;

        $self['developerSymbol'] = $developerSymbol;
        $self['projectName'] = $projectName;

        return $self;
    }

    public function withDeveloperSymbol(string $developerSymbol): self
    {
        $self = clone $this;
        $self['developerSymbol'] = $developerSymbol;

        return $self;
    }

    public function withProjectName(string $projectName): self
    {
        $self = clone $this;
        $self['projectName'] = $projectName;

        return $self;
    }
}
