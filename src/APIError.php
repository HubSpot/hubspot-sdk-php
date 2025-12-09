<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\ListOf;

/**
 * @phpstan-type APIErrorShape = array{
 *   category: string,
 *   correlationId: string,
 *   message: string,
 *   context?: array<string,list<string>>|null,
 *   errors?: list<ErrorDetail>|null,
 *   links?: array<string,string>|null,
 *   subCategory?: string|null,
 * }
 */
final class APIError implements BaseModel
{
    /** @use SdkModel<APIErrorShape> */
    use SdkModel;

    /**
     * The error category.
     */
    #[Required]
    public string $category;

    /**
     * A unique identifier for the request. Include this value with any error reports or support tickets.
     */
    #[Required]
    public string $correlationId;

    /**
     * A human readable message describing the error along with remediation steps where appropriate.
     */
    #[Required]
    public string $message;

    /**
     * Context about the error condition.
     *
     * @var array<string,list<string>>|null $context
     */
    #[Optional(map: new ListOf('string'))]
    public ?array $context;

    /**
     * further information about the error.
     *
     * @var list<ErrorDetail>|null $errors
     */
    #[Optional(list: ErrorDetail::class)]
    public ?array $errors;

    /**
     * A map of link names to associated URIs containing documentation about the error or recommended remediation steps.
     *
     * @var array<string,string>|null $links
     */
    #[Optional(map: 'string')]
    public ?array $links;

    /**
     * A specific category that contains more specific detail about the error.
     */
    #[Optional]
    public ?string $subCategory;

    /**
     * `new APIError()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIError::with(category: ..., correlationId: ..., message: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIError)->withCategory(...)->withCorrelationID(...)->withMessage(...)
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
     * @param list<ErrorDetail|array{
     *   message: string,
     *   code?: string|null,
     *   context?: array<string,list<string>>|null,
     *   in?: string|null,
     *   subCategory?: string|null,
     * }> $errors
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

        $obj['category'] = $category;
        $obj['correlationId'] = $correlationId;
        $obj['message'] = $message;

        null !== $context && $obj['context'] = $context;
        null !== $errors && $obj['errors'] = $errors;
        null !== $links && $obj['links'] = $links;
        null !== $subCategory && $obj['subCategory'] = $subCategory;

        return $obj;
    }

    /**
     * The error category.
     */
    public function withCategory(string $category): self
    {
        $obj = clone $this;
        $obj['category'] = $category;

        return $obj;
    }

    /**
     * A unique identifier for the request. Include this value with any error reports or support tickets.
     */
    public function withCorrelationID(string $correlationID): self
    {
        $obj = clone $this;
        $obj['correlationId'] = $correlationID;

        return $obj;
    }

    /**
     * A human readable message describing the error along with remediation steps where appropriate.
     */
    public function withMessage(string $message): self
    {
        $obj = clone $this;
        $obj['message'] = $message;

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
        $obj['context'] = $context;

        return $obj;
    }

    /**
     * further information about the error.
     *
     * @param list<ErrorDetail|array{
     *   message: string,
     *   code?: string|null,
     *   context?: array<string,list<string>>|null,
     *   in?: string|null,
     *   subCategory?: string|null,
     * }> $errors
     */
    public function withErrors(array $errors): self
    {
        $obj = clone $this;
        $obj['errors'] = $errors;

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
        $obj['links'] = $links;

        return $obj;
    }

    /**
     * A specific category that contains more specific detail about the error.
     */
    public function withSubCategory(string $subCategory): self
    {
        $obj = clone $this;
        $obj['subCategory'] = $subCategory;

        return $obj;
    }
}
