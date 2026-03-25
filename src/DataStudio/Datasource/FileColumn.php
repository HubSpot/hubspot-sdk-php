<?php

declare(strict_types=1);

namespace HubspotSDK\DataStudio\Datasource;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type FileColumnShape = array{name: string, type: string}
 */
final class FileColumn implements BaseModel
{
    /** @use SdkModel<FileColumnShape> */
    use SdkModel;

    /**
     * The name of the column, represented as a string.
     */
    #[Required]
    public string $name;

    /**
     * The data type of the column, represented as a string.
     */
    #[Required]
    public string $type;

    /**
     * `new FileColumn()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FileColumn::with(name: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FileColumn)->withName(...)->withType(...)
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
    public static function with(string $name, string $type): self
    {
        $self = new self;

        $self['name'] = $name;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The name of the column, represented as a string.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The data type of the column, represented as a string.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
