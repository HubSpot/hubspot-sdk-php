<?php

declare(strict_types=1);

namespace HubspotSDK\Files\Files;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Files\Files\FileGetSignedURLParams\Size;

/**
 * Generates signed URL that allows temporary access to a private file.
 *
 * @see HubspotSDK\Files\Files->getSignedURL
 *
 * @phpstan-type file_get_signed_url_params = array{
 *   expirationSeconds?: int, size?: Size|value-of<Size>, upscale?: bool
 * }
 */
final class FileGetSignedURLParams implements BaseModel
{
    /** @use SdkModel<file_get_signed_url_params> */
    use SdkModel;
    use SdkParams;

    /**
     * How long in seconds the link will provide access to the file.
     */
    #[Api(optional: true)]
    public ?int $expirationSeconds;

    /**
     * For image files. This will resize the image to the desired size before sharing. Does not affect the original file, just the file served by this signed URL.
     *
     * @var value-of<Size>|null $size
     */
    #[Api(enum: Size::class, optional: true)]
    public ?string $size;

    /**
     * If size is provided, this will upscale the image to fit the size dimensions.
     */
    #[Api(optional: true)]
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
     * @param Size|value-of<Size> $size
     */
    public static function with(
        ?int $expirationSeconds = null,
        Size|string|null $size = null,
        ?bool $upscale = null,
    ): self {
        $obj = new self;

        null !== $expirationSeconds && $obj->expirationSeconds = $expirationSeconds;
        null !== $size && $obj['size'] = $size;
        null !== $upscale && $obj->upscale = $upscale;

        return $obj;
    }

    /**
     * How long in seconds the link will provide access to the file.
     */
    public function withExpirationSeconds(int $expirationSeconds): self
    {
        $obj = clone $this;
        $obj->expirationSeconds = $expirationSeconds;

        return $obj;
    }

    /**
     * For image files. This will resize the image to the desired size before sharing. Does not affect the original file, just the file served by this signed URL.
     *
     * @param Size|value-of<Size> $size
     */
    public function withSize(Size|string $size): self
    {
        $obj = clone $this;
        $obj['size'] = $size;

        return $obj;
    }

    /**
     * If size is provided, this will upscale the image to fit the size dimensions.
     */
    public function withUpscale(bool $upscale): self
    {
        $obj = clone $this;
        $obj->upscale = $upscale;

        return $obj;
    }
}
