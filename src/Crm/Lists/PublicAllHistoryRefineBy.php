<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Lists\PublicAllHistoryRefineBy\Type;

/**
 * @phpstan-type PublicAllHistoryRefineByShape = array{type: Type|value-of<Type>}
 */
final class PublicAllHistoryRefineBy implements BaseModel
{
    /** @use SdkModel<PublicAllHistoryRefineByShape> */
    use SdkModel;

    /**
     * Type of refine by (ALL_HISTORY).
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new PublicAllHistoryRefineBy()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAllHistoryRefineBy::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAllHistoryRefineBy)->withType(...)
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
     */
    public static function with(Type|string $type = 'ALL_HISTORY'): self
    {
        $self = new self;

        $self['type'] = $type;

        return $self;
    }

    /**
     * Type of refine by (ALL_HISTORY).
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
