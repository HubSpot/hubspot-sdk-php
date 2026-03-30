<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\StandaloneRequestContext\Source;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ChirpAIContextObjectShape from \HubspotSDK\Automation\Actions\ChirpAIContextObject
 *
 * @phpstan-type StandaloneRequestContextShape = array{
 *   chirpAIContextObject: ChirpAIContextObject|ChirpAIContextObjectShape,
 *   source: Source|value-of<Source>,
 *   trajectoryID?: string|null,
 * }
 */
final class StandaloneRequestContext implements BaseModel
{
    /** @use SdkModel<StandaloneRequestContextShape> */
    use SdkModel;

    #[Required('chirpAiContextObject')]
    public ChirpAIContextObject $chirpAIContextObject;

    /**
     * Indicates the source of the request, with the default value being 'STANDALONE'.
     *
     * @var value-of<Source> $source
     */
    #[Required(enum: Source::class)]
    public string $source;

    /**
     * A unique identifier for tracking the trajectory of the request.
     */
    #[Optional('trajectoryId')]
    public ?string $trajectoryID;

    /**
     * `new StandaloneRequestContext()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StandaloneRequestContext::with(chirpAIContextObject: ..., source: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StandaloneRequestContext)->withChirpAIContextObject(...)->withSource(...)
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
     * @param ChirpAIContextObject|ChirpAIContextObjectShape $chirpAIContextObject
     * @param Source|value-of<Source> $source
     */
    public static function with(
        ChirpAIContextObject|array $chirpAIContextObject,
        Source|string $source = 'STANDALONE',
        ?string $trajectoryID = null,
    ): self {
        $self = new self;

        $self['chirpAIContextObject'] = $chirpAIContextObject;
        $self['source'] = $source;

        null !== $trajectoryID && $self['trajectoryID'] = $trajectoryID;

        return $self;
    }

    /**
     * @param ChirpAIContextObject|ChirpAIContextObjectShape $chirpAIContextObject
     */
    public function withChirpAIContextObject(
        ChirpAIContextObject|array $chirpAIContextObject
    ): self {
        $self = clone $this;
        $self['chirpAIContextObject'] = $chirpAIContextObject;

        return $self;
    }

    /**
     * Indicates the source of the request, with the default value being 'STANDALONE'.
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
     * A unique identifier for tracking the trajectory of the request.
     */
    public function withTrajectoryID(string $trajectoryID): self
    {
        $self = clone $this;
        $self['trajectoryID'] = $trajectoryID;

        return $self;
    }
}
