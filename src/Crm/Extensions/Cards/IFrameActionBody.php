<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Extensions\Cards\IFrameActionBody\Type;

/**
 * @phpstan-type IFrameActionBodyShape = array{
 *   height: int,
 *   propertyNamesIncluded: list<string>,
 *   type: value-of<Type>,
 *   url: string,
 *   width: int,
 *   label?: string|null,
 * }
 */
final class IFrameActionBody implements BaseModel
{
    /** @use SdkModel<IFrameActionBodyShape> */
    use SdkModel;

    #[Api]
    public int $height;

    /** @var list<string> $propertyNamesIncluded */
    #[Api(list: 'string')]
    public array $propertyNamesIncluded;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api]
    public string $url;

    #[Api]
    public int $width;

    #[Api(optional: true)]
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
        $obj = new self;

        $obj['height'] = $height;
        $obj['propertyNamesIncluded'] = $propertyNamesIncluded;
        $obj['type'] = $type;
        $obj['url'] = $url;
        $obj['width'] = $width;

        null !== $label && $obj['label'] = $label;

        return $obj;
    }

    public function withHeight(int $height): self
    {
        $obj = clone $this;
        $obj['height'] = $height;

        return $obj;
    }

    /**
     * @param list<string> $propertyNamesIncluded
     */
    public function withPropertyNamesIncluded(
        array $propertyNamesIncluded
    ): self {
        $obj = clone $this;
        $obj['propertyNamesIncluded'] = $propertyNamesIncluded;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj['url'] = $url;

        return $obj;
    }

    public function withWidth(int $width): self
    {
        $obj = clone $this;
        $obj['width'] = $width;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }
}
