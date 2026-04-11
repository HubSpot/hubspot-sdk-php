<?php

declare(strict_types=1);

namespace HubSpotSDK\Files\FileAssets;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Core\FileParam;

/**
 * Replace existing file data with new file data. Can be used to change image content without having to upload a new file and update all references.
 *
 * @see HubSpotSDK\Services\Files\FileAssetsService::replace()
 *
 * @phpstan-type FileAssetReplaceParamsShape = array{
 *   charsetHunch?: string|null,
 *   file?: string|null|FileParam,
 *   options?: string|null,
 * }
 */
final class FileAssetReplaceParams implements BaseModel
{
    /** @use SdkModel<FileAssetReplaceParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $charsetHunch;

    #[Optional]
    public ?string $file;

    #[Optional]
    public ?string $options;

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
        ?string $charsetHunch = null,
        string|FileParam|null $file = null,
        ?string $options = null,
    ): self {
        $self = new self;

        null !== $charsetHunch && $self['charsetHunch'] = $charsetHunch;
        null !== $file && $self['file'] = $file;
        null !== $options && $self['options'] = $options;

        return $self;
    }

    public function withCharsetHunch(string $charsetHunch): self
    {
        $self = clone $this;
        $self['charsetHunch'] = $charsetHunch;

        return $self;
    }

    public function withFile(string|FileParam $file): self
    {
        $self = clone $this;
        $self['file'] = $file;

        return $self;
    }

    public function withOptions(string $options): self
    {
        $self = clone $this;
        $self['options'] = $options;

        return $self;
    }
}
