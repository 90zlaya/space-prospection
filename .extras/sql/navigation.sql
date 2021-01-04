/**
 * Get pages for navigation
 */
SELECT nav.navigation_id
    ,nav.name
    ,nav.link
FROM navigation AS nav
WHERE nav.active = 1
ORDER BY nav.arrangement;
