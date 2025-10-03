<?php

declare(strict_types=1);

namespace HubspotSDK\Files\Files;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Files\Files\FileGetSignedURLParams\Size;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new FileGetSignedURLParams); // set properties as needed
 * $client->files.files->getSignedURL(...$params->toArray());
 * ```
 * Get signed URL to access private file.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->files.files->getSignedURL(...$params->toArray());`
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

    #[Api(optional: true)]
    public ?int $expirationSeconds;

    /** @var value-of<Size>|null $size */
    #[Api(enum: Size::class, optional: true)]
    public ?string $size;

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
        null !== $size && $obj->size = $size instanceof Size ? $size->value : $size;
        null !== $upscale && $obj->upscale = $upscale;

        return $obj;
    }

    public function withExpirationSeconds(int $expirationSeconds): self
    {
        $obj = clone $this;
        $obj->expirationSeconds = $expirationSeconds;

        return $obj;
    }

    /**
     * @param Size|value-of<Size> $size
     */
    public function withSize(Size|string $size): self
    {
        $obj = clone $this;
        $obj->size = $size instanceof Size ? $size->value : $size;

        return $obj;
    }

    public function withUpscale(bool $upscale): self
    {
        $obj = clone $this;
        $obj->upscale = $upscale;

        return $obj;
    }
}
