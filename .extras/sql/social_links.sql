/**
 * Get social links
 */
SELECT sl.social_link_id
    ,sl.name
    ,sl.link
FROM social_links AS sl
WHERE sl.active = 1
ORDER BY sl.arrangement;
