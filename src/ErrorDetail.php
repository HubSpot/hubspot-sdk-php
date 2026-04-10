<?php

declare(strict_types=1);

namespace HubSpotSDK;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Core\Conversion\ListOf;

/**
 * @phpstan-type ErrorDetailShape = array{
 *   message: string,
 *   code?: string|null,
 *   context?: array<string,list<string>>|null,
 *   in?: string|null,
 *   subCategory?: string|null,
 * }
 */
final class ErrorDetail implements BaseModel
{
    /** @use SdkModel<ErrorDetailShape> */
    use SdkModel;

    /**
     * A human readable message describing the error along with remediation steps where appropriate.
     */
    #[Required]
    public string $message;

    /**
     * The status code associated with the error detail.
     */
    #[Optional]
    public ?string $code;

    /**
     * Context about the error condition.
     *
     * @var array<string,list<string>>|null $context
     */
    #[Optional(map: new ListOf('string'))]
    public ?array $context;

    /**
     * The name of the field or parameter in which the error was found.
     */
    #[Optional]
    public ?string $in;

    /**
     * A specific category that contains more specific detail about the error.
     */
    #[Optional]
    public ?string $subCategory;

    /**
     * `new ErrorDetail()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ErrorDetail::with(message: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ErrorDetail)->withMessage(...)
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
     * @param array<string,list<string>>|null $context
     */
    public static function with(
        string $message,
        ?string $code = null,
        ?array $context = null,
        ?string $in = null,
        ?string $subCategory = null,
    ): self {
        $self = new self;

        $self['message'] = $message;

        null !== $code && $self['code'] = $code;
        null !== $context && $self['context'] = $context;
        null !== $in && $self['in'] = $in;
        null !== $subCategory && $self['subCategory'] = $subCategory;

        return $self;
    }

    /**
     * A human readable message describing the error along with remediation steps where appropriate.
     */
    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }

    /**
     * The status code associated with the error detail.
     */
    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    /**
     * Context about the error condition.
     *
     * @param array<string,list<string>> $context
     */
    public function withContext(array $context): self
    {
        $self = clone $this;
        $self['context'] = $context;

        return $self;
    }

    /**
     * The name of the field or parameter in which the error was found.
     */
    public function withIn(string $in): self
    {
        $self = clone $this;
        $self['in'] = $in;

        return $self;
    }

    /**
     * A specific category that contains more specific detail about the error.
     */
    public function withSubCategory(string $subCategory): self
    {
        $self = clone $this;
        $self['subCategory'] = $subCategory;

        return $self;
    }
}
