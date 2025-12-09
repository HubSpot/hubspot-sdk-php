<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
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
    #[Required]
    public \DateTimeInterface $expiresAt;

    /**
     * Extension of the requested file.
     */
    #[Required]
    public string $extension;

    /**
     * Name of the requested file.
     */
    #[Required]
    public string $name;

    /**
     * Size in bytes of the requested file.
     */
    #[Required]
    public int $size;

    /**
     * Type of the file. Can be IMG, DOCUMENT, AUDIO, MOVIE, or OTHER.
     */
    #[Required]
    public string $type;

    /**
     * Signed URL with access to the specified file. Anyone with this URL will be able to access the file until it expires.
     */
    #[Required]
    public string $url;

    /**
     * For image and video files. The height of the file.
     */
    #[Optional]
    public ?int $height;

    /**
     * For image and video files. The width of the file.
     */
    #[Optional]
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
        $self = new self;

        $self['expiresAt'] = $expiresAt;
        $self['extension'] = $extension;
        $self['name'] = $name;
        $self['size'] = $size;
        $self['type'] = $type;
        $self['url'] = $url;

        null !== $height && $self['height'] = $height;
        null !== $width && $self['width'] = $width;

        return $self;
    }

    /**
     * Timestamp of when the URL will no longer grant access to the file.
     */
    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $self = clone $this;
        $self['expiresAt'] = $expiresAt;

        return $self;
    }

    /**
     * Extension of the requested file.
     */
    public function withExtension(string $extension): self
    {
        $self = clone $this;
        $self['extension'] = $extension;

        return $self;
    }

    /**
     * Name of the requested file.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Size in bytes of the requested file.
     */
    public function withSize(int $size): self
    {
        $self = clone $this;
        $self['size'] = $size;

        return $self;
    }

    /**
     * Type of the file. Can be IMG, DOCUMENT, AUDIO, MOVIE, or OTHER.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Signed URL with access to the specified file. Anyone with this URL will be able to access the file until it expires.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * For image and video files. The height of the file.
     */
    public function withHeight(int $height): self
    {
        $self = clone $this;
        $self['height'] = $height;

        return $self;
    }

    /**
     * For image and video files. The width of the file.
     */
    public function withWidth(int $width): self
    {
        $self = clone $this;
        $self['width'] = $width;

        return $self;
    }
}
