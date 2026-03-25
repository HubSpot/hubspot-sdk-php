<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\URLMappingsContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class URLMappingsService implements URLMappingsContract
{
    /**
     * @api
     */
    public URLMappingsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new URLMappingsRawService($client);
    }

    /**
     * @api
     *
     * Create a new URL mapping in your HubSpot account. This endpoint allows you to define URL redirections and mappings, which can be useful for managing site navigation and SEO. The request body must include all required properties of the UrlMapping schema.
     *
     * @param string $id the unique ID of this URL redirect
     * @param \DateTimeInterface $created the date and time when the URL mapping was initially created
     * @param string $destination the destination URL, where the target URL should be redirected if it matches the `routePrefix`
     * @param bool $isMatchFullURL whether the `routePrefix` should match on the entire URL, including the domain
     * @param bool $isMatchQueryString whether the `routePrefix` should match on the entire URL path, including the query string
     * @param bool $isOnlyAfterNotFound Whether the URL redirect mapping should apply only if a live page on the URL isn't found. If False, the URL redirect mapping will take precedence over any existing page.
     * @param bool $isPattern whether the `routePrefix` should match based on pattern
     * @param bool $isProtocolAgnostic whether the `routePrefix` should match both HTTP and HTTPS protocols
     * @param bool $isTrailingSlashOptional whether a trailing slash will be ignored
     * @param int $precedence Used to prioritize URL redirection. If a given URL matches more than one redirect, the one with the **lower** precedence will be used.
     * @param int $redirectStyle The type of redirect to create. Options include: 301 (permanent), 302 (temporary), or 305 (proxy). Find more details [here](https://knowledge.hubspot.com/cos-general/how-to-redirect-a-hubspot-page).
     * @param string $routePrefix the target incoming URL, path, or pattern to match for redirection
     * @param \DateTimeInterface $updated the date and time when the URL mapping was last modified
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $id,
        \DateTimeInterface $created,
        string $destination,
        bool $isMatchFullURL,
        bool $isMatchQueryString,
        bool $isOnlyAfterNotFound,
        bool $isPattern,
        bool $isProtocolAgnostic,
        bool $isTrailingSlashOptional,
        int $precedence,
        int $redirectStyle,
        string $routePrefix,
        \DateTimeInterface $updated,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'created' => $created,
                'destination' => $destination,
                'isMatchFullURL' => $isMatchFullURL,
                'isMatchQueryString' => $isMatchQueryString,
                'isOnlyAfterNotFound' => $isOnlyAfterNotFound,
                'isPattern' => $isPattern,
                'isProtocolAgnostic' => $isProtocolAgnostic,
                'isTrailingSlashOptional' => $isTrailingSlashOptional,
                'precedence' => $precedence,
                'redirectStyle' => $redirectStyle,
                'routePrefix' => $routePrefix,
                'updated' => $updated,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a list of URL mappings from the HubSpot account. This endpoint provides access to URL mapping configurations, which can be used to manage and redirect URLs within the HubSpot CMS. It is useful for understanding how URLs are structured and redirected in your content management setup.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): string {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a specific URL mapping in your HubSpot account using its unique identifier. This operation will remove the URL mapping permanently, and it requires appropriate write and delete permissions.
     *
     * @param int $id The unique identifier of the URL mapping to delete. Must be an integer.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a specific URL mapping by its unique identifier. This endpoint is useful for obtaining details about a particular URL mapping configuration within your HubSpot account. It requires the ID of the URL mapping as a path parameter.
     *
     * @param int $id The unique identifier of the URL mapping to retrieve. It must be an integer.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): string {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
