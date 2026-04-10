<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicActionDefinitionRequiresObjectResponseShape = array{
 *   requiresObject: bool
 * }
 */
final class PublicActionDefinitionRequiresObjectResponse implements BaseModel
{
    /** @use SdkModel<PublicActionDefinitionRequiresObjectResponseShape> */
    use SdkModel;

    /**
     * Indicates whether a custom action definition requires an object.
     */
    #[Required]
    public bool $requiresObject;

    /**
     * `new PublicActionDefinitionRequiresObjectResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicActionDefinitionRequiresObjectResponse::with(requiresObject: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicActionDefinitionRequiresObjectResponse)->withRequiresObject(...)
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
    public static function with(bool $requiresObject): self
    {
        $self = new self;

        $self['requiresObject'] = $requiresObject;

        return $self;
    }

    /**
     * Indicates whether a custom action definition requires an object.
     */
    public function withRequiresObject(bool $requiresObject): self
    {
        $self = clone $this;
        $self['requiresObject'] = $requiresObject;

        return $self;
    }
}
