<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\StringFieldSchema\Format;
use HubspotSDK\Automation\Actions\StringFieldSchema\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type StringFieldSchemaShape = array{
 *   type: Type|value-of<Type>, format?: null|Format|value-of<Format>
 * }
 */
final class StringFieldSchema implements BaseModel
{
    /** @use SdkModel<StringFieldSchemaShape> */
    use SdkModel;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /** @var value-of<Format>|null $format */
    #[Optional(enum: Format::class)]
    public ?string $format;

    /**
     * `new StringFieldSchema()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StringFieldSchema::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StringFieldSchema)->withType(...)
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
     * @param Type|value-of<Type> $type
     * @param Format|value-of<Format>|null $format
     */
    public static function with(
        Type|string $type = 'STRING',
        Format|string|null $format = null
    ): self {
        $self = new self;

        $self['type'] = $type;

        null !== $format && $self['format'] = $format;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param Format|value-of<Format> $format
     */
    public function withFormat(Format|string $format): self
    {
        $self = clone $this;
        $self['format'] = $format;

        return $self;
    }
}
