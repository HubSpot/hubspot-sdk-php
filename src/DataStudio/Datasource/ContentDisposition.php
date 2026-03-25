<?php

declare(strict_types=1);

namespace HubspotSDK\DataStudio\Datasource;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ContentDispositionShape = array{
 *   creationDate: \DateTimeInterface,
 *   fileName: string,
 *   modificationDate: \DateTimeInterface,
 *   parameters: array<string,string>,
 *   readDate: \DateTimeInterface,
 *   size: int,
 *   type: string,
 * }
 */
final class ContentDisposition implements BaseModel
{
    /** @use SdkModel<ContentDispositionShape> */
    use SdkModel;

    /**
     * The date and time when the file was created, formatted as a date-time string.
     */
    #[Required]
    public \DateTimeInterface $creationDate;

    /**
     * The name of the file as a string, indicating the file's name in the content disposition.
     */
    #[Required]
    public string $fileName;

    /**
     * The date and time when the file was last modified, formatted as a date-time string.
     */
    #[Required]
    public \DateTimeInterface $modificationDate;

    /**
     * An object containing additional parameters for the content disposition, with each parameter represented as a key-value pair of strings.
     *
     * @var array<string,string> $parameters
     */
    #[Required(map: 'string')]
    public array $parameters;

    /**
     * The date and time when the file was last read, formatted as a date-time string.
     */
    #[Required]
    public \DateTimeInterface $readDate;

    /**
     * The size of the file as an integer, representing the file's size in bytes.
     */
    #[Required]
    public int $size;

    /**
     * The type of content disposition, typically a string indicating how the content should be handled.
     */
    #[Required]
    public string $type;

    /**
     * `new ContentDisposition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ContentDisposition::with(
     *   creationDate: ...,
     *   fileName: ...,
     *   modificationDate: ...,
     *   parameters: ...,
     *   readDate: ...,
     *   size: ...,
     *   type: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ContentDisposition)
     *   ->withCreationDate(...)
     *   ->withFileName(...)
     *   ->withModificationDate(...)
     *   ->withParameters(...)
     *   ->withReadDate(...)
     *   ->withSize(...)
     *   ->withType(...)
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
     *
     * @param array<string,string> $parameters
     */
    public static function with(
        \DateTimeInterface $creationDate,
        string $fileName,
        \DateTimeInterface $modificationDate,
        array $parameters,
        \DateTimeInterface $readDate,
        int $size,
        string $type,
    ): self {
        $self = new self;

        $self['creationDate'] = $creationDate;
        $self['fileName'] = $fileName;
        $self['modificationDate'] = $modificationDate;
        $self['parameters'] = $parameters;
        $self['readDate'] = $readDate;
        $self['size'] = $size;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The date and time when the file was created, formatted as a date-time string.
     */
    public function withCreationDate(\DateTimeInterface $creationDate): self
    {
        $self = clone $this;
        $self['creationDate'] = $creationDate;

        return $self;
    }

    /**
     * The name of the file as a string, indicating the file's name in the content disposition.
     */
    public function withFileName(string $fileName): self
    {
        $self = clone $this;
        $self['fileName'] = $fileName;

        return $self;
    }

    /**
     * The date and time when the file was last modified, formatted as a date-time string.
     */
    public function withModificationDate(
        \DateTimeInterface $modificationDate
    ): self {
        $self = clone $this;
        $self['modificationDate'] = $modificationDate;

        return $self;
    }

    /**
     * An object containing additional parameters for the content disposition, with each parameter represented as a key-value pair of strings.
     *
     * @param array<string,string> $parameters
     */
    public function withParameters(array $parameters): self
    {
        $self = clone $this;
        $self['parameters'] = $parameters;

        return $self;
    }

    /**
     * The date and time when the file was last read, formatted as a date-time string.
     */
    public function withReadDate(\DateTimeInterface $readDate): self
    {
        $self = clone $this;
        $self['readDate'] = $readDate;

        return $self;
    }

    /**
     * The size of the file as an integer, representing the file's size in bytes.
     */
    public function withSize(int $size): self
    {
        $self = clone $this;
        $self['size'] = $size;

        return $self;
    }

    /**
     * The type of content disposition, typically a string indicating how the content should be handled.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
