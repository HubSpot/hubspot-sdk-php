<?php

declare(strict_types=1);

namespace HubSpotSDK\Conversations\CustomChannels;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicMessageFailureDetailsShape = array{
 *   errorMessageTokens: array<string,string>, errorMessage?: string|null
 * }
 */
final class PublicMessageFailureDetails implements BaseModel
{
    /** @use SdkModel<PublicMessageFailureDetailsShape> */
    use SdkModel;

    /** @var array<string,string> $errorMessageTokens */
    #[Required(map: 'string')]
    public array $errorMessageTokens;

    #[Optional]
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
     * @param array<string,string> $errorMessageTokens
     */
    public static function with(
        array $errorMessageTokens,
        ?string $errorMessage = null
    ): self {
        $self = new self;

        $self['errorMessageTokens'] = $errorMessageTokens;

        null !== $errorMessage && $self['errorMessage'] = $errorMessage;

        return $self;
    }

    /**
     * @param array<string,string> $errorMessageTokens
     */
    public function withErrorMessageTokens(array $errorMessageTokens): self
    {
        $self = clone $this;
        $self['errorMessageTokens'] = $errorMessageTokens;

        return $self;
    }

    public function withErrorMessage(string $errorMessage): self
    {
        $self = clone $this;
        $self['errorMessage'] = $errorMessage;

        return $self;
    }
}
