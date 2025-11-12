<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\ListOf;

/**
 * @phpstan-type ErrorShape = array{
 *   category: string,
 *   correlationId: string,
 *   message: string,
 *   context?: array<string,list<string>>|null,
 *   errors?: list<ErrorDetail>|null,
 *   links?: array<string,string>|null,
 *   subCategory?: string|null,
 * }
 */
final class Error implements BaseModel
{
    /** @use SdkModel<ErrorShape> */
    use SdkModel;

    /**
     * The error category.
     */
    #[Api]
    public string $category;

    /**
     * A unique identifier for the request. Include this value with any error reports or support tickets.
     */
    #[Api]
    public string $correlationId;

    /**
     * A human readable message describing the error along with remediation steps where appropriate.
     */
    #[Api]
    public string $message;

    /**
     * Context about the error condition.
     *
     * @var array<string,list<string>>|null $context
     */
    #[Api(map: new ListOf('string'), optional: true)]
    public ?array $context;

    /**
     * further information about the error.
     *
     * @var list<ErrorDetail>|null $errors
     */
    #[Api(list: ErrorDetail::class, optional: true)]
    public ?array $errors;

    /**
     * A map of link names to associated URIs containing documentation about the error or recommended remediation steps.
     *
     * @var array<string,string>|null $links
     */
    #[Api(map: 'string', optional: true)]
    public ?array $links;

    /**
     * A specific category that contains more specific detail about the error.
     */
    #[Api(optional: true)]
    public ?string $subCategory;

    /**
     * `new Error()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Error::with(category: ..., correlationId: ..., message: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Error)->withCategory(...)->withCorrelationID(...)->withMessage(...)
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
     * @param array<string,list<string>> $context
     * @param list<ErrorDetail> $errors
     * @param array<string,string> $links
     */
    public static function with(
        string $category,
        string $correlationId,
        string $message,
        ?array $context = null,
        ?array $errors = null,
        ?array $links = null,
        ?string $subCategory = null,
    ): self {
        $obj = new self;

        $obj->category = $category;
        $obj->correlationId = $correlationId;
        $obj->message = $message;

        null !== $context && $obj->context = $context;
        null !== $errors && $obj->errors = $errors;
        null !== $links && $obj->links = $links;
        null !== $subCategory && $obj->subCategory = $subCategory;

        return $obj;
    }

    /**
     * The error category.
     */
    public function withCategory(string $category): self
    {
        $obj = clone $this;
        $obj->category = $category;

        return $obj;
    }

    /**
     * A unique identifier for the request. Include this value with any error reports or support tickets.
     */
    public function withCorrelationID(string $correlationID): self
    {
        $obj = clone $this;
        $obj->correlationId = $correlationID;

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
     * Context about the error condition.
     *
     * @param array<string,list<string>> $context
     */
    public function withContext(array $context): self
    {
        $obj = clone $this;
        $obj->context = $context;

        return $obj;
    }

    /**
     * further information about the error.
     *
     * @param list<ErrorDetail> $errors
     */
    public function withErrors(array $errors): self
    {
        $obj = clone $this;
        $obj->errors = $errors;

        return $obj;
    }

    /**
     * A map of link names to associated URIs containing documentation about the error or recommended remediation steps.
     *
     * @param array<string,string> $links
     */
    public function withLinks(array $links): self
    {
        $obj = clone $this;
        $obj->links = $links;

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
