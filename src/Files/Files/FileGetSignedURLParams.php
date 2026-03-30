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

    /**
     * How long in seconds the link will provide access to the file.
     */
    #[Optional]
    public ?int $expirationSeconds;

    /**
     * For image files. This will resize the image to the desired size before sharing. Does not affect the original file, just the file served by this signed URL.
     *
     * @var value-of<Size>|null $size
     */
    #[Optional(enum: Size::class)]
    public ?string $size;

    /**
     * If size is provided, this will upscale the image to fit the size dimensions.
     */
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

    /**
     * How long in seconds the link will provide access to the file.
     */
    public function withExpirationSeconds(int $expirationSeconds): self
    {
        $self = clone $this;
        $self['expirationSeconds'] = $expirationSeconds;

        return $self;
    }

    /**
     * For image files. This will resize the image to the desired size before sharing. Does not affect the original file, just the file served by this signed URL.
     *
     * @param Size|value-of<Size> $size
     */
    public function withSize(Size|string $size): self
    {
        $self = clone $this;
        $self['size'] = $size;

        return $self;
    }

    /**
     * If size is provided, this will upscale the image to fit the size dimensions.
     */
    public function withUpscale(bool $upscale): self
    {
        $self = clone $this;
        $self['upscale'] = $upscale;

        return $self;
    }
}
