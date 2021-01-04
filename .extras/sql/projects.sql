/**
 * Get content for projects page (last 5 only)
 */
SELECT pr.project_id
    ,pr.title
    ,pr.description
    ,pr.image
FROM projects AS pr
WHERE pr.active = 1
ORDER BY pr.date_entry DESC
LIMIT 5;
