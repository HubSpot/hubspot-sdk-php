<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\SourceCode;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Core\FileParam;

/**
 * Upserts a file at the specified path in the specified environment. Accepts multipart/form-data content type.
 *
 * @see HubSpotSDK\Services\Cms\SourceCodeService::upsert()
 *
 * @phpstan-type SourceCodeUpsertParamsShape = array{
 *   environment: string, file?: string|null|FileParam
 * }
 */
final class SourceCodeUpsertParams implements BaseModel
{
    /** @use SdkModel<SourceCodeUpsertParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $environment;

    #[Optional]
    public ?string $file;

    /**
     * `new SourceCodeUpsertParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SourceCodeUpsertParams::with(environment: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SourceCodeUpsertParams)->withEnvironment(...)
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
        string $environment,
        string|FileParam|null $file = null
    ): self {
        $self = new self;

        $self['environment'] = $environment;

        null !== $file && $self['file'] = $file;

        return $self;
    }

    public function withEnvironment(string $environment): self
    {
        $self = clone $this;
        $self['environment'] = $environment;

        return $self;
    }

    public function withFile(string|FileParam $file): self
    {
        $self = clone $this;
        $self['file'] = $file;

        return $self;
    }
}
