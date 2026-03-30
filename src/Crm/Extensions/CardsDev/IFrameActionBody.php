<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\CardsDev;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Extensions\CardsDev\IFrameActionBody\Type;

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

    /**
     * The height of the iframe in pixels.
     */
    #[Required]
    public int $height;

    /**
     * A list of property names that will be included on the url of the iframe.
     *
     * @var list<string> $propertyNamesIncluded
     */
    #[Required(list: 'string')]
    public array $propertyNamesIncluded;

    /**
     * The type of status.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * The URL endpoint that will be loaded in the iframe when triggered.
     */
    #[Required]
    public string $url;

    /**
     * The width of the iframe in pixels.
     */
    #[Required]
    public int $width;

    /**
     * The label for this property as you'd like it displayed to users.
     */
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

    /**
     * The height of the iframe in pixels.
     */
    public function withHeight(int $height): self
    {
        $self = clone $this;
        $self['height'] = $height;

        return $self;
    }

    /**
     * A list of property names that will be included on the url of the iframe.
     *
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
     * The type of status.
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
     * The URL endpoint that will be loaded in the iframe when triggered.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * The width of the iframe in pixels.
     */
    public function withWidth(int $width): self
    {
        $self = clone $this;
        $self['width'] = $width;

        return $self;
    }

    /**
     * The label for this property as you'd like it displayed to users.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }
}
