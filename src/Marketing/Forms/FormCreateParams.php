<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new FormCreateParams); // set properties as needed
 * $client->marketing.forms->create(...$params->toArray());
 * ```
 * Add a new `hubspot` form.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->marketing.forms->create(...$params->toArray());`
 *
 * @see HubspotSDK\Marketing\Forms->create
 *
 * @phpstan-type form_create_params = array{formDefinitionCreateRequestBase: mixed}
 */
final class FormCreateParams implements BaseModel
{
    /** @use SdkModel<form_create_params> */
    use SdkModel;
    use SdkParams;

    #[Api('FormDefinitionCreateRequestBase')]
    public mixed $formDefinitionCreateRequestBase;

    /**
     * `new FormCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FormCreateParams::with(formDefinitionCreateRequestBase: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FormCreateParams)->withFormDefinitionCreateRequestBase(...)
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
    public static function with(mixed $formDefinitionCreateRequestBase): self
    {
        $obj = new self;

        $obj->formDefinitionCreateRequestBase = $formDefinitionCreateRequestBase;

        return $obj;
    }

    public function withFormDefinitionCreateRequestBase(
        mixed $formDefinitionCreateRequestBase
    ): self {
        $obj = clone $this;
        $obj->formDefinitionCreateRequestBase = $formDefinitionCreateRequestBase;

        return $obj;
    }
}
