<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\ListOf;
use HubspotSDK\ErrorDetail;

/**
 * Ye olde error.
 *
 * @phpstan-type HubdbStandardErrorShape = array{
 *   category: string,
 *   context: array<string,list<string>>,
 *   errors: list<ErrorDetail>,
 *   links: array<string,string>,
 *   message: string,
 *   status: string,
 *   subCategory: mixed,
 *   id?: string|null,
 * }
 */
final class HubdbStandardError implements BaseModel
{
    /** @use SdkModel<HubdbStandardErrorShape> */
    use SdkModel;

    /**
     * Specifies the main category of the error, determining the broad area of issue.
     */
    #[Api]
    public string $category;

    /**
     * An object containing context-specific information pertinent to the error.
     *
     * @var array<string,list<string>> $context
     */
    #[Api(map: new ListOf('string'))]
    public array $context;

    /**
     * The detailed error objects.
     *
     * @var list<ErrorDetail> $errors
     */
    #[Api(list: ErrorDetail::class)]
    public array $errors;

    /**
     * An object containing links related to the error, such as documentation URLs or support contact pages.
     *
     * @var array<string,string> $links
     */
    #[Api(map: 'string')]
    public array $links;

    /**
     * A detailed message describing the error.
     */
    #[Api]
    public string $message;

    /**
     * The HTTP status code associated with the error.
     */
    #[Api]
    public string $status;

    /**
     * Identifies the subcategory of the error, providing more specific context within the main category.
     */
    #[Api]
    public mixed $subCategory;

    /**
     * The unique ID of the error instance.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * `new HubdbStandardError()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HubdbStandardError::with(
     *   category: ...,
     *   context: ...,
     *   errors: ...,
     *   links: ...,
     *   message: ...,
     *   status: ...,
     *   subCategory: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HubdbStandardError)
     *   ->withCategory(...)
     *   ->withContext(...)
     *   ->withErrors(...)
     *   ->withLinks(...)
     *   ->withMessage(...)
     *   ->withStatus(...)
     *   ->withSubCategory(...)
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
        array $context,
        array $errors,
        array $links,
        string $message,
        string $status,
        mixed $subCategory,
        ?string $id = null,
    ): self {
        $obj = new self;

        $obj->category = $category;
        $obj->context = $context;
        $obj->errors = $errors;
        $obj->links = $links;
        $obj->message = $message;
        $obj->status = $status;
        $obj->subCategory = $subCategory;

        null !== $id && $obj->id = $id;

        return $obj;
    }

    /**
     * Specifies the main category of the error, determining the broad area of issue.
     */
    public function withCategory(string $category): self
    {
        $obj = clone $this;
        $obj->category = $category;

        return $obj;
    }

    /**
     * An object containing context-specific information pertinent to the error.
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
     * The detailed error objects.
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
     * An object containing links related to the error, such as documentation URLs or support contact pages.
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
     * A detailed message describing the error.
     */
    public function withMessage(string $message): self
    {
        $obj = clone $this;
        $obj->message = $message;

        return $obj;
    }

    /**
     * The HTTP status code associated with the error.
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    /**
     * Identifies the subcategory of the error, providing more specific context within the main category.
     */
    public function withSubCategory(mixed $subCategory): self
    {
        $obj = clone $this;
        $obj->subCategory = $subCategory;

        return $obj;
    }

    /**
     * The unique ID of the error instance.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }
}
