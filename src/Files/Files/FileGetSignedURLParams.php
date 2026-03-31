<?php

declare(strict_types=1);

namespace HubspotSDK\Files\Files;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Files\Files\FileGetSignedURLParams\Size;

/**
 * Generates signed URL that allows temporary access to a private file.
 *
 * @see HubspotSDK\Services\Files\FilesService::getSignedURL()
 *
 * @phpstan-type FileGetSignedURLParamsShape = array{
 *   expirationSeconds?: int|null,
 *   size?: null|Size|value-of<Size>,
 *   upscale?: bool|null,
 * }
 */
final class FileGetSignedURLParams implements BaseModel
{
    /** @use SdkModel<FileGetSignedURLParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?int $expirationSeconds;

    /** @var value-of<Size>|null $size */
    #[Optional(enum: Size::class)]
    public ?string $size;

    #[Optional]
    public ?bool $upscale;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Size|value-of<Size>|null $size
     */
    public static function with(
        ?int $expirationSeconds = null,
        Size|string|null $size = null,
        ?bool $upscale = null,
    ): self {
        $self = new self;

        null !== $expirationSeconds && $self['expirationSeconds'] = $expirationSeconds;
        null !== $size && $self['size'] = $size;
        null !== $upscale && $self['upscale'] = $upscale;

        return $self;
    }

    public function withExpirationSeconds(int $expirationSeconds): self
    {
        $self = clone $this;
        $self['expirationSeconds'] = $expirationSeconds;

        return $self;
    }

    /**
     * @param Size|value-of<Size> $size
     */
    public function withSize(Size|string $size): self
    {
        $self = clone $this;
        $self['size'] = $size;

        return $self;
    }

    public function withUpscale(bool $upscale): self
    {
        $self = clone $this;
        $self['upscale'] = $upscale;

        return $self;
    }
}
