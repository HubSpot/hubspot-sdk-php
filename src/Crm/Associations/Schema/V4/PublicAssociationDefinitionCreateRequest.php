<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\Schema\V4;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicAssociationDefinitionCreateRequestShape = array{
 *   label: string, name: string, inverseLabel?: string|null
 * }
 */
final class PublicAssociationDefinitionCreateRequest implements BaseModel
{
    /** @use SdkModel<PublicAssociationDefinitionCreateRequestShape> */
    use SdkModel;

    #[Required]
    public string $label;

    #[Required]
    public string $name;

    #[Optional]
    public ?string $inverseLabel;

    /**
     * `new PublicAssociationDefinitionCreateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAssociationDefinitionCreateRequest::with(label: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAssociationDefinitionCreateRequest)->withLabel(...)->withName(...)
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
        string $label,
        string $name,
        ?string $inverseLabel = null
    ): self {
        $obj = new self;

        $obj['label'] = $label;
        $obj['name'] = $name;

        null !== $inverseLabel && $obj['inverseLabel'] = $inverseLabel;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withInverseLabel(string $inverseLabel): self
    {
        $obj = clone $this;
        $obj['inverseLabel'] = $inverseLabel;

        return $obj;
    }
}
