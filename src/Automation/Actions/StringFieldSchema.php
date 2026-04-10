<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions;

use HubSpotSDK\Automation\Actions\StringFieldSchema\Format;
use HubSpotSDK\Automation\Actions\StringFieldSchema\Type;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type StringFieldSchemaShape = array{
 *   type: Type|value-of<Type>, format?: null|Format|value-of<Format>
 * }
 */
final class StringFieldSchema implements BaseModel
{
    /** @use SdkModel<StringFieldSchemaShape> */
    use SdkModel;

    /**
     * Indicates that the type is a string, with the default value being STRING.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * Specifies the format of the string, with accepted values: DATE, DATE_TIME, OBJECT_COORDINATE, TIME, URI.
     *
     * @var value-of<Format>|null $format
     */
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
     * Indicates that the type is a string, with the default value being STRING.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Specifies the format of the string, with accepted values: DATE, DATE_TIME, OBJECT_COORDINATE, TIME, URI.
     *
     * @param Format|value-of<Format> $format
     */
    public function withFormat(Format|string $format): self
    {
        $self = clone $this;
        $self['format'] = $format;

        return $self;
    }
}
