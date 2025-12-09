<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ActionConfirmationBodyShape = array{
 *   cancelButtonLabel: string, confirmButtonLabel: string, prompt: string
 * }
 */
final class ActionConfirmationBody implements BaseModel
{
    /** @use SdkModel<ActionConfirmationBodyShape> */
    use SdkModel;

    #[Required]
    public string $cancelButtonLabel;

    #[Required]
    public string $confirmButtonLabel;

    #[Required]
    public string $prompt;

    /**
     * `new ActionConfirmationBody()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionConfirmationBody::with(
     *   cancelButtonLabel: ..., confirmButtonLabel: ..., prompt: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionConfirmationBody)
     *   ->withCancelButtonLabel(...)
     *   ->withConfirmButtonLabel(...)
     *   ->withPrompt(...)
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
        string $cancelButtonLabel,
        string $confirmButtonLabel,
        string $prompt
    ): self {
        $self = new self;

        $self['cancelButtonLabel'] = $cancelButtonLabel;
        $self['confirmButtonLabel'] = $confirmButtonLabel;
        $self['prompt'] = $prompt;

        return $self;
    }

    public function withCancelButtonLabel(string $cancelButtonLabel): self
    {
        $self = clone $this;
        $self['cancelButtonLabel'] = $cancelButtonLabel;

        return $self;
    }

    public function withConfirmButtonLabel(string $confirmButtonLabel): self
    {
        $self = clone $this;
        $self['confirmButtonLabel'] = $confirmButtonLabel;

        return $self;
    }

    public function withPrompt(string $prompt): self
    {
        $self = clone $this;
        $self['prompt'] = $prompt;

        return $self;
    }
}
