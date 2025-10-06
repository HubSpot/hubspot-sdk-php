<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_message_failure_details = array{
 *   errorMessageTokens: array<string, string>, errorMessage?: string
 * }
 */
final class PublicMessageFailureDetails implements BaseModel
{
    /** @use SdkModel<public_message_failure_details> */
    use SdkModel;

    /** @var array<string, string> $errorMessageTokens */
    #[Api(map: 'string')]
    public array $errorMessageTokens;

    #[Api(optional: true)]
    public ?string $errorMessage;

    /**
     * `new PublicMessageFailureDetails()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicMessageFailureDetails::with(errorMessageTokens: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicMessageFailureDetails)->withErrorMessageTokens(...)
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
     * @param array<string, string> $errorMessageTokens
     */
    public static function with(
        array $errorMessageTokens,
        ?string $errorMessage = null
    ): self {
        $obj = new self;

        $obj->errorMessageTokens = $errorMessageTokens;

        null !== $errorMessage && $obj->errorMessage = $errorMessage;

        return $obj;
    }

    /**
     * @param array<string, string> $errorMessageTokens
     */
    public function withErrorMessageTokens(array $errorMessageTokens): self
    {
        $obj = clone $this;
        $obj->errorMessageTokens = $errorMessageTokens;

        return $obj;
    }

    public function withErrorMessage(string $errorMessage): self
    {
        $obj = clone $this;
        $obj->errorMessage = $errorMessage;

        return $obj;
    }
}
