<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\MarketingFormsLegalConsentOptionsNone\Type;

/**
 * @phpstan-type marketing_forms_legal_consent_options_none = array{
 *   type: value-of<Type>
 * }
 */
final class MarketingFormsLegalConsentOptionsNone implements BaseModel
{
    /** @use SdkModel<marketing_forms_legal_consent_options_none> */
    use SdkModel;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new MarketingFormsLegalConsentOptionsNone()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingFormsLegalConsentOptionsNone::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingFormsLegalConsentOptionsNone)->withType(...)
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
    public static function with(Type|string $type = 'none'): self
    {
        $obj = new self;

        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }
}
