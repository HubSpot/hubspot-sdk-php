<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Signed Url object with optional ancillary metadata of requested file.
 *
 * @phpstan-type SignedURLShape = array{
 *   expiresAt: \DateTimeInterface,
 *   extension: string,
 *   name: string,
 *   size: int,
 *   type: string,
 *   url: string,
 *   height?: int|null,
 *   width?: int|null,
 * }
 */
final class SignedURL implements BaseModel
{
    /** @use SdkModel<SignedURLShape> */
    use SdkModel;

    /**
     * Timestamp of when the URL will no longer grant access to the file.
     */
    #[Api]
    public \DateTimeInterface $expiresAt;

    /**
     * Extension of the requested file.
     */
    #[Api]
    public string $extension;

    /**
     * Name of the requested file.
     */
    #[Api]
    public string $name;

    /**
     * Size in bytes of the requested file.
     */
    #[Api]
    public int $size;

    /**
     * Type of the file. Can be IMG, DOCUMENT, AUDIO, MOVIE, or OTHER.
     */
    #[Api]
    public string $type;

    /**
     * Signed URL with access to the specified file. Anyone with this URL will be able to access the file until it expires.
     */
    #[Api]
    public string $url;

    /**
     * For image and video files. The height of the file.
     */
    #[Api(optional: true)]
    public ?int $height;

    /**
     * For image and video files. The width of the file.
     */
    #[Api(optional: true)]
    public ?int $width;

    /**
     * `new SignedURL()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SignedURL::with(
     *   expiresAt: ..., extension: ..., name: ..., size: ..., type: ..., url: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SignedURL)
     *   ->withExpiresAt(...)
     *   ->withExtension(...)
     *   ->withName(...)
     *   ->withSize(...)
     *   ->withType(...)
     *   ->withURL(...)
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
        \DateTimeInterface $expiresAt,
        string $extension,
        string $name,
        int $size,
        string $type,
        string $url,
        ?int $height = null,
        ?int $width = null,
    ): self {
        $obj = new self;

        $obj['expiresAt'] = $expiresAt;
        $obj['extension'] = $extension;
        $obj['name'] = $name;
        $obj['size'] = $size;
        $obj['type'] = $type;
        $obj['url'] = $url;

        null !== $height && $obj['height'] = $height;
        null !== $width && $obj['width'] = $width;

        return $obj;
    }

    /**
     * Timestamp of when the URL will no longer grant access to the file.
     */
    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $obj = clone $this;
        $obj['expiresAt'] = $expiresAt;

        return $obj;
    }

    /**
     * Extension of the requested file.
     */
    public function withExtension(string $extension): self
    {
        $obj = clone $this;
        $obj['extension'] = $extension;

        return $obj;
    }

    /**
     * Name of the requested file.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Size in bytes of the requested file.
     */
    public function withSize(int $size): self
    {
        $obj = clone $this;
        $obj['size'] = $size;

        return $obj;
    }

    /**
     * Type of the file. Can be IMG, DOCUMENT, AUDIO, MOVIE, or OTHER.
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * Signed URL with access to the specified file. Anyone with this URL will be able to access the file until it expires.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj['url'] = $url;

        return $obj;
    }

    /**
     * For image and video files. The height of the file.
     */
    public function withHeight(int $height): self
    {
        $obj = clone $this;
        $obj['height'] = $height;

        return $obj;
    }

    /**
     * For image and video files. The width of the file.
     */
    public function withWidth(int $width): self
    {
        $obj = clone $this;
        $obj['width'] = $width;

        return $obj;
    }
}
