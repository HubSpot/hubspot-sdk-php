<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\SourceCode;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update the content file in the specified environment and path within the HubSpot CMS. This operation allows you to upload a new file to replace the existing content at the given path. It is useful for managing and updating your website's source code files directly through the API.
 *
 * @see HubspotSDK\Services\Cms\SourceCodeService::upsert()
 *
 * @phpstan-type SourceCodeUpsertParamsShape = array{
 *   environment: string, file?: string|null
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
    public static function with(string $environment, ?string $file = null): self
    {
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

    public function withFile(string $file): self
    {
        $self = clone $this;
        $self['file'] = $file;

        return $self;
    }
}
