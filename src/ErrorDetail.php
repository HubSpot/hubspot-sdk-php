<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\ListOf;

/**
 * @phpstan-type error_detail = array{
 *   message: string,
 *   code?: string,
 *   context?: array<string, list<string>>,
 *   in?: string,
 *   subCategory?: string,
 * }
 */
final class ErrorDetail implements BaseModel
{
    /** @use SdkModel<error_detail> */
    use SdkModel;

    /**
     * A human readable message describing the error along with remediation steps where appropriate.
     */
    #[Api]
    public string $message;

    /**
     * The status code associated with the error detail.
     */
    #[Api(optional: true)]
    public ?string $code;

    /**
     * Context about the error condition.
     *
     * @var array<string, list<string>>|null $context
     */
    #[Api(map: new ListOf('string'), optional: true)]
    public ?array $context;

    /**
     * The name of the field or parameter in which the error was found.
     */
    #[Api(optional: true)]
    public ?string $in;

    /**
     * A specific category that contains more specific detail about the error.
     */
    #[Api(optional: true)]
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
     * @param array<string, list<string>> $context
     */
    public static function with(
        string $message,
        ?string $code = null,
        ?array $context = null,
        ?string $in = null,
        ?string $subCategory = null,
    ): self {
        $obj = new self;

        $obj->message = $message;

        null !== $code && $obj->code = $code;
        null !== $context && $obj->context = $context;
        null !== $in && $obj->in = $in;
        null !== $subCategory && $obj->subCategory = $subCategory;

        return $obj;
    }

    /**
     * A human readable message describing the error along with remediation steps where appropriate.
     */
    public function withMessage(string $message): self
    {
        $obj = clone $this;
        $obj->message = $message;

        return $obj;
    }

    /**
     * The status code associated with the error detail.
     */
    public function withCode(string $code): self
    {
        $obj = clone $this;
        $obj->code = $code;

        return $obj;
    }

    /**
     * Context about the error condition.
     *
     * @param array<string, list<string>> $context
     */
    public function withContext(array $context): self
    {
        $obj = clone $this;
        $obj->context = $context;

        return $obj;
    }

    /**
     * The name of the field or parameter in which the error was found.
     */
    public function withIn(string $in): self
    {
        $obj = clone $this;
        $obj->in = $in;

        return $obj;
    }

    /**
     * A specific category that contains more specific detail about the error.
     */
    public function withSubCategory(string $subCategory): self
    {
        $obj = clone $this;
        $obj->subCategory = $subCategory;

        return $obj;
    }
}
