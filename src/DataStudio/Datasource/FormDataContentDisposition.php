<?php

declare(strict_types=1);

namespace HubspotSDK\DataStudio\Datasource;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type FormDataContentDispositionShape = array{
 *   creationDate: \DateTimeInterface,
 *   fileName: string,
 *   modificationDate: \DateTimeInterface,
 *   name: string,
 *   parameters: array<string,string>,
 *   readDate: \DateTimeInterface,
 *   size: int,
 *   type: string,
 * }
 */
final class FormDataContentDisposition implements BaseModel
{
    /** @use SdkModel<FormDataContentDispositionShape> */
    use SdkModel;

    /**
     * The date and time when the file was created, in ISO 8601 format.
     */
    #[Required]
    public \DateTimeInterface $creationDate;

    /**
     * A string indicating the name of the file associated with this content disposition.
     */
    #[Required]
    public string $fileName;

    /**
     * The date and time when the file was last modified, in ISO 8601 format.
     */
    #[Required]
    public \DateTimeInterface $modificationDate;

    /**
     * A string representing the name associated with this content disposition.
     */
    #[Required]
    public string $name;

    /**
     * An object containing additional parameters for the content disposition, with each parameter represented as a string.
     *
     * @var array<string,string> $parameters
     */
    #[Required(map: 'string')]
    public array $parameters;

    /**
     * The date and time when the file was last read, in ISO 8601 format.
     */
    #[Required]
    public \DateTimeInterface $readDate;

    /**
     * An integer representing the size of the file in bytes.
     */
    #[Required]
    public int $size;

    /**
     * A string representing the type of content disposition.
     */
    #[Required]
    public string $type;

    /**
     * `new FormDataContentDisposition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FormDataContentDisposition::with(
     *   creationDate: ...,
     *   fileName: ...,
     *   modificationDate: ...,
     *   name: ...,
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
     * (new FormDataContentDisposition)
     *   ->withCreationDate(...)
     *   ->withFileName(...)
     *   ->withModificationDate(...)
     *   ->withName(...)
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
        string $name,
        array $parameters,
        \DateTimeInterface $readDate,
        int $size,
        string $type,
    ): self {
        $self = new self;

        $self['creationDate'] = $creationDate;
        $self['fileName'] = $fileName;
        $self['modificationDate'] = $modificationDate;
        $self['name'] = $name;
        $self['parameters'] = $parameters;
        $self['readDate'] = $readDate;
        $self['size'] = $size;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The date and time when the file was created, in ISO 8601 format.
     */
    public function withCreationDate(\DateTimeInterface $creationDate): self
    {
        $self = clone $this;
        $self['creationDate'] = $creationDate;

        return $self;
    }

    /**
     * A string indicating the name of the file associated with this content disposition.
     */
    public function withFileName(string $fileName): self
    {
        $self = clone $this;
        $self['fileName'] = $fileName;

        return $self;
    }

    /**
     * The date and time when the file was last modified, in ISO 8601 format.
     */
    public function withModificationDate(
        \DateTimeInterface $modificationDate
    ): self {
        $self = clone $this;
        $self['modificationDate'] = $modificationDate;

        return $self;
    }

    /**
     * A string representing the name associated with this content disposition.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * An object containing additional parameters for the content disposition, with each parameter represented as a string.
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
     * The date and time when the file was last read, in ISO 8601 format.
     */
    public function withReadDate(\DateTimeInterface $readDate): self
    {
        $self = clone $this;
        $self['readDate'] = $readDate;

        return $self;
    }

    /**
     * An integer representing the size of the file in bytes.
     */
    public function withSize(int $size): self
    {
        $self = clone $this;
        $self['size'] = $size;

        return $self;
    }

    /**
     * A string representing the type of content disposition.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
