<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicSurveyMonkeyValueFilter\FilterType;

/**
 * @phpstan-type PublicSurveyMonkeyValueFilterShape = array{
 *   filterType: value-of<FilterType>,
 *   operator: string,
 *   surveyId: string,
 *   surveyQuestion: string,
 *   valueComparison: PublicBoolPropertyOperation|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation,
 *   surveyAnswerColId?: string|null,
 *   surveyAnswerRowId?: string|null,
 * }
 */
final class PublicSurveyMonkeyValueFilter implements BaseModel
{
    /** @use SdkModel<PublicSurveyMonkeyValueFilterShape> */
    use SdkModel;

    /** @var value-of<FilterType> $filterType */
    #[Api(enum: FilterType::class)]
    public string $filterType;

    #[Api]
    public string $operator;

    #[Api]
    public string $surveyId;

    #[Api]
    public string $surveyQuestion;

    #[Api]
    public PublicBoolPropertyOperation|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation $valueComparison;

    #[Api(optional: true)]
    public ?string $surveyAnswerColId;

    #[Api(optional: true)]
    public ?string $surveyAnswerRowId;

    /**
     * `new PublicSurveyMonkeyValueFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicSurveyMonkeyValueFilter::with(
     *   filterType: ...,
     *   operator: ...,
     *   surveyId: ...,
     *   surveyQuestion: ...,
     *   valueComparison: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicSurveyMonkeyValueFilter)
     *   ->withFilterType(...)
     *   ->withOperator(...)
     *   ->withSurveyID(...)
     *   ->withSurveyQuestion(...)
     *   ->withValueComparison(...)
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
     * @param FilterType|value-of<FilterType> $filterType
     */
    public static function with(
        string $operator,
        string $surveyId,
        string $surveyQuestion,
        PublicBoolPropertyOperation|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation $valueComparison,
        FilterType|string $filterType = 'SURVEY_MONKEY_VALUE',
        ?string $surveyAnswerColId = null,
        ?string $surveyAnswerRowId = null,
    ): self {
        $obj = new self;

        $obj['filterType'] = $filterType;
        $obj->operator = $operator;
        $obj->surveyId = $surveyId;
        $obj->surveyQuestion = $surveyQuestion;
        $obj->valueComparison = $valueComparison;

        null !== $surveyAnswerColId && $obj->surveyAnswerColId = $surveyAnswerColId;
        null !== $surveyAnswerRowId && $obj->surveyAnswerRowId = $surveyAnswerRowId;

        return $obj;
    }

    /**
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $obj = clone $this;
        $obj['filterType'] = $filterType;

        return $obj;
    }

    public function withOperator(string $operator): self
    {
        $obj = clone $this;
        $obj->operator = $operator;

        return $obj;
    }

    public function withSurveyID(string $surveyID): self
    {
        $obj = clone $this;
        $obj->surveyId = $surveyID;

        return $obj;
    }

    public function withSurveyQuestion(string $surveyQuestion): self
    {
        $obj = clone $this;
        $obj->surveyQuestion = $surveyQuestion;

        return $obj;
    }

    public function withValueComparison(
        PublicBoolPropertyOperation|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation $valueComparison,
    ): self {
        $obj = clone $this;
        $obj->valueComparison = $valueComparison;

        return $obj;
    }

    public function withSurveyAnswerColID(string $surveyAnswerColID): self
    {
        $obj = clone $this;
        $obj->surveyAnswerColId = $surveyAnswerColID;

        return $obj;
    }

    public function withSurveyAnswerRowID(string $surveyAnswerRowID): self
    {
        $obj = clone $this;
        $obj->surveyAnswerRowId = $surveyAnswerRowID;

        return $obj;
    }
}
