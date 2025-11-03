<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards;

use HubspotSDK\Core\Attributes\Api;
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

    #[Api]
    public string $cancelButtonLabel;

    #[Api]
    public string $confirmButtonLabel;

    #[Api]
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
        $obj = new self;

        $obj->cancelButtonLabel = $cancelButtonLabel;
        $obj->confirmButtonLabel = $confirmButtonLabel;
        $obj->prompt = $prompt;

        return $obj;
    }

    public function withCancelButtonLabel(string $cancelButtonLabel): self
    {
        $obj = clone $this;
        $obj->cancelButtonLabel = $cancelButtonLabel;

        return $obj;
    }

    public function withConfirmButtonLabel(string $confirmButtonLabel): self
    {
        $obj = clone $this;
        $obj->confirmButtonLabel = $confirmButtonLabel;

        return $obj;
    }

    public function withPrompt(string $prompt): self
    {
        $obj = clone $this;
        $obj->prompt = $prompt;

        return $obj;
    }
}
