CREATE VIEW employer_view
AS SELECT
`emp`.`id` AS `id`,
`emp`.`fullname` AS `fullname`,
`emp`.`email` AS `email`,
`emp`.`email_verified` AS `email_verified`,
`emp`.`mob_code` AS `mob_code`,
`emp`.`mobile` AS `mobile`,
`emp`.`company_name` AS `company_name`,
`emp`.`company_type` AS `company_type`,
`emp`.`company_size` AS `company_size`,
`emp`.`industry` AS `industry`,
`emp`.`license_no` AS `license_no`,
`emp`.`address` AS `address`,
`emp`.`country` AS `country`,
`emp`.`city` AS `city`,
`emp`.`zip` AS `zip`,
`emp`.`plan_id` AS `plan_id`,
`emp`.`left_credit_job_posting_plan` AS `left_credit_job_posting_plan`,
`emp`.`free_assign_job_posting` AS `free_assign_job_posting`,
`emp`.`plan_start_from` AS `plan_start_from`,
`emp`.`plan_expired_on` AS `plan_expired_on`,
`emp`.`last_payment_recieved_id` AS `last_payment_recieved_id`,
`emp`.`last_payment_recieved` AS `last_payment_recieved`,
`emp`.`last_payment_recieved_on` AS `last_payment_recieved_on`,
`emp`.`website` AS `website`,
`emp`.`facebook` AS `facebook`,
`emp`.`instagram` AS `instagram`,
`emp`.`linkedin` AS `linkedin`,
`emp`.`profile_img` AS `profile_img`,
`emp`.`is_deleted` AS `is_deleted`,
`emp`.`password` AS `password`,
`emp`.`created_at` AS `created_at`,
`emp`.`updated_at` AS `updated_at`,
`size`.`company_size` AS `company_size_name`,
`type`.`company_type` AS `company_type_name`,
`indus`.`industries_name` AS `industry_name`,
`country`.`country_name` AS `country_name`,
`city`.`city_name` AS `city_name`,
`plan`.`plan_name` AS `plan_name`,
`plan`.`job_post_limit` AS `job_post_limit`,
`plan`.`plan_type` AS `plan_type`
FROM
(
(
(
(
(
(
`angel_mt_db`.`employers` `emp`
LEFT JOIN `angel_mt_db`.`company_sizes` `size`
ON
(`emp`.`company_size` = `size`.`id`)
)
LEFT JOIN `angel_mt_db`.`company_types` `type`
ON
(`emp`.`company_type` = `type`.`id`)
)
LEFT JOIN `angel_mt_db`.`industries` `indus`
ON
(`emp`.`industry` = `indus`.`id`)
)
LEFT JOIN `angel_mt_db`.`country_master` `country`
ON
(`emp`.`country` = `country`.`id`)
)
LEFT JOIN `angel_mt_db`.`cities` `city`
ON
(`emp`.`city` = `city`.`id`)
)
LEFT JOIN `angel_mt_db`.`employer_plan` `plan`
ON
(`emp`.`plan_id` = `plan`.`id`)
)