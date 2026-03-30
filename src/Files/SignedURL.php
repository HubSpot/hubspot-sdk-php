<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type SignedURLShape = array{
 *   expiresAt: \DateTimeInterface,
 *   url: string,
 *   extension?: string|null,
 *   height?: int|null,
 *   name?: string|null,
 *   size?: int|null,
 *   type?: string|null,
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
     * Signed URL with access to the specified file. Anyone with this URL will be able to access the file until it expires.
     */
    #[Required]
    public string $url;

    /**
     * Extension of the requested file.
     */
    #[Optional]
    public ?string $extension;

    /**
     * For image and video files. The height of the file.
     */
    #[Optional]
    public ?int $height;

    /**
     * Name of the requested file.
     */
    #[Optional]
    public ?string $name;

    /**
     * Size in bytes of the requested file.
     */
    #[Optional]
    public ?int $size;

    /**
     * Type of the file. Can be IMG, DOCUMENT, AUDIO, MOVIE, or OTHER.
     */
    #[Optional]
    public ?string $type;

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
     * SignedURL::with(expiresAt: ..., url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SignedURL)->withExpiresAt(...)->withURL(...)
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
        string $url,
        ?string $extension = null,
        ?int $height = null,
        ?string $name = null,
        ?int $size = null,
        ?string $type = null,
        ?int $width = null,
    ): self {
        $self = new self;

        $self['expiresAt'] = $expiresAt;
        $self['url'] = $url;

        null !== $extension && $self['extension'] = $extension;
        null !== $height && $self['height'] = $height;
        null !== $name && $self['name'] = $name;
        null !== $size && $self['size'] = $size;
        null !== $type && $self['type'] = $type;
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
     * Signed URL with access to the specified file. Anyone with this URL will be able to access the file until it expires.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

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
     * For image and video files. The height of the file.
     */
    public function withHeight(int $height): self
    {
        $self = clone $this;
        $self['height'] = $height;

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
     * For image and video files. The width of the file.
     */
    public function withWidth(int $width): self
    {
        $self = clone $this;
        $self['width'] = $width;

        return $self;
    }
}
