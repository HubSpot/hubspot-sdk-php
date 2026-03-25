<?php

declare(strict_types=1);

namespace HubspotSDK\Meta\Origins\IPRanges\IPRangeListSimpleParams;

enum Direction: string
{
    case INGRESS = 'INGRESS';

    case EGRESS = 'EGRESS';
}
