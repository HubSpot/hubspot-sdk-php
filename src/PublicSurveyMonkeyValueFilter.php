<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicSurveyMonkeyValueFilter\FilterType;

/**
 * @phpstan-type public_survey_monkey_value_filter = array{
 *   filterType: value-of<FilterType>,
 *   operator: string,
 *   surveyID: string,
 *   surveyQuestion: string,
 *   valueComparison: PublicBoolPropertyOperation|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation,
 *   surveyAnswerColID?: string,
 *   surveyAnswerRowID?: string,
 * }
 */
final class PublicSurveyMonkeyValueFilter implements BaseModel
{
    /** @use SdkModel<public_survey_monkey_value_filter> */
    use SdkModel;

    /** @var value-of<FilterType> $filterType */
    #[Api(enum: FilterType::class)]
    public string $filterType;

    #[Api]
    public string $operator;

    #[Api('surveyId')]
    public string $surveyID;

    #[Api]
    public string $surveyQuestion;

    #[Api]
    public PublicBoolPropertyOperation|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation $valueComparison;

    #[Api('surveyAnswerColId', optional: true)]
    public ?string $surveyAnswerColID;

    #[Api('surveyAnswerRowId', optional: true)]
    public ?string $surveyAnswerRowID;

    /**
     * `new PublicSurveyMonkeyValueFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicSurveyMonkeyValueFilter::with(
     *   filterType: ...,
     *   operator: ...,
     *   surveyID: ...,
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
        string $surveyID,
        string $surveyQuestion,
        PublicBoolPropertyOperation|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation $valueComparison,
        FilterType|string $filterType = 'SURVEY_MONKEY_VALUE',
        ?string $surveyAnswerColID = null,
        ?string $surveyAnswerRowID = null,
    ): self {
        $obj = new self;

        $obj['filterType'] = $filterType;
        $obj->operator = $operator;
        $obj->surveyID = $surveyID;
        $obj->surveyQuestion = $surveyQuestion;
        $obj->valueComparison = $valueComparison;

        null !== $surveyAnswerColID && $obj->surveyAnswerColID = $surveyAnswerColID;
        null !== $surveyAnswerRowID && $obj->surveyAnswerRowID = $surveyAnswerRowID;

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
        $obj->surveyID = $surveyID;

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
        $obj->surveyAnswerColID = $surveyAnswerColID;

        return $obj;
    }

    public function withSurveyAnswerRowID(string $surveyAnswerRowID): self
    {
        $obj = clone $this;
        $obj->surveyAnswerRowID = $surveyAnswerRowID;

        return $obj;
    }
}
