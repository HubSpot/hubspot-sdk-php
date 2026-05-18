<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Marketing;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Marketing\Emails\AggregateEmailStatistics;
use HubSpotSDK\Marketing\Emails\CollectionResponseWithTotalEmailStatisticInterval;
use HubSpotSDK\Marketing\Emails\EmailCloneParams;
use HubSpotSDK\Marketing\Emails\EmailCreateAbTestVariationParams;
use HubSpotSDK\Marketing\Emails\EmailCreateParams;
use HubSpotSDK\Marketing\Emails\EmailCreateParams\Language;
use HubSpotSDK\Marketing\Emails\EmailCreateParams\State;
use HubSpotSDK\Marketing\Emails\EmailCreateParams\Subcategory;
use HubSpotSDK\Marketing\Emails\EmailDeleteParams;
use HubSpotSDK\Marketing\Emails\EmailGetAbTestVariationParams;
use HubSpotSDK\Marketing\Emails\EmailGetHistogramParams;
use HubSpotSDK\Marketing\Emails\EmailGetHistogramParams\Interval;
use HubSpotSDK\Marketing\Emails\EmailGetParams;
use HubSpotSDK\Marketing\Emails\EmailGetRevisionParams;
use HubSpotSDK\Marketing\Emails\EmailListParams;
use HubSpotSDK\Marketing\Emails\EmailListParams\Type;
use HubSpotSDK\Marketing\Emails\EmailListRevisionsParams;
use HubSpotSDK\Marketing\Emails\EmailRestoreRevisionParams;
use HubSpotSDK\Marketing\Emails\EmailRestoreRevisionToDraftParams;
use HubSpotSDK\Marketing\Emails\EmailUpdateDraftParams;
use HubSpotSDK\Marketing\Emails\EmailUpdateParams;
use HubSpotSDK\Marketing\Emails\PublicEmail;
use HubSpotSDK\Marketing\Emails\PublicEmailContent;
use HubSpotSDK\Marketing\Emails\PublicEmailFromDetails;
use HubSpotSDK\Marketing\Emails\PublicEmailSubscriptionDetails;
use HubSpotSDK\Marketing\Emails\PublicEmailTestingDetails;
use HubSpotSDK\Marketing\Emails\PublicEmailToDetails;
use HubSpotSDK\Marketing\Emails\PublicEmailVersion;
use HubSpotSDK\Marketing\Emails\PublicRssEmailDetails;
use HubSpotSDK\Marketing\Emails\PublicWebversionDetails;
use HubSpotSDK\Marketing\Emails\VersionPublicEmail;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Marketing\EmailsRawContract;

/**
 * @phpstan-import-type PublicEmailContentShape from \HubSpotSDK\Marketing\Emails\PublicEmailContent
 * @phpstan-import-type PublicEmailFromDetailsShape from \HubSpotSDK\Marketing\Emails\PublicEmailFromDetails
 * @phpstan-import-type PublicRssEmailDetailsShape from \HubSpotSDK\Marketing\Emails\PublicRssEmailDetails
 * @phpstan-import-type PublicEmailSubscriptionDetailsShape from \HubSpotSDK\Marketing\Emails\PublicEmailSubscriptionDetails
 * @phpstan-import-type PublicEmailTestingDetailsShape from \HubSpotSDK\Marketing\Emails\PublicEmailTestingDetails
 * @phpstan-import-type PublicEmailToDetailsShape from \HubSpotSDK\Marketing\Emails\PublicEmailToDetails
 * @phpstan-import-type PublicWebversionDetailsShape from \HubSpotSDK\Marketing\Emails\PublicWebversionDetails
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class EmailsRawService implements EmailsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{
     *   activeDomain?: string,
     *   archived?: bool,
     *   businessUnitID?: int,
     *   campaign?: string,
     *   content?: PublicEmailContent|PublicEmailContentShape,
     *   feedbackSurveyID?: string,
     *   folderIDV2?: int,
     *   from?: PublicEmailFromDetails|PublicEmailFromDetailsShape,
     *   jitterSendTime?: bool,
     *   language?: value-of<Language>,
     *   name?: string,
     *   publishDate?: \DateTimeInterface,
     *   rssData?: PublicRssEmailDetails|PublicRssEmailDetailsShape,
     *   sendOnPublish?: bool,
     *   state?: value-of<State>,
     *   subcategory?: value-of<Subcategory>,
     *   subject?: string,
     *   subscriptionDetails?: PublicEmailSubscriptionDetails|PublicEmailSubscriptionDetailsShape,
     *   testing?: PublicEmailTestingDetails|PublicEmailTestingDetailsShape,
     *   to?: PublicEmailToDetails|PublicEmailToDetailsShape,
     *   webversion?: PublicWebversionDetails|PublicWebversionDetailsShape,
     * }|EmailCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function create(
        array|EmailCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'marketing/emails/2026-03',
            body: (object) $parsed,
            options: $options,
            convert: PublicEmail::class,
        );
    }

    /**
     * @api
     *
     * Change properties of a marketing email.
     *
     * @param string $emailID Path param
     * @param array{
     *   archived?: bool,
     *   activeDomain?: string,
     *   businessUnitID?: int,
     *   campaign?: string,
     *   content?: PublicEmailContent|PublicEmailContentShape,
     *   folderIDV2?: int,
     *   from?: PublicEmailFromDetails|PublicEmailFromDetailsShape,
     *   jitterSendTime?: bool,
     *   language?: value-of<EmailUpdateParams\Language>,
     *   name?: string,
     *   publishDate?: \DateTimeInterface,
     *   rssData?: PublicRssEmailDetails|PublicRssEmailDetailsShape,
     *   sendOnPublish?: bool,
     *   state?: value-of<EmailUpdateParams\State>,
     *   subcategory?: value-of<EmailUpdateParams\Subcategory>,
     *   subject?: string,
     *   subscriptionDetails?: PublicEmailSubscriptionDetails|PublicEmailSubscriptionDetailsShape,
     *   testing?: PublicEmailTestingDetails|PublicEmailTestingDetailsShape,
     *   to?: PublicEmailToDetails|PublicEmailToDetailsShape,
     *   webversion?: PublicWebversionDetails|PublicWebversionDetailsShape,
     * }|EmailUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function update(
        string $emailID,
        array|EmailUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['marketing/emails/2026-03/%1$s', $emailID],
            query: array_intersect_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: PublicEmail::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   campaign?: string,
     *   createdAfter?: \DateTimeInterface,
     *   createdAt?: \DateTimeInterface,
     *   createdBefore?: \DateTimeInterface,
     *   includedProperties?: list<string>,
     *   includeStats?: bool,
     *   isPublished?: bool,
     *   limit?: int,
     *   marketingCampaignNames?: bool,
     *   publishedAfter?: \DateTimeInterface,
     *   publishedAt?: \DateTimeInterface,
     *   publishedBefore?: \DateTimeInterface,
     *   sort?: list<string>,
     *   type?: value-of<Type>,
     *   updatedAfter?: \DateTimeInterface,
     *   updatedAt?: \DateTimeInterface,
     *   updatedBefore?: \DateTimeInterface,
     *   variantStats?: bool,
     *   workflowNames?: bool,
     * }|EmailListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PublicEmail>>
     *
     * @throws APIException
     */
    public function list(
        array|EmailListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'marketing/emails/2026-03',
            query: $parsed,
            options: $options,
            convert: PublicEmail::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Delete a marketing email by its ID
     *
     * @param array{archived?: bool}|EmailDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $emailID,
        array|EmailDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['marketing/emails/2026-03/%1$s', $emailID],
            query: $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * This will create a duplicate email with the same properties as the original, with the exception of a unique ID.
     *
     * @param array{
     *   id: string, cloneName?: string, language?: string
     * }|EmailCloneParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function clone(
        array|EmailCloneParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailCloneParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'marketing/emails/2026-03/clone',
            body: (object) $parsed,
            options: $options,
            convert: PublicEmail::class,
        );
    }

    /**
     * @api
     *
     * Create a variation of a marketing email for an A/B test. The new variation will be created as a draft. If an active variation already exists, a new one won't be created.
     *
     * @param array{
     *   contentID: string, variationName: string
     * }|EmailCreateAbTestVariationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function createAbTestVariation(
        array|EmailCreateAbTestVariationParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailCreateAbTestVariationParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'marketing/emails/2026-03/ab-test/create-variation',
            body: (object) $parsed,
            options: $options,
            convert: PublicEmail::class,
        );
    }

    /**
     * @api
     *
     * Use this endpoint to get aggregated statistics of emails sent in a specified time span. It also returns the list of emails that were sent during the time span.
     *
     * @param array{
     *   emailIDs?: list<int>,
     *   endTimestamp?: \DateTimeInterface,
     *   property?: string,
     *   startTimestamp?: \DateTimeInterface,
     * }|EmailGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AggregateEmailStatistics>
     *
     * @throws APIException
     */
    public function get(
        array|EmailGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'marketing/emails/2026-03/statistics/list',
            query: Util::array_transform_keys($parsed, ['emailIDs' => 'emailIds']),
            options: $options,
            convert: AggregateEmailStatistics::class,
        );
    }

    /**
     * @api
     *
     * This endpoint lets you obtain the variation of an A/B marketing email. If the email is variation A (master) it will return variation B (variant) and vice versa.
     *
     * @param array{
     *   archived?: bool,
     *   includedProperties?: list<string>,
     *   includeStats?: bool,
     *   marketingCampaignNames?: bool,
     *   variantStats?: bool,
     *   workflowNames?: bool,
     * }|EmailGetAbTestVariationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function getAbTestVariation(
        string $emailID,
        array|EmailGetAbTestVariationParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailGetAbTestVariationParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['marketing/emails/2026-03/%1$s/ab-test/get-variation', $emailID],
            query: $parsed,
            options: $options,
            convert: PublicEmail::class,
        );
    }

    /**
     * @api
     *
     * Get the draft version of an email (if it exists). If no draft version exists, the published email is returned.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function getDraft(
        string $emailID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['marketing/emails/2026-03/%1$s/draft', $emailID],
            options: $requestOptions,
            convert: PublicEmail::class,
        );
    }

    /**
     * @api
     *
     * Get aggregated statistics in intervals for a specified time span. Each interval contains aggregated statistics of the emails that were sent in that time.
     *
     * @param array{
     *   emailIDs?: list<int>,
     *   endTimestamp?: \DateTimeInterface,
     *   interval?: Interval|value-of<Interval>,
     *   startTimestamp?: \DateTimeInterface,
     * }|EmailGetHistogramParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseWithTotalEmailStatisticInterval>
     *
     * @throws APIException
     */
    public function getHistogram(
        array|EmailGetHistogramParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailGetHistogramParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'marketing/emails/2026-03/statistics/histogram',
            query: Util::array_transform_keys($parsed, ['emailIDs' => 'emailIds']),
            options: $options,
            convert: CollectionResponseWithTotalEmailStatisticInterval::class,
        );
    }

    /**
     * @api
     *
     * Get a specific revision of a marketing email.
     *
     * @param array{emailID: string}|EmailGetRevisionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicEmailVersion>
     *
     * @throws APIException
     */
    public function getRevision(
        string $revisionID,
        array|EmailGetRevisionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailGetRevisionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $emailID = $parsed['emailID'];
        unset($parsed['emailID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'marketing/emails/2026-03/%1$s/revisions/%2$s', $emailID, $revisionID,
            ],
            options: $options,
            convert: PublicEmailVersion::class,
        );
    }

    /**
     * @api
     *
     * Get a list of all versions of a marketing email, with each entry including the full state of that particular version. To view the most recent version, sort by the updatedAt parameter.
     *
     * @param array{
     *   after?: string, before?: string, limit?: int
     * }|EmailListRevisionsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<VersionPublicEmail>>
     *
     * @throws APIException
     */
    public function listRevisions(
        string $emailID,
        array|EmailListRevisionsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailListRevisionsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['marketing/emails/2026-03/%1$s/revisions', $emailID],
            query: $parsed,
            options: $options,
            convert: VersionPublicEmail::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * If you have a Marketing Hub Enterprise account or the transactional email add-on, you can use this endpoint to publish an automated email or send/schedule a regular email.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function publish(
        string $emailID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['marketing/emails/2026-03/%1$s/publish', $emailID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Resets the draft back to a copy of the live object.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function resetDraft(
        string $emailID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['marketing/emails/2026-03/%1$s/draft/reset', $emailID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Restores a previous revision of a marketing email. The current revision becomes old, and the restored revision is given a new version number.
     *
     * @param array{emailID: string}|EmailRestoreRevisionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function restoreRevision(
        string $revisionID,
        array|EmailRestoreRevisionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailRestoreRevisionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $emailID = $parsed['emailID'];
        unset($parsed['emailID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'marketing/emails/2026-03/%1$s/revisions/%2$s/restore',
                $emailID,
                $revisionID,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Restores a previous revision of a marketing email to DRAFT state. If there is currently something in the draft for that object, it is overwritten.
     *
     * @param array{emailID: string}|EmailRestoreRevisionToDraftParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function restoreRevisionToDraft(
        int $revisionID,
        array|EmailRestoreRevisionToDraftParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailRestoreRevisionToDraftParams::parseRequest(
            $params,
            $requestOptions,
        );
        $emailID = $parsed['emailID'];
        unset($parsed['emailID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'marketing/emails/2026-03/%1$s/revisions/%2$s/restore-to-draft',
                $emailID,
                $revisionID,
            ],
            options: $options,
            convert: PublicEmail::class,
        );
    }

    /**
     * @api
     *
     * If you have a Marketing Hub Enterprise account or the transactional email add-on, you can use this endpoint to unpublish an automated email or cancel a regular email. If the email is already in the process of being sent, canceling might not be possible.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function unpublish(
        string $emailID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['marketing/emails/2026-03/%1$s/unpublish', $emailID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Create or update the draft version of a marketing email. If no draft exists, the system creates a draft from the current “live” email then applies the request body to that draft. The draft version only lives on the buffer—the email is not cloned.
     *
     * @param array{
     *   activeDomain?: string,
     *   archived?: bool,
     *   businessUnitID?: int,
     *   campaign?: string,
     *   content?: PublicEmailContent|PublicEmailContentShape,
     *   folderIDV2?: int,
     *   from?: PublicEmailFromDetails|PublicEmailFromDetailsShape,
     *   jitterSendTime?: bool,
     *   language?: value-of<EmailUpdateDraftParams\Language>,
     *   name?: string,
     *   publishDate?: \DateTimeInterface,
     *   rssData?: PublicRssEmailDetails|PublicRssEmailDetailsShape,
     *   sendOnPublish?: bool,
     *   state?: value-of<EmailUpdateDraftParams\State>,
     *   subcategory?: value-of<EmailUpdateDraftParams\Subcategory>,
     *   subject?: string,
     *   subscriptionDetails?: PublicEmailSubscriptionDetails|PublicEmailSubscriptionDetailsShape,
     *   testing?: PublicEmailTestingDetails|PublicEmailTestingDetailsShape,
     *   to?: PublicEmailToDetails|PublicEmailToDetailsShape,
     *   webversion?: PublicWebversionDetails|PublicWebversionDetailsShape,
     * }|EmailUpdateDraftParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicEmail>
     *
     * @throws APIException
     */
    public function updateDraft(
        string $emailID,
        array|EmailUpdateDraftParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailUpdateDraftParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['marketing/emails/2026-03/%1$s/draft', $emailID],
            body: (object) $parsed,
            options: $options,
            convert: PublicEmail::class,
        );
    }
}
