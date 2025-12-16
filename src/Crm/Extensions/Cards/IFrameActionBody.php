<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Extensions\Cards\IFrameActionBody\Type;

/**
 * @phpstan-type IFrameActionBodyShape = array{
 *   height: int,
 *   propertyNamesIncluded: list<string>,
 *   type: Type|value-of<Type>,
 *   url: string,
 *   width: int,
 *   label?: string|null,
 * }
 */
final class IFrameActionBody implements BaseModel
{
    /** @use SdkModel<IFrameActionBodyShape> */
    use SdkModel;

    #[Required]
    public int $height;

    /** @var list<string> $propertyNamesIncluded */
    #[Required(list: 'string')]
    public array $propertyNamesIncluded;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Required]
    public string $url;

    #[Required]
    public int $width;

    #[Optional]
    public ?string $label;

    /**
     * `new IFrameActionBody()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IFrameActionBody::with(
     *   height: ..., propertyNamesIncluded: ..., type: ..., url: ..., width: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IFrameActionBody)
     *   ->withHeight(...)
     *   ->withPropertyNamesIncluded(...)
     *   ->withType(...)
     *   ->withURL(...)
     *   ->withWidth(...)
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
     * @param list<string> $propertyNamesIncluded
     * @param Type|value-of<Type> $type
     */
    public static function with(
        int $height,
        array $propertyNamesIncluded,
        string $url,
        int $width,
        Type|string $type = 'IFRAME',
        ?string $label = null,
    ): self {
        $self = new self;

        $self['height'] = $height;
        $self['propertyNamesIncluded'] = $propertyNamesIncluded;
        $self['type'] = $type;
        $self['url'] = $url;
        $self['width'] = $width;

        null !== $label && $self['label'] = $label;

        return $self;
    }

    public function withHeight(int $height): self
    {
        $self = clone $this;
        $self['height'] = $height;

        return $self;
    }

    /**
     * @param list<string> $propertyNamesIncluded
     */
    public function withPropertyNamesIncluded(
        array $propertyNamesIncluded
    ): self {
        $self = clone $this;
        $self['propertyNamesIncluded'] = $propertyNamesIncluded;

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

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    public function withWidth(int $width): self
    {
        $self = clone $this;
        $self['width'] = $width;

        return $self;
    }

    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }
}
